@foreach ($comments as $comment)
    {{ $comment->id }}

    @if ($comment->children->count() > 0)
        @include('comments', ['comments' => $comment->children])
    @endif
@endforeach