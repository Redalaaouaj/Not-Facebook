@extends('layouts.app')
@section('content')

<div class="h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-3">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                            <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-3 mt-3">Sign up</p>
                            <form action="{{route('login.register')}}" method="post" class="container">
                                @csrf

                                <div class="d-flex flex-row align-items-center mb-3">
                                    <i class="fas fa-user fa-lg me-2 fa-fw"></i>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control border-dark" name="name" value="{{old('name')}}" />
                                        @error('name')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-envelope fa-lg me-2 fa-fw"></i>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control border-dark" name="email" value="{{old('email')}}" />
                                        @error('email')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-lock fa-lg me-2 fa-fw"></i>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control border-dark" name="password" />
                                        @error('password')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-key fa-lg me-2 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="password" id="form3Example4cd" class="form-control" />
                                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                    </div>
                                </div> -->

                                <!-- <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                    <label class="form-check-label" for="form2Example3">
                                        I agree all statements in <a href="#!">Terms of service</a>
                                    </label>
                                </div> -->
                                    <input type="submit" class="btn btn-info btn-lg" value="Register">
                                    <a href="{{route('login.form')}}">Already have an account?</a>

                            </form>

                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection