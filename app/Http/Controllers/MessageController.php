<?php

namespace App\Http\Controllers;

use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function index()
    {
        return MessageResource::collection(Message::all())->resolve();
    }

    public function show(Message $message)
    {
        return MessageResource::make($message)->resolve();
    }

    public function store() {
        $data = [
            'content' => 'content 322',
        ];

        $message = Message::create($data);

        return MessageResource::make($message)->resolve();
    }

    public function update(Message $message)
    {
        $date = md5(now());
        $data = [
            'content' => 'content post 32323' . $date,
        ];

        $message->update($data);
        return MessageResource::make($message)->resolve();
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return response(['message' => 'message deleted successfully']);
    }
}
