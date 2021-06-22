@extends('layouts.app')

@section('content')
    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-4 pb-4 cover">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            @foreach ($errors->all() as $error)
                                <h4><i class="icon fa fa-check"></i>{{ $error }}</h4>
                            @endforeach
                        </div>
                    @endif

                    <h2 class="text-center">{{ $title }}: {{ $count }}</h2>
                    @foreach($posts as $post)
                        <div class="p-4 rounded shadow-sm bg-light mt-4">
                            <h3 class="font-italic mb-0 text-center">{{ $post->title }}</h3>
                            <p class="font-italic mb-0 row body-post overflow-hidden">{{ $post->body }}</p>
                            <div class="row mt-2 align-items-end">
                                <div class="col-md-6">
                                    <small class="font-italic mb-0 mr-3">Автор: <a
                                            href="{{ Auth::user() == $post->user ? '/profile' : '/profile/' . $post->user->id }}">{{ $post->user->name }}</a></small>
                                    <small class="font-italic mb-0">Дата: {{ $post->created_at }}</small>
                                </div>

                                <div class="col-md-6 text-right" style="right: 0">
                                    @if(Auth::check() && Auth::user()->id == $post->user->id)
                                        <small><a
                                                href="{{ route('show-update-post', [Auth::user()->id, $post->id]) }}"
                                                class="mr-3">Редактировать</a></small>
                                    @endif
                                    <small><a href="{{ route('show-post', $post->id) }}"
                                              class="mr-3">Просмотреть</a></small>
                                    <small>{{ $post->comments->count() }}</small>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-dots"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                        <path
                                            d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                    <small>{{ $post->likes }}</small>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path fill-rule="evenodd"
                                              d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/posts.js') }}"></script>
@endsection
