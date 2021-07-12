@extends('layouts.app')

@section('content')
    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-4 pb-4 cover">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                        </div>
                    @endif
                    <form method="post" action="{{ route('update-post') }}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="body">Тело поста</label>
                            <textarea class="form-control" id="body" rows="3" placeholder="Пишите тут..."
                                      name="body" required>{{ $post->body }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="category">Категория</label>
                            <input type="text" class="form-control" list="category_name" id="category"
                                   name="category_name" autocomplete="off" required value="{{ $post->category->name }}">
                        </div>

                        <datalist id="category_name">
                        </datalist>

                        <div class="form-group">
                            <label for="tag">Теги</label>
                            <input type="text" class="form-control" list="tags-name" id="tag"
                                   autocomplete="off">
                            <input type="hidden" name="tag" id="array-tag" required>
                            <div id="tags-list">
                                @foreach($post->tags as $tag)
                                    <span class="badge badge-pill badge-success mr-1">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>

                        <datalist id="tags-name">
                        </datalist>

                        <div class="form-group">
                            <label for="photo">Фото</label>
                            <input type="file" class="form-control" id="photo"
                                   name="photo">
                        </div>


                        <button type="submit" class="btn btn-primary">Обновить пост</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/update-post.js') }}"></script>
@endsection
