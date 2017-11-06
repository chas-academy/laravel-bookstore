@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Create A Book</h2>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
      @endif
      <form method="post" action="{{url('books')}}">
        {{csrf_field()}}
          <div class="row">
            <div class="form-group col-md-4">
              <label for="name">Title:</label>
              <input type="text" class="form-control" name="title">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="name">Author:</label>
              <input type="text" class="form-control" name="author">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="name">ISBN-13:</label>
              <input type="text" class="form-control" name="isbn">
            </div>
          </div>
          <div class="row">
              <div class="form-group col-md-4">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price">
              </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <button type="submit" class="btn btn-success" style="margin-left:38px">Add Book</button>
            </div>
          </div>
        </form>
    </div>
@endsection