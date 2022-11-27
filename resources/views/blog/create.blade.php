@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/blog/store" method="post">
            @csrf
            <div class="form-group">
                <label for="text">Blog content</label>
                <textarea class="form-control" id="editor" name="content">

                </textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Submit</button>
        </form>
    </div>
@endsection
