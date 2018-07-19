
    @if (Auth::user()->is_liking($micropost->id))
        {!! Form::open(['route' => ['user.dislike', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-xs"]) !!}
        {!! Form::close() !!}
        
    @else
        {!! Form::open(['route' => ['user.like', $micropost->id]]) !!}
            {!! Form::submit('favorite', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
    @endif
