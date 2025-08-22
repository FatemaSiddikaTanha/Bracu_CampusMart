<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // USER: view messages
    public function index()
    {
        $userId = Auth::id();

        $messages = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'asc')
            ->with('sender', 'receiver')
            ->get();

        $admins = User::where('usertype','admin')->get(); 

        return view('home.message', compact('messages', 'admins'));
    } 

    
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $admin = User::where('usertype','admin')->first() ?? User::find(1);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $admin->id,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Message sent!');
    }

    
    public function adminIndex()
    {
    $user = User::count();
    $product = Product::count();
    $order = Order::count();
    $delivered = Order::where('status','delivered')->count();

    $messages = Message::with('sender','receiver')
        ->orderBy('created_at','desc')
        ->get();

    $count = Message::count(); 

    return view('admin.message', compact('user','product','order','delivered','messages','count'));
    }

    public function adminSendMessage(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->user_id,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Message sent!');
    }
}
