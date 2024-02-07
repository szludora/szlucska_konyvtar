<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LendingController extends Controller
{
    public function index()
    {
        $users = response()->json(Lending::all());
        return $users;
    }

    public function store(Request $request)
    {
        $lending = new Lending();
        $lending->fill($request->all());
        $lending->save();
    }

    public function show($user_id, $copy_id, $start)
    {
        return Lending::where('user_id', $user_id)->where('copy_id', $copy_id)->where('start', $start)->first();
    }

    public function update(Request $request, $user_id, $copy_id, $start)
    {
        $lend = $this->show($user_id, $copy_id, $start);
        $lend->fill($request->all());
        $lend->save();
    }

    public function destroy($user_id, $copy_id, $start)
    {
        $this->show($user_id, $copy_id, $start)->delete();
    }

    public function allLendingUserCopy()
    {
        //a modellben megírt függvények 
        //neveit használom
        $datas = Lending::with(['users', 'copies'])
            ->get();
        return $datas;
    }

    public function lendingsCountByUser()
    {
        $user = Auth::user();    //bejelentkezett felhasználó
        $lendings = Lending::with('users')->where('user_id', '=', $user->id)->count();
        return $lendings;
    }

// Listázd ki a mai napon visszahozott könyveket!
    public function today(){
        return DB::table('lendings as l')
        ->selectRaw('title, author')
        ->join('copies as c','l.copy_id','c.copy_id')
        ->join('books as b', 'c.book_id', 'b.book_id')
        ->whereDate('end', now()) 
        ->get();
    }

    public function broughtBackOn($myDate){
        return DB::table('lendings as l')
        ->selectRaw('title, author')
        ->join('copies as c','l.copy_id','c.copy_id')
        ->join('books as b', 'c.book_id', 'b.book_id')
        ->where('end', $myDate)
        ->get();
    }
}
