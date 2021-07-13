@extends('layouts.app')

@section('scripts')
<style>
    .just-padding {
        padding: 15px;
    }

    .list-group.list-group-root {
        padding: 0;
        overflow: hidden;
    }

    .list-group.list-group-root .list-group {
        margin-bottom: 0;
    }

    .list-group.list-group-root .list-group-item {
        border-radius: 0;
        border-width: 1px 0 0 0;
    }

    .list-group.list-group-root>.list-group-item:first-child {
        border-top-width: 0;
    }

    .list-group.list-group-root>.list-group>.list-group-item {
        padding-left: 30px;
    }

    .list-group.list-group-root>.list-group>.list-group>.list-group-item {
        padding-left: 45px;
    }

</style>
@endsection

@section('content')
<div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-4 pb-4 cover">
                <h1 class="font-italic mb-0 text-center">
                    <img class="rounded-circle" width="100" height="100"
                        src="{{ $post->file_id == 2 ? Request::segment(0) . '/' . $post->file->name : '/storage/' . $post->file->name }}"
                        alt="">
                    {{ $post->title }}
                </h1>
                <p>{{ $post->body }}</p>
                <div class="row mt-2 align-items-end">
                    <div class="col-md-6">
                        <small class="font-italic mb-0 mr-3">Автор: <a
                                href="{{ Auth::user() == $post->user ? '/profile' : '/profile/' . $post->user->id }}">{{ $post->user->name }}</a></small>
                        <small class="font-italic mb-0">Дата: {{ $post->created_at }}</small>
                    </div>

                    <div class="col-md-6 text-right" style="right: 0">
                        <small>{{ $count }}</small>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-dots" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                            <path
                                d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                        <small>{{ $post->views }}</small>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                    </div>
                </div>
                <div class="row mt-2 align-items-end">
                    <div class="col-md-12">
                        <small class="font-italic mb-0 mr-3">Tags:
                            @foreach($post->tags as $tag)
                            {{ $tag->name }} |
                            @endforeach
                        </small>
                    </div>
                </div>

                <hr align="center" />
                @include('error-validate')

                <form action="{{ route('create-comment') }}" class="mb-4" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">

                    <div class="form-group">
                        <label for="body">Оставь коммент</label>
                        <textarea class="form-control" id="body" rows="3" placeholder="Пишите тут..."
                            name="body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить коммент</button>
                </form>

                <hr align="center" />

                <h3 class="font-italic mb-0 text-center">Комменты к посту</h3>

                @include('comments', ['comments' => $post->comments])
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalLabel">Коммент для коммента</h4>
            </div>
            <div class="modal-body">
                <div class="p-4 rounded shadow-sm bg-light" id="current-comment">
                </div>

                <form action="{{ route('create-comment') }}" method="post" id="reply-comment-form" class="mt-4">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                    <input type="hidden" name="parent_id" id="parent_id">

                    <div class="form-group">
                        <textarea class="form-control" id="body" rows="3" placeholder="Пиши тут ..."
                            name="body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить коммент</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('js/comments.js') }}"></script>
@endsection
