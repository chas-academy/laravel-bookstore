@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr class="row">
                    <th>Title</th>
                    <th>Author</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Total price</th>
                </tr>
            </thead>
            <tbody>
            @if (count($cart_books) == 0)
                <tr class="row">
                    <td colspan="5">Nothing here yet, get to shopping!</td>
                </tr>
            @endif
            @foreach ($cart_books as $cart_item)
                <tr class="row">
                    <td>{{$cart_item->book->title}}</td>
                    <td>{{$cart_item->book->author->firstname}} {{$cart_item->book->author->surname}}</td>
                    <td class="col-md-2">
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="input-group br"> 
                            <span class="input-group-btn">
                                <a href='{{url("cart?product_id=$cart_item->id&decrement=1")}}' class="btn btn-sm btn-primary">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                            </span>
                            <input class="form-control input-sm text-center" type="number" name="amount" value="{{$cart_item->amount}}" disabled />
                            <span class="input-group-btn">
                                <a href='{{url("cart?product_id=$cart_item->id&increment=1")}}' class="btn btn-sm btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            </span>
                        </div>
                    </td>
                    <td>{{$cart_item->book->price}}</td>
                    <td>{{$cart_item->book->price * $cart_item->amount}}</td>
                    <td class="col-md-4">
                        <form class="col-md-3" action="{{action('CartController@destroy', $cart_item->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr class="row">
                    <th colspan="3">&nbsp;</th>
                    <th>Total</th>
                    <th>$ {{$cart_total}}</th>
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