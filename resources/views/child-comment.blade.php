<li>{{ $child_comment->id }}</li>
@if ($child_comment->children)
    <ul>
        @foreach ($child_comment->children as $comment)
            @include('child-comment', ['child_comment' => $comment])
        @endforeach
    </ul>
@endif