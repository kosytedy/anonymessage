@extends('layouts.app')

@section('content')
    <div class="container mt-4 px-0">
        <div class="row justify-content-center">
    
            <div class="col-md-8">
                <div class="custom-card shadow-lg">
                    <span class="title">Hoo hoo!.</span>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check"></i> {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="mb-3">Now it's your turn to know what your friends honestly think of you! I mean, why wouldn't you want to know?</h4>
                    <a href="{{ route('login') }}" class="btn btn-blueviolet">Generate my link</a>
                </div>
            </div>
            <div class="clip-success" style="margin-top:-80px;"></div>
        </div>
    </div>
@endsection