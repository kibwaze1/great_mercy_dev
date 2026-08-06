<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        $unreadCount = Message::where('is_read', false)->count();
        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    public function show(Message $message)
    {
        $message->markAsRead();
        return view('admin.messages.show', compact('message'));
    }

    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $message->update([
            'reply' => $request->reply,
            'replied_at' => now(),
        ]);

        // Send reply email
        try {
            Mail::raw("Dear {$message->name},\n\n{$request->reply}\n\n---\nOriginal Message:\n{$message->message}\n\nRegards,\nGreat Mercy School Team", function ($mail) use ($message) {
                $mail->to($message->email)
                    ->subject('Re: ' . $message->subject)
                    ->replyTo(config('mail.from.address'), config('mail.from.name'));
            });
        } catch (\Exception $e) {
            // Log error but don't fail
        }

        return redirect()->route('admin.messages.index')
            ->with('success', 'Reply sent successfully.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }

    public function markAllRead()
    {
        Message::where('is_read', false)->update(['is_read' => true]);
        return redirect()->route('admin.messages.index')
            ->with('success', 'All messages marked as read.');
    }
}
