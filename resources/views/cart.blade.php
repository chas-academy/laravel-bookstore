@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cart_books as $cart_item)
                <tr>
                    <td>{{$cart_item->book->title}}</td>
                    <td>{{$cart_item->book->author->firstname}} {{$cart_item->book->author->surname}}</td>
                    <td>
                        <input type="text" name="amount" class="form-control" value="{{$cart_item->amount}}" />
                    </td>
                    <td>{{$cart_item->book->price}}</td>
                    <td>
                        <form action="{{action('CartController@destroy', $cart_item->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Total</td>
                    <td>{{$cart_total}}</td>
                </tr>
            </tfoot>
        </table>
        <h1>Shipping</h1>
        <form action="" method="post" accept-charset="UTF-8" class="form">
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control text" name="address" rows="4" placeholder="Shipping address"></textarea>
            </div>
            <button type="submit" class="btn btn-large btn-info">Place order</button>
        </form>
    </div>
@endsection