<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = response()->json(Book::all());
        return $books;
    }

    public function show($id)
    {
        $book = response()->json(Book::find($id));
        return $book;
    }

    public function store(Request $request)
    {
        $Book = new Book();
        $Book->author = $request->author;
        $Book->title = $request->title;
        $Book->save();
    }

    public function update(Request $request, $id)
    {
        $Book = Book::find($id);
        $Book->author = $request->author;
        $Book->title = $request->title;
        $Book->save();
    }
    public function destroy($id)
    {
        //find helyett a paraméter
        Book::find($id)->delete();
    }

    public function titleCount($title)
    {
        $copies = DB::table('books as b')    //egy tábla lehet csak
            //->select('mezo_neve')		//itt nem szükséges
            ->join('copies as c', 'b.book_id', '=', 'c.book_id') //kapcsolat leírása, akár több join is lehet
            ->where('title', '=', $title)     //esetleges szűrés
            ->count();                //esetleges aggregálás; ha select, akkor get() a vége

        return $copies;
    }

    /*
    Határozd meg a könyvtár nyilvántartásában legalább 2 könyvvel rendelkező szerzőket!
    */

    public function authorsWithMoreBooks()
    {
        return DB::table('books')
            ->selectRaw('author, count(*)')
            ->groupBy('author')
            ->having('count(*)', '>', 1)
            ->get();
    }
}
