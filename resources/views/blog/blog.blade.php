@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ route('create_blog')}}">Create blog</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Blog') }}</div>
                    <div class="card-body">
                        @if ($blog)
                            @foreach($blog as $b)
                                <div class="blogItem">
                                    <div>
                                        {{$b['content']}}
                                    </div>
                                    <div>
                                        @if ($b['user_id'] == $user_id)
                                        <a href="{{ route('edit_blog', $b['id'])}}">Edit</a>
                                        <a style="margin-left: 15px" href="{{ route('delete_blog', $b['id'])}}">Delete</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            {{ $blog->links('pagination::bootstrap-4') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
