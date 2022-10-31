<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('user_id', Auth::id())->get();

        return view('user.message', [
            'messages' => $messages
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => ['required', 'string']
        ]);

        try{

            $message = new Message();
            $message->user_id = Auth::id();
            $message->message = $request->message;
            $request->action = 1;
            $message->save();

            return redirect()->back()->with('success', 'You successfully sent message');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
