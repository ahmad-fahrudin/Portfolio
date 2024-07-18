@extends('auth.auth_master')

@section('title', 'Register')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center mt-4">
                <div class="mb-3">
                    <a href="#" class="auth-logo">
                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto"
                            alt="">
                        <img src="{{ asset('backendassets/images/logo-light.png') }}" height="30"
                            class="logo-light mx-auto" alt="">
                    </a>
                </div>
            </div>

            <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

            <div class="p-3">
                <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}" id="myForm">
                    @csrf
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="name" type="text" placeholder="Name" name="name"
                                required>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="email" type="text" required="" placeholder="Email"
                                name="email">
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="password" type="password" required="" placeholder="Password"
                                name="password">
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="password_confirmation" type="password" required=""
                                placeholder="Password Confirmation" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                    </div>

                    <div class="form-group text-center row mt-3 pt-1">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>

                    <div class="form-group mt-2 mb-0 row">
                        <div class="col-12 mt-3 text-center">
                            <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                        </div>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div>
        <!-- end cardbody -->
    </div>
    <!-- end card -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script class="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                    password_confirmation: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please enter your Name',
                    },
                    email: {
                        required: 'Please enter your Email',
                    },
                    password: {
                        required: 'Please enter your Password',
                    },
                    password_confirmation: {
                        required: 'Please enter your Password Validation',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
