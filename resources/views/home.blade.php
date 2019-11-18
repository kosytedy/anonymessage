@extends('layouts.app')
@section('title')
    {{ $user->name."'s Dashboard | ".config('app.name') }}
@endsection

@section('content')
<div class="container mt-4 px-0">
    <div class="row justify-content-center">

        <div class="col-md-8 mb-5">
            <span class="title">Welcome, {{ $user->name }}.</span>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Your private link</div>

                <div class="card-body">
                    <div class="alert alert-primary">Share the link below to your friends and get honest and anonymous messages about you from them <i class="far fa-grin-squint-tears default-color-alt"></i>.</div>
                    <div class="text-bold default-color mb-5" id="private_link">{{ route('private-link', ['user_private_link'=>$user->private_link]) }}</div> 
                    <button class="btn btn-blueviolet" onclick="copyLink();" id="copy-btn">Copy link</button>
                </div>
            </div>
            <hr>
            <span class="title" style="font-size:20px;">My Recent Messages</span>
            @if($messages->count()>0)
                @foreach ($messages as $message)
                    <div class="message-card shadow-sm col-md-12 mx-0 my-2">
                        <div class="card-header">{{ date('D jS M, Y @ g:ia', strtotime($message->created_at)) }}</div>
                        <div class="card-body">
                            {{ $message->message }}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="message-card shadow-sm col-md-12 mx-0 my-2">
                    <div class="card-header">No message yet</div>
                    <div class="card-body">
                        You haven't recieved any messages yet. Share your private link to your friends to get anonymous messages from them.
                    </div>
                </div>
            @endif
            {{ $messages->links() }}
        </div>
        <div class="clip-dashboard" style="margin-top:-80px;"></div>
    </div>
</div>
@endsection

@section('js')
    <script>
        function copyLink() {
            const link = document.getElementById('private_link').innerText;
            const el = document.createElement('textarea'); 
            el.value = link;                                
            el.setAttribute('readonly', '');               
            el.style.position = 'absolute';                 
            el.style.left = '-9999px';                    
            document.body.appendChild(el);                  
            const selected =            
                document.getSelection().rangeCount > 0       
                ? document.getSelection().getRangeAt(0)    
                : false;                                   
            el.select();                                    
            document.execCommand('copy');                   
            document.body.removeChild(el);                  
            if (selected) {                                 
                document.getSelection().removeAllRanges();    
                document.getSelection().addRange(selected);   

                document.getElementById('copy-btn').innerHTML = "Link copied!";
                setTimeout(function() {
                    document.getElementById('copy-btn').innerHTML = "Copy link";
                }, 2000);
            }
        }
    </script>
@endsection