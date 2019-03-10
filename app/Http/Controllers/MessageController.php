<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Message;

class MessageController extends Controller
{
	public function __construct() {

		$this->middleware('auth');
        
	}

    protected function create() {

        $messages = auth()->user()->messages;

        if($messages->first() == null) {

            $users = null;

            return view('Message.message', compact('messages', 'users'));

        } else {

            $users = Message::find(auth()->user()->messages->first()->user_id)->users->user_id;

            return view('Message.message', compact('messages', 'users'));   

        }

    }

    protected function store(Request $request) {

    	$validator = Validator::make($request->all(), [
    		'title' => ['required', 'string', 'max:255'],
    		'content' => ['required', 'string', 'max:255']	
    	]);

    	Message::create([
    		'user_id' => Auth::user()->id,
    		'title' => $request['title'],
    		'content' => $request['content']
    	]);

    	return redirect('/contact');

    }

    protected function edit() {

    }

    protected function update() {

    }

    protected function destroy() {

    	Message::find($_POST['id'])->delete();

    	return redirect('/contact');

    }

}
