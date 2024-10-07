<?php

namespace App\Http\Controllers;

use App\Events\SendMessageEvent;
use App\Models\ChateMessages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChateMessagesController extends Controller
{
    public function getChat($userId)
    {

        $user = User::find($userId);
        if (!$user) {
            return response()->json('NOT FOUND ', 404);
        }
        $chat = ChateMessages::where('send_id', $userId)->paginate(50);

        return response()->json($chat, 200);
    }

    public function sendMessage(Request $request, $userId)
    {
        $validator = Validator::make(request()->all(), [
            'message' => 'nullable|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::find($userId);
        if (!$user) {
            return response()->json('NOT FOUND ', 404);
        }

        ChateMessages::create([
            'send_id' => 1,
            'receiver_id' => $userId,
            'message' => $request->input('message')
        ]);
        event(new SendMessageEvent($userId, $request->input('message')));
    }
}
