@extends('layouts.app')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <!--styles-->
    <link href="/css/log.css" rel="stylesheet">
    @section('content')
<section class="login-block">
    <div class="container">
	<div class="row">
		<!-- Image on the left side -->
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid carousel-image" src="https://www.oneeducation.org.uk/wp-content/uploads/2020/08/Become-a-Medical-Laboratory-Technician.png" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                                <h2>Quick and Easy Registration for Reliable Lab Services</h2>
                                <p>and Take Control of Your Health! Your Health, Our Priority.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<!-- Registration form on the right side -->
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Register Now</h2>
            <form method="POST" action="{{ route('register') }}">
            @csrf
		    <form class="login-form">
                <div class="form-group">
                    <label for="name" class="text-uppercase">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="text-uppercase">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number" class="text-uppercase">{{ __('Phone Number') }}</label>
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="text-uppercase">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="text-uppercase">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check">
                    <button type="submit" class="btn btn-login float-right">{{ __('Register') }}</button>
                </div>
            </form>
		</div>
	</div>
</div>

        <style>
            /* Ensure all images are the same size */
            .carousel-inner {
                height: 500px; /* Set a consistent height for the carousel */
            }
        
            .carousel-image {
                width: 100%; /* Full width of the carousel */
                height: 100%; /* Full height of the carousel */
                object-fit: cover; /* Maintain aspect ratio while filling the container */
            }
        
            .banner-sec {
                margin: auto;
                max-width: 100%;
            }

            .login-sec {
                background-color: #f7f7f7;
                padding: 30px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }

            .btn-login {
                background-color: #007bff;
                color: white;
            }
        </style>
        
</section>
@endsection
