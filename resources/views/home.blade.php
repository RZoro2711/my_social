@extends('layout.app')
@section('content')
    <div class="container-sm w-100">
        <div class="custom-container-lg">
            <div class="header-new my-2">
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
                <a href="{{ route('content') }}" class="btn text-dark rounded-pill bg-light float-end">+ ADD NEW CONTENT</a>
            </div>
            @foreach ($contents as $content)
                <div class="card my-2">
                    <div class="card-header">
                        <div class="header">
                            <span class="real_default">
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
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <i>Tap to View Detail Of This Post</i>
                            <b>Comments -> {{ count($content->comment) }}</b>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
