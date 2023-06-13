@extends('layout.app')
@section('content')
    <div class="register-login-main d-block mx-auto">
        <div class="container register-login-div ">
            <p class="text-center bg-primary text-light p-1 py-2 d-block w-25 rounded mx-auto">My Social</p>
            <h5 class="text-center">Edit Your Content</h5>
            <p class="text-center">
                <i class="fa-solid fa-mug-hot"></i>
                 Welcome !
                <i class="fa-solid fa-mug-hot"></i>
            </p>
            <form action="{{url('/content/update/')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="content_id" value="{{$content->id}}">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="mb-3 form-floating">
                    <textarea name="content" class="form-control" placeholder="Write Here . . . ">{{$content->content}}</textarea>
                    <label for="">Write Here . . .</label>
                </div>
                <div class="mb-3">
                    <img src="{{asset('uploads/content/'.$content->content_photo)}}" width="100px">
                    <input type="file" name="content_photo" class="form-control">
                </div>
                <button class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
@endsection
