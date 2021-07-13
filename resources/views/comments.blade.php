{{-- @foreach ($comments as $comment)
<div class="p-4 rounded shadow-sm bg-light mt-4" @if ($comment->parent_id) style="margin-left:20px" @endif>
    <small>Автор: {{ $comment->user->name }}</small>
<p class="font-italic mb-0 row body-post overflow-hidden">{{ $comment->id }}</p>
<small class="float-right"><a href="#" data-comment_id="{{ $comment->id }}">Прокомментировать</a></small>
</div>

@if ($comment->children->count() > 0)
@include('comments', ['comments' => $comment->children])
@endif
@endforeach --}}
<ul>
    @foreach ($comments as $comment)
    <li>
        {{ $comment->id }}
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
