<?php

namespace App\Services;

use App\Models\Message;
use Illuminate\Http\JsonResponse;

class MessageService
{
    public static function createMessage(array $data): Message
    {
        return Message::create($data);
    }

    public static function updateMessage(array $data, Message $message): Message
    {
        $message->update($data);
        return $message;
    }

    public static function deleteMessage(Message $message): JsonResponse
    {
        $message->delete();
        return response()->json([
            'message' => 'Message deleted successfully'
        ], 200);
    }
}
