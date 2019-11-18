@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-social.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="mt-5 text-center">
                <div class="custom-card shadow-lg">
                    <div class="m-2">
                        <a href="{{ route('social-login', ['service'=>'facebook']) }}" class="btn btn-social btn-facebook">
                                <i class="fab fa-facebook-f"></i> Login via Facebook</a>
                    </div>
                    <div class="m-2">
                        <a href="{{ route('social-login', ['service'=>'twitter']) }}" class="btn btn-social btn-twitter">
                            <i class="fab fa-twitter"></i> Login via Twitter</a>
                    </div>
                    <div class="m-2">
                        <a href="{{ route('social-login', ['service'=>'google']) }}" class="btn btn-social btn-google">
                            <img src="{{ asset('images/G__logo.svg.png') }}" alt="Google logo"> Login via Google</a>
                    </div>
                </div>
            </div>
        </div><div class="clip-login" style="margin-top:-60px;"></div>
    </div>
</div>
@endsection
