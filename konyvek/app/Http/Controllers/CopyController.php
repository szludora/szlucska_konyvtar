<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CopyController extends Controller
{
    public function index(){
        $copies = response()->json(Copy::all());
        return $copies;
    }

    public function show($id){
        $copy = response()->json(Copy::find($id));
        return $copy;
    }

    public function store(Request $request){
        $copy = new Copy();
        $copy->book_id = $request->book_id;
        $copy->hardcovered = $request->hardcovered;
        $copy->status = $request->status;
        $copy->publication = $request->publication;
        $copy->save();
    }

    public function update(Request $request, $id){
        $copy = Copy::find($id);
        $copy->book_id = $request->book_id;
        $copy->hardcovered = $request->hardcovered;
        $copy->publication = $request->publication;
        $copy->status = $request->status;
        $copy->save();
    }
    public function destroy($id)
    {
        Copy::findOrFail($id)->delete();
    }

    public function hAuthorTitle($hardcovered){
        $books = DB::table('copies as c')
        ->select('author', 'title')
        ->join('books as b','c.book_id','=','b.book_id')
        ->where('hardcovered', $hardcovered)
        ->get();
        return $books;
    }

    public function ev($year){
        $copies = Copy::whereYear('publication', $year)
        ->join('books','copies.book_id','=','books.book_id')
        ->select('copies.copy_id', 'books.author', 'books.title')
        ->get();
        return $copies;
    }
}
