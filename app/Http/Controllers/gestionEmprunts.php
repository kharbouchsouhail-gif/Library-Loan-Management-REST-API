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

        return response()->json([
            "message" => "the user is ",
            "data" => $emprunt
        ]);

    }

    function store(Request $request)
    {
        $book = Loan::create([
            "borrower_name" => $request->input("borrower_name"),
            "borrower_email" => $request->input("borrower_email"),
            "book_title" => $request->input("book_title")
        ]);
        return response()->json([
            "message" => "user creat succesfully",
            "data" => $book
        ]);
    }
    function show($id)
    {
        $book = Loan::find($id);
        return $book;
    }
    function update(Request $request, $id)
    {
        $book = Loan::find($id);
        $book->borrower_name = $request->input("borrower_name");
        $book->borrower_email = $request->input("borrower_email");
        $book->book_title = $request->input("book_title");
        $book->save();
    }
    function destroy($id)
    {
        $book = Loan::find($id);
        $book->delete();
    }

    function patchEement($id)
    {
        $book = Loan::find($id);
        $book->returned = true;
        return response()->json([
            "message" => 'book is returned '
        ]);
    }
    function addValide(Request $request)
    {
        $valideted = $request->validate([
            "borrower_name" => "required|string",
            "borrower_email" => "required|email",
            "book_title" => "required|string",
            "borrowerd_at" => "date",
            "due_date" => "date",
            "returned" => "boolean",
            "status" => "in:active,returned,overdue"
        ]);
        $book = Loan::create($valideted);
        return response()->json([
            "message" => "book created succesfull",
            "data" => $book
        ]);

    }

    function updateValide(Request $request, $id)
    {
        $book = Loan::find($id);
        $valideted = $request->validate([
            "borrower_name" => "required|string",
            "borrower_email" => "required|email",
            "book_title" => "required|string",
            "borrowerd_at" => "date",
            "due_date" => "date",
            "returned" => "boolean",
            "status" => "in:active,returned,overdue"
        ]);
        $book->update($valideted);
        return response()->json([
            "message" => "yupdate succesfully",
            "dara" => $book
        ]);


    }
}
