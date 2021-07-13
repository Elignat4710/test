<li style="list-style-type: none">
    <div class="p-4 rounded shadow-sm bg-light mt-4">
        <small>Автор: {{ $child_comment->user->name }}</small>
        <p class="font-italic mb-0 row body-post overflow-hidden">{{ $child_comment->body }}</p>
        <small class="float-right"><a href="#" class="reply" data-toggle="modal" data-target="#flipFlop"
                                      data-comment_id="{{ $child_comment->id }}">Прокомментировать</a></small>
    </div>
</li>
@if ($child_comment->children)
    <ul>
        @foreach ($child_comment->children as $comment)
            @include('child-comment', ['child_comment' => $comment])
        @endforeach
    </ul>
@endif
