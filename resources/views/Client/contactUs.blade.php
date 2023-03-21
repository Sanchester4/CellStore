@extends('base')

@section('content')

<!-- contact section -->
    <div class="contact" style="margin-bottom: 120px; margin-top: 40px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-8">
                    <div class="section-title">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>

            @if(session('status'))
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success ! </strong>  &nbsp; {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="login-form">
                        <form method="POST" action="{{ route('addContact') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-bottom:25px;">
            
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Full Name') }}</label>
            
                                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ isset(Auth::user()->firstname) ? Auth::user()->firstname : '' }} {{ isset(Auth::user()->lastname) ? Auth::user()->lastname : '' }}" required autocomplete="Fullname" autofocus>
            
                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-6">
            
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-md-right">{{ __('Email Address') }}</label>
            
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" required autocomplete="email" autofocus>
            
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                </div>
            
                                <div class="col-6">
                                    
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Phone Number') }}</label>
            
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ isset(Auth::user()->phone_number) ? Auth::user()->phone_number : '' }}" required autocomplete="phone_number" autofocus>
            
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
                                <div class="col-6">
                            
                                
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Subject') }}</label>
            
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" required autofocus>
            
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
                                <div class="col-6">
                                    <div class="form-group">
            
                                        <label for="password" class="col-form-label text-md-right">{{ __('Message') }}</label>
            
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" required></textarea>
            
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
            
                                <div class="col-6">
                            
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Attach Screenshot') }}</label>
            
                                        <input type="file" accept="image/*" class="form-control @error('screenshot') is-invalid @enderror" name="screenshot" autofocus>
            
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Message') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <h3 style="text-align:center; margin-top:25px;">Where you can find us:</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2854.857726148527!2d23.849967215459326!3d44.31287527910425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4752d6e54ffa5e05%3A0xef2f608a22a34e97!2sCalea%20Bucure%C8%99ti!5e0!3m2!1sen!2sro!4v1679421615288!5m2!1sen!2sro" width="600" height="450" style="border:0; margin-left: 100px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/c2a1454648.js" crossorigin="anonymous"> </script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/categoriesSticky.js')}}"></script>
@endsection