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
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Register Now</h2>
            <form method="POST" action="{{ route('login') }}">
            @csrf
		    <form class="login-form">
                <div class="form-group">
                <div>
                    <label for="login">Email or Phone Number</label>
                    <input id="login" class="form-control" type="text" name="login" required autofocus>
                </div>
            </div>

<div class="form-group">
    <label for="password" class="text-uppercase">{{ __('Password') }}</label>
    <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
    <div class="form-check">
    <button type="submit" class="btn btn-login float-right">   {{ __('login') }}</button>
  </div>
  
</form>
</form>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid carousel-image" src="https://www.oneeducation.org.uk/wp-content/uploads/2020/08/Become-a-Medical-Laboratory-Technician.png" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                                <h2>Quick and Easy Registration for Reliable Lab Services</h2>
                                <p>and Take Control of Your Health!
                                    Your Health, Our Priority.</p>
                            </div>
                        </div>
                    </div>
                  
                 
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
        
            /* Optional: Style adjustments for captions */
           
        
            .banner-sec {
                margin: auto;
                max-width: 100%;
            }
        </style>
        
</div>

</section>
@endsection