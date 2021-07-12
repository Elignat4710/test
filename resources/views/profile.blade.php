@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/profile.css') }}">
@endsection

@section('content')
    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3">
                            <img
                                src="{{ Auth()->user()->file_id == 1 ? Auth()->user()->file->name : '/storage/' . Auth()->user()->file->name }}"
                                alt="..." width="130" class="rounded mb-2 img-thumbnail"
                            >
                            <form id="form-edit-photo">
                                @csrf
                                <a href="#"
                                   class="btn btn-outline-dark btn-sm btn-block"
                                   id="edit-photo"
                                >
                                    Edit photo
                                </a>
                                <input type="file" name="avatar" class="d-none" id="file">
                            </form>

                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-0">{{ Auth::user()->name }}</h4>
                            <p class="small mb-4"><i ass="fas fa-map-marker-alt mr-2"></i></p>
                        </div>
                    </div>
                </div>
                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">{{ count($posts) }}</h5><small class="text-muted">
                                <i
                                    class="fas fa-image mr-1"></i>Постов</small>
                        </li>
                    </ul>
                </div>
                <div class="px-4 py-3">
                    <h5 class="mb-0">Список постов автора</h5>
                    @foreach($posts as $post)
                        <div class="p-4 rounded shadow-sm bg-light mt-4">
                            <p class="font-italic mb-0">{{ $post->title }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/profile.js') }}"></script>
@endsection
