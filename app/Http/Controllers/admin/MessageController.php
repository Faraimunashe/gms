<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Exception;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($userid)
    {
        $messages = Message::where('user_id', $userid)->get();

        return view('admin.message', [
            'messages' => $messages,
            'user_id' => $userid
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => ['required', 'string'],
            'user_id' => ['required', 'integer']
        ]);

        try{

            $message = new Message();
            $message->user_id = $request->user_id;
            $message->message = $request->message;
            $message->save();

            return redirect()->back()->with('success', 'You successfully sent message');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
