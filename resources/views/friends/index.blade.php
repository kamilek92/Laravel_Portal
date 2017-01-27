@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Wyniki wyszukiwania <span class="label label-primary">{{$user->friends()->count()}}</span> </div>
                    <div class="panel-body">
                        @if($user->friends()->count() === 0)
                            <h4 class="text-center">Brak znajomych</h4>
                        @else

                            <div class="row">
                                @foreach($user->friends() as $uzytkownicy) <!-- user->fredns bo odwołuje się do modelu user i tam metoda -->
                                    <div class="col-sm-4 text-center">
                                        <a href="{{url('/users/'.$uzytkownicy->id)}}">
                                            <div class="thumbnail">  <img src="{{url('images/users-avatar/'.$uzytkownicy->id.'/250')}}" class="img-responsive thumbnail"/>
                                                <h5>{{$uzytkownicy->name}}</h5></div></a>
                                    </div>
                                @endforeach
                            </div>
                            {{--<div class="text-center">{{$friends}}</div>--}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
