<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        $books = response()->json(Book::all());
        return $books;
    }

    public function show($id){
        $book = response()->json(Book::findOrFail($id));
        return $book;
    }

    public function store(Request $request){
        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->title;
        $book->save();
    }

    public function update(Request $request, $id){
        $book = Book::findOrFail($id);
        $book->author = $request->author;
        $book->title = $request->title;
        $book->save();
    }
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
    }

    public function titleCount($title){
        $copies = DB::table('books as b')	//egy tábla lehet csak
	  //->select('mezo_neve')		//itt nem szükséges
        ->join('copies as c' ,'b.book_id','=','c.book_id') //kapcsolat leírása, akár több join is lehet
        ->where('title','=', $title) 	//esetleges szűrés
        ->count();				//esetleges aggregálás; ha select, akkor get() a vége
        return $copies;
    }

}
