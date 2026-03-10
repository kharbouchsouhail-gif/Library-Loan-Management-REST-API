<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminat\Http\Model;

class gestionEmprunts extends Controller
{
    function index()
    {
        $emprunt = Loan::all();

        return $emprunt;

    }

    function store()
    {
        $book = Loan::create([
            "borrower_name" => "yassine",
            "borrower_email" => "jahja@gmail.com",
            "book_title" => "the gost 22"
        ]);
        return $book;
    }
    function show($id)
    {
        $book = Loan::find($id);
        return $book;
    }
    function update(Request $request,$id)
    {
        $book = Loan::find($id);
        $book->borrower_name = $request->input("borrower_name");
        $book->book_title = $request->input("book_title");
        $book->save();
    }
    function destroy($id){
        $book=Loan::find($id);
        $book->delete();
    }
}
