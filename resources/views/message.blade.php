@extends('layouts.app')

@section('title')
    {{ "Write ".$user->name." an anonymous message | ".config('app.name') }}
@endsection

@section('content')
    <div class="container mt-4 px-0">
        <div class="row justify-content-center">
    
            <div class="col-md-8">
                <span class="title">Hey, there.</span>
                <div class="card shadow-lg">
                    <div class="card-header">Your private message to <b>{{ $user->name }}</b></div>
    
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="alert alert-info"><i class="fas fa-info-circle"></i> Be honest or crazy if you like <i class="far fa-grin-squint-tears"></i>.</div>
                        
                        <form action="{{ route('send-message', ['user_private_link'=>$user->private_link]) }}" method="post">
                            @csrf
                            <textarea name="message" placeholder="Enter your message here.." cols="30" rows="5" class="form-control mb-1" minlength="10" required></textarea>
                            <input type="submit" value="Send message" class="btn btn-blueviolet float-right">
                        </form>
                    </div>
                </div>
            </div>
            <div class="clip-message" style="margin-top:-80px;"></div>
        </div>
    </div>
@endsection