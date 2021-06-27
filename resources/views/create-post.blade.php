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
                    <form method="post" action="{{ route('create-post') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="body">Тело поста</label>
                            <textarea class="form-control" id="body" rows="3" placeholder="Пишите тут..."
                                      name="body"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Категория</label>
                            <input type="text" class="form-control" list="category_name" id="category" name="category_name" autocomplete="off">
                        </div>

                        <datalist id="category_name">
                        </datalist>

                        <button type="submit" class="btn btn-primary">Создать пост</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ 'js/create-post.js' }}"></script>
@endsection
