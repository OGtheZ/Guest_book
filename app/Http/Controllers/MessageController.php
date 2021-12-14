<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Services\StoreMessageService;
use App\Services\UserBrowserInfoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class MessageController extends Controller
{
    private UserBrowserInfoService $userBrowserInfoService;
    private StoreMessageService $storeMessageService;

    public function __construct(UserBrowserInfoService $userBrowserInfoService,
                                StoreMessageService    $storeMessageService)
    {
        $this->userBrowserInfoService = $userBrowserInfoService;
        $this->storeMessageService = $storeMessageService;
    }

    public function index(): view
    {
        $messages = Message::sortable()->orderBy('created_at', 'desc')->paginate(10);
        return view('main', [
            'messages' => $messages
        ]);
    }

    public function saveMessage(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'message' => 'required|max:255',
            'g-recaptcha-response' => 'recaptcha',
        ]);
        $browserInfo = $this->userBrowserInfoService->getBrowserInfo();
        $this->storeMessageService->storeMessage(
            $request->username,
            $request->email,
            $request->url,
            $request->message,
            $request->ip(),
            $browserInfo
        );
        Session::flash('success', "You just added a message!");
        return redirect()->back();
    }
}
