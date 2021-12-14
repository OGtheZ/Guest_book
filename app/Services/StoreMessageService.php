<?php

namespace App\Services;

use App\Models\Message;

class StoreMessageService
{
    public function storeMessage(string $username, string $email, ?string $url, string $message, string $ip, string $browserInfo): void
    {
        $message = new Message([
            'username' => $username,
            'email' => $email,
            'url' => $url,
            'message' => $message,
            'ip' => $ip,
            'browser_info' => $browserInfo
        ]);
        $message->save();
    }
}
