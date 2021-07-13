<div class="container-fluid">
    <ul>
        @foreach ($comments as $comment)
            <li style="list-style-type: none">
                <div class="p-4 rounded shadow-sm bg-light mt-4">
                    <small>Автор: {{ $comment->user->name }}</small>
                    <p class="font-italic mb-0 row body-post overflow-hidden">{{ $comment->body }}</p>
                    <small class="float-right"><a href="#" class="reply" data-toggle="modal" data-target="#flipFlop"
                                                  data-comment_id="{{ $comment->id }}">Прокомментировать</a></small>
                </div>
            </li>
            @if ($comment->children)
                <ul>
                    @foreach ($comment->children as $children)
                        @include('child-comment', ['child_comment' => $children])
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>
