<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Message\StoreRequest;
use App\Http\Requests\Api\Message\UpdateRequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        return MessageResource::collection(Message::all())->resolve();
    }

    public function show(Message $message)
    {
        return MessageResource::make($message)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $message = MessageService::createMessage($data);
        return MessageResource::make($message)->resolve();
    }

    public function update(UpdateRequest $request, Message $message)
    {
        $data = $request->validated();
        $message = MessageService::updateMessage($data, $message);
        return MessageResource::make($message)->resolve();
    }

    public function destroy(Message $message) {
        return MessageService::deleteMessage($message);
    }
}
