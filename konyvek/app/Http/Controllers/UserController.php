<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = response()->json(User::all());
        return $users;
    }

    public function show($id){
        $user = response()->json(User::find($id));
        return $user;
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->save();
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->save();
    }
    public function destroy($id)
    {
        //find helyett a paraméter
        User::find($id)->delete();
    }

    //egyéb fg-ek:
    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "password" => 'string|min:3|max:50'
        ]);
        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()->all()], 400);
        }
        $user = User::where("id", $id)->update([
            "password" => Hash::make($request->password),
        ]);
        /* return response()->json(["user" => $user]); */
    }

    public function lendingByUser(){
        $user = Auth::user();	//bejelentkezett felhasználó
        $lendings = User::with('lendings') //a függvény neve
        ->where('id','=',$user->id)
        ->get();
        return $lendings;
    }


}
