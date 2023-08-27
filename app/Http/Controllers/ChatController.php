<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function chat_with(User $user)
    {
        // return $user;

        // Usuario que esta logueado
        $user_a = auth()->user();

        // Usuario al que se desea acceder
        $user_b = $user;

        $chat = $user_a->chats()->wherehas('users', function ($q) use ($user_b) {
            $q->where('chat_user.user_id', $user_b->id);
        })->first();

        if (!$chat) {

            $chat = \App\Models\Chat::create([]);

            $chat->users()->sync([$user_a->id, $user_b->id]);
        }

        return redirect()->route('chat.show', $chat);
    }

    public function show(Chat $chat)
    {
        abort_unless($chat->users->contains(auth()->id()), 403);

        return redirect()->route('chat.index', [
            'chat' => $chat
        ]);
    }

    // Obtener users del chat
    public function get_users(Chat $chat)
    {
        $users = $chat->users;

        return response()->json([
            'users' => $users
        ]);
    }

    // Obtener los mensajes del chat
    public function get_messages(Chat $chat)
    {
        $message = $chat->messages()->with('user')->get();

        return response()->json([
            'messages' => $message
        ]);
    }


    // Funciones de ejemplo

}
