
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-7 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{url('/posts/'. $post->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">

                                @if ($errors->has('post_content'))
                                    <span class="help-block"><strong>{{ $errors->first('post_content') }}</strong></span>
                                @endif
                                <textarea name="post_content"  class="form-control" cols="60" rows="5">{{$post->content}}</textarea>

                            </div>
                            <button type="submit" class="btn btn-default pull-right ">Zaaktualizuj</button>

                        </form>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection

