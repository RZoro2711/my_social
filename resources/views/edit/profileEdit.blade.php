@extends('layout.app')
@section('title', 'Login')
@section('content')
    <div class="w-100 register-login-main d-block mx-auto">
        <div class="container-sm w-100 register-login-div">
            <div class="custom-container-lg">
                <p class="text-center bg-primary text-light p-2 d-block w-25 rounded mx-auto"><i>MY SOCIAL</i></p>
                <h5 class="text-center">Add Your Detail</h5>
                <p class="text-center">
                    <i class="fa-solid fa-mug-hot"></i>
                    Welcome From <i>My Social</i>
                    <i class="fa-solid fa-mug-hot"></i>
                </p>
                <form action="{{ route('profile_update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                    <div class="d-flex justify-content-between">
                        <div class="mb-3 form-floating w-50 me-2">
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name"
                                value="{{ auth()->user()->name }}">
                            <label for="name">Enter Your Name</label>
                        </div>
                        <div class="mb-3 form-floating w-50">
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Emain"
                                value="{{ auth()->user()->email }}">
                            <label for="email">Enter Your Email</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        <div class="mb-3 form-floating w-50 me-2">
                            <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone"
                                value="{{ auth()->user()->phone }}">
                            <label for="phone">Enter Your Phone</label>
                        </div>
                        <div class="mb-3 form-floating w-50">
                            <input type="file" name="profile_photo" class="form-control">
                            <label for="profile_photo">Input Your Photo</label>

                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="mb-3 form-floating w-50 me-2">
                            <input type="date" name="dob" class="form-control" placeholder="Enter Your Date Of Birth"
                                value="{{ auth()->user()->date }}">
                            <label for="dob">Enter Your Date Of Birth</label>
                        </div>
                        <div class="mb-3 form-floating w-50">
                            <select name="gender" class="form-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Unknown">Unknown Gender</option>
                            </select>
                            <label for="gender">Select Your Gender</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        <div class="mb-3 form-floating w-100">
                            <textarea name="address" class="form-control" placeholder="Enter Your Address">{{ auth()->user()->address }}</textarea>
                            <label for="Address">Enter Your Address</label>
                        </div>
                    </div>
                    <button class="btn btn-primary w-50 p-2 d-block mx-auto">Add Detail</button>
                </form>
            </div>
        </div>
    </div>
@endsection
