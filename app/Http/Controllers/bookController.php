<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class bookController extends Controller
{
    //Ke halaman utama
    public function index()
    {
        $books = book::all();

        return view('home')->with('books', $books);
    }

    public function addBook()
    {
        return view('addBook');
    }

    public function storeBook(Request $request)
    {
        $validateData = $request->validate(
            [
                'bookTitle' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z0-9\s\-_,.()]+)$/'],
                'bookAuthor' => ['required', 'string', 'regex:/^[A-Z][a-z]*(\s+[A-Z][a-z]*)+$/'],
                'bookPrice' => 'required|numeric|min:0',
                'releaseDate' => 'required|date|before_or_equal:today',
            ],
            [
                'bookTitle.required' => 'Please enter a book title.',
                'bookTitle.string' => 'The book title must be a string.',
                'bookTitle.max' => 'The book title must not exceed 255 characters.',
                'bookTitle.regex' => 'The book title must start with a capital letter followed by lowercase letters.',

                'bookAuthor.required' => 'Please enter a book author.',
                'bookAuthor.string' => 'The book author must be a string.',
                'bookAuthor.regex' => 'The book author must have middle name or last name and start with a capital letter followed by lowercase letters.',

                'bookPrice.required' => 'Please enter a price for the book.',
                'bookPrice.numeric' => 'The book price must be a number.',
                'bookPrice.min' => 'The book price must be at least 0.',

                'releaseDate.required' => 'Please enter a release date of the book.',
                'releaseDate.date' => 'Release Date must be in date format.',
                'releaseDate.before_or_equal' => 'Release can\'t be in the future'
            ]
        );

        book::create([
            'bookTitle' => $validateData['bookTitle'],
            'bookAuthor' => $validateData['bookAuthor'],
            'bookPrice' => $validateData['bookPrice'],
            'releaseDate' => $validateData['releaseDate']
        ]);

        return redirect('/')->with('success', 'Book successfully added!');
    }

    public function bookDetail($id)
    {
        $bookDetail = book::findOrFail($id);
        return view('bookDetail')->with('bookDetail', $bookDetail);
    }

    public function editBook($id)
    {
        $bookToEdit = book::findOrFail($id);

        return view('updateBook')->with('bookToEdit', $bookToEdit);
    }

    public function updateBook(Request $request, $id)
    {
        $validateData = $request->validate(
            [
                'bookTitle' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z0-9\s\-_,.!@#()]+)$/'],
                'bookAuthor' => ['required', 'string', 'regex:/^[A-Z][a-z]*(\s+[A-Z][a-z]*)+$/'],
                'bookPrice' => 'required|numeric|min:0',
                'releaseDate' => 'required|date|before_or_equal:today',
            ],
            [
                'bookTitle.required' => 'Please enter a book title.',
                'bookTitle.string' => 'The book title must be a string.',
                'bookTitle.max' => 'The book title must not exceed 255 characters.',
                'bookTitle.regex' => 'The book title must start with a capital letter followed by lowercase letters.',

                'bookAuthor.required' => 'Please enter a book author.',
                'bookAuthor.string' => 'The book author must be a string.',
                'bookAuthor.regex' => 'The book author must have middle name or last name and start with a capital letter followed by lowercase letters.',

                'bookPrice.required' => 'Please enter a price for the book.',
                'bookPrice.numeric' => 'The book price must be a number.',
                'bookPrice.min' => 'The book price must be at least 0.',

                'releaseDate.required' => 'Please enter a release date of the book.',
                'releaseDate.date' => 'Release Date must be in date format.',
                'releaseDate.before_or_equal' => 'Release can\'t be in the future'
            ]
        );

        book::findOrFail($id)->update($validateData);

        return redirect('/')->with('success', 'Book successfully updated!');
    }

    public function deleteBook($id)
    {
        $bookToDelete = book::findOrFail($id);
        $bookToDelete->delete();

        return redirect('/')->with('success', 'Book successfully deleted!');
    }
}
