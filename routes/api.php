<?php

use App\Events\SendMessageEvent;
use App\Http\Controllers\ChateMessagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('/send-message', function () {
//     $receiver = 'User1';
//     $message = 'Hello from Laravel!';

//     broadcast(new SendMessageEvent($receiver, $message))->toOthers();

//     return 'Message sent!';
// });

Route::get('/get-chat/{userId}',[ChateMessagesController::class, 'getChat']);
Route::post('/send-message/{userId}',[ChateMessagesController::class, 'sendMessage']);

