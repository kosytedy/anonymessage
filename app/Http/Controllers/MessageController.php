<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class MessageController extends Controller
{
    /**
     * Send private message to user.
     */
    public function sendMessage($user_private_link){

        $user = $this->userByPrivateLink($user_private_link);

        return view('message', compact('user'));
    }

    /**
     * Send private message to user.
     */
    public function postMessage($user_private_link, Request $request){

        $user = $this->userByPrivateLink($user_private_link);

        $request->validate([
            'message'=> ['required', 'min:10', 'max:500'],
        ]);

        $user->messages()->create([
            'message' => strip_tags($request->message),
        ]);

        //Send the user an email notification 
        

        return redirect()->route('message-success')->with('status', 'You have sent '.$user->name.' an anonymous messsage!!');
    }

    /**
     * Check if private link is valid
     */
    public function userByPrivateLink($privateLink){
        return User::where('private_link', $privateLink)->firstOrFail();
    }

    /**
     * Show success message and a link to account creation after successful message
     */
    public function success(){
        return view('success');
    }
    
}
