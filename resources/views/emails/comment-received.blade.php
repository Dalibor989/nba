<html>

<body>
    <h3>Comment received</h3>
    <p>
        The user {{$user->first_name}} {{$user->last_name}} has posted a comment on <a href="{{ route('show.teams', ['team' => $team]) }}">{{$team->name}}</a> page.
    </p>
    <blockquote>{{$comment->content}}</blockquote>
</body>

</html>