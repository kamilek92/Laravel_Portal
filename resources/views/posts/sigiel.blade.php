<div class="panel panel-default">
    <div class="panel-body">


        @if(Auth::check() && $post->user_id === Auth::id())
            @include('posts.include.dropdown_menu')
            @endif

        <div class="clearfix">
            <img src="{{url('images/users-avatar/'.$post->user->id.'/50')}}" alt="Avatar {{$post->user->name}}}" class="img-responsive pull-left" />
            <div class="pull-left" style="margin: 3px 10px;">
                <a href="{{url('/user/'.$post->user->id)}}"><strong>{{$post->user->name}}</strong></a><br/>
                <a href="{{url('/posts/'.$post->id)}}" class="text-muted"><small><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{$post->created_at}}</small></a>
            </div>
        </div>
        <div id="post_{{$post->id}}" class="post_content" style="margin-top: 10px;">
            {{$post->content}}
        </div>
    </div>
</div>

