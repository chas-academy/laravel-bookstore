<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use App\Book;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $cart_books = Cart::with('book')->where('user_id', '=', $user_id)->get();
        $cart_total = Cart::with('book')->where('user_id', '=', $user_id)->sum('total');

        if(!$cart_books)
        {
            return 
                redirect('/')
                    ->with('error', 'Cart is empty');
        }

        return view('cart', compact('cart_books', 'cart_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'book' => 'required|numeric|exists:books,id'
        ]);

        if($validator->fails()) {
            return
                redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput('error', 'The book could not be added to your cart! Because reasons');
        }

        $user_id = Auth::user()->id;
        $book_id = $request->get('book');
        $amount = $request->get('amount');

        $book = Book::find($book_id);
        $total = $amount * $book->price;

        $count = Cart::where('book_id', '=', $book_id)->where('user_id', '=', $user_id)->count();
        
        if ($count)
        {
            return
                redirect('books')
                    ->with('error', 'Book is already in your cart');
        }

        Cart::create(array(
            'user_id' => $user_id,
            'book_id' => $book_id,
            'amount' => $amount,
            'total' => $total,
        ));

        return
            redirect('cart')
                ->with('success', 'Book has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return 
            redirect('cart')
                ->with('success', 'Book has been removed from cart');
    }
}
