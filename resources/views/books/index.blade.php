@extends('layouts.app')

@section('content')
    <div class="container">
      @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <p>{{ \Session::get('success') }}</p>
        </div>
      @endif
      @if (\Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <p>{{ \Session::get('error') }}</p>
        </div>
      @endif
      <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Author</th>
          <th>Price</th>
          <th>Stock</th>
          <th colspan="3">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($books as $book)
        <tr>
          <td>{{$book['id']}}</td>
          <td>{{$book['title']}}</td>
          <td>{{$book->author->firstname}} {{$book->author->surname}}</td>
          <td>{{$book['price']}}</td>
          <td>{{$book['stock']}}</td>
          <td><a href="{{action('BookController@edit', $book['id'])}}" class="btn btn-warning">Edit</a></td>
          <td>
            <form action="{{action('BookController@destroy', $book['id'])}}" method="post">
              {{csrf_field()}}
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
          <td>
          <form action="{{url('cart')}}" method="post" accept-charset="UTF-8">
              {{csrf_field()}}
              <input name="book" type="hidden" value="{{$book->id}}">
              <input name="amount" type="hidden" value="1">
              <button class="btn btn-info" type="submit">Add to cart</button>
            </form>
          </td>
        </tr>
        @empty
          <tr>
            <td colspan="7">No books :(</td>
          </tr>
        @endforelse
      </tbody>
    </table>
    <a href="{{ route('books.create') }}" class="btn btn-info">Add new book</a></td>
  </div>
@endsection