@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('layouts.sidebar')

            @if(Auth::check() && $user->id === Auth::id())
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('posts.create')
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-7">

                @foreach($posts as $post)

                        @include('posts.sigiel')

                @endforeach
            </div>
        </div>
    </div>
@endsection