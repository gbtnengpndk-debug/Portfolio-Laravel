<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(10);

        $unreadCount = Message::where('is_read', false)->count();

        return view('admin.messages.index', compact(
            'messages',
            'unreadCount'
        ));
    }

    public function markAsRead(Message $message)
    {
        $message->update([
            'is_read' => true,
        ]);

        return back()->with(
            'success',
            'Pesan ditandai sudah dibaca.'
        );
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return back()->with(
            'success',
            'Pesan berhasil dihapus.'
        );
    }
}