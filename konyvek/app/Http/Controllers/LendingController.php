<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index()
    {
        $lendings = response()->json(Lending::all());
        return $lendings;
    }

    public function show($user_id, $copy_id, $start)
    {
        $lending = Lending::where('user_id', $user_id)->where('copy_id', $copy_id)->where('start', $start)->get();
        return $lending[0];
    }

    public function store(Request $request)
    {
        $lending = new Lending();
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->extension = $request->extension;
        $lending->save();
    }

    public function update(Request $request, $user_id, $copy_id, $start)
    {
        $lending = Lending::where('user_id', $user_id)->where('copy_id', $copy_id)->where('start', $start)->get();
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->extension = $request->extension;
        $lending->save();
    }

    public function destroy($user_id, $copy_id, $start)
    {
        Lending::where('user_id', $user_id)
            ->where('copy_id', $copy_id)
            ->where('start', $start)->delete();
    }
    public function allLendingUserCopy()
    {
        $copies = Lending::with(['copies', 'users']) //a függvény neve a modellben
            ->get();

        return $copies;
    }
}
