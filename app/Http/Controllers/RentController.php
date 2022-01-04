<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;
use App\Models\Book;
use App\Models\UserBook;
use Auth;
use DB;

class RentController extends Controller
{

    public function load()
    {
        return Inertia::render('Manipulate/Rent/Rent', [
            'books' => Book::leftJoin('users_books', function($leftJoin) {
                $leftJoin->on('books.id', '=', 'users_books.book_id')->where('users_books.user_id', Auth::user()->id);
            })->where('active', 1)->get(['books.*', DB::raw('(CASE WHEN '. Auth::user()->id . ' THEN users_books.user_id ELSE users_books.user_id = null END) AS user_id')]),
            'user' => Auth::user(),
        ]);
    }

    public function rent($user_id, $book_id)
    {
        $book = Book::find($book_id);

        if ($book->amount > 0) {
            UserBook::create([
                'user_id' => $user_id,
                'book_id' => $book_id,
            ]);
    
            $book->update([
                'amount' => $book->amount - 1,
            ]);
            return redirect()->route('manipulate.rents.load');
        } else {
            echo "<h1>num da pra alugar</h1>";
        }
    }

    public function unrent($user_id, $book_id)
    {   
        $book = Book::find($book_id);
        
        $userBook = UserBook::where('user_id', $user_id)->where('book_id', $book_id)->get();
        
        if($userBook && $book->amount >= 0) {
            UserBook::where('book_id', $book_id)->where('user_id', $user_id)->delete();

            $book->update([
                'amount' => $book->amount + 1,
            ]);

            return redirect()->route('manipulate.rents.load');
        } else {
            echo "opa, tem merda ai";
        }
    }
}
