@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Wyniki wyszukiwania</div>
                    <div class="panel-body">
                        @if($wyniki->count() === 0)
                            <h4 class="text-center">Brak wyników</h4>
                         @else
                            
                            <div class="row">
                                @foreach($wyniki as $uzytkownicy)
                                    <div class="col-sm-4 text-center">
                                         <a href="{{url('/users/'.$uzytkownicy->id)}}">
                                            <div class="thumbnail">  <img src="{{url('images/users-avatar/'.$uzytkownicy->id.'/250')}}" class="img-responsive thumbnail"/>
                                             <h5>{{$uzytkownicy->name}}</h5></div></a>
                                    </div>
                                    @endforeach
                            </div>
                            <div class="text-center">{{$wyniki}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
