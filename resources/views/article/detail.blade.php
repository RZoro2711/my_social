@extends('layout.app')
@section('content')
    <div class="container-sm w-100">
        <div class="custom-container-lg">
            <div class="my-2">
                <span class="real_default">
                    @if (auth()->user()->profile_photo)
                        <a class="real_default_div" href="{{ route('profile') }}"><img
                                src="{{ asset('uploads/users/' . auth()->user()->profile_photo) }}" width="40px"
                                class="real_profile"></a>
                    @else
                        <a class="real_default_div" href="{{ route('profile') }}"><img
                                src="{{ asset('images/unknown.png') }}" width="40px" class="default_profile"></a>
                    @endif
                </span>
                <a href="{{ route('content') }}" class="btn btn-primary float-end">+ ADD NEW CONTENT</a>
            </div>
            <div class="card my-2">
                <div class="card-header">
                    <div class="header">
                        <span class="real_default">
                            @if ($content->user->profile_photo)
                                <a class="real_default_div" href="{{ route('profile') }}"><img
                                        src="{{ asset('uploads/users/' . $content->user->profile_photo) }}" width="40px"
                                        class="real_profile"></a>
                            @else
                                <a class="real_default_div" href="{{ route('profile') }}"><img
                                        src="{{ asset('images/unknown.png') }}" width="40px" class="default_profile"></a>
                            @endif
                        </span>
                        <b>{{ $content->user->name }} <br>
                            {{ $content->created_at->diffForHumans() }}
                        </b>
                    </div>
                    <i class="fas fa-bars  dropdown" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/content/edit/' . $content->id) }}">Edit</a></li>
                        <li><a class="dropdown-item" href="{{ url('content/delete/' . $content->id) }}">Delete</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <p>{{ $content->content }}</p>
                    <div class="card_body_img">
                        @if ($content->content_photo)
                            <img src="{{ asset('uploads/content/' . $content->content_photo) }}">
                        @endif
                    </div>
                </div>
                <a href="{{ url('/content/detail/' . $content->id) }}" class="text-decoration-none text-dark">
                    <div class="card-footer">
                        <b>Comments -> {{ count($content->comment) }}</b>
                    </div>
                </a>
                <ul class="list-group">
                    @foreach ($content->comment as $comment)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <p> <span class="real_default">
                                    @if ($content->user->profile_photo)
                                        <a class="real_default_div" href="{{ route('profile') }}"><img
                                                src="{{ asset('uploads/users/' . $content->user->profile_photo) }}"
                                                width="40px" class="real_profile"></a>
                                    @else
                                        <a class="real_default_div" href="{{ route('profile') }}"><img
                                                src="{{ asset('images/unknown.png') }}" width="40px"
                                                class="default_profile"></a>
                                    @endif
                                </span>
                                <b>{{ $comment->user->name }}</b> <i>{{ $comment->created_at->diffForHumans() }}</i>
                                <br><span class="ms-5">{{ $comment->comment }}</span>
                            </p>

                            <a href="{{ url('comment/delete/' . $comment->id) }}"
                                class="text-dark fs-2 text-decoration-none">&times;</a>
                        </li>
                    @endforeach
                </ul>

            </div>
            <button class="btn btn-secondary w-100 text-dark text-start" data-bs-toggle="modal"
                data-bs-target="#feedback">Comment
                Here - - - </button>
            <div class="modal" id="feedback">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Comment</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('comment') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="content_id" value="{{ $content->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="text" name="comment" class="form-control">

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary">
                                    Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
