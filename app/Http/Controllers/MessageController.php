<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Events\ChatMessageSent;
use App\Events\UnreadMessages;
use App\Models\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sent(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'content' => $request->message,
            'chat_id' => $request->chat_id
        ])->load('user');

        broadcast(new MessageSent($message))->toOthers();

        return $message;
    }

    // Student
    // Función para obtener todos los mensajes
    public function getMessagesStudent(Request $request){
        $message = Message::where('chat_id', $request->chatId)->get();
        return $message;
    }

    // Función oficial para almacenar mensajes
    public function sentMessageUser(Request $request)
    {
        $message = new Message;

        $message->content = $request->message;
        $message->user_id = $request->idStudent;
        $message->typeuser = $request->typeUser;
        $message->chat_id = $request->idchat;
        if ($request->statusUser) {
            $message->readDate = date('Y-m-d H:i:s');
        }
        $message->save();

        if ($request->statusUser) {
            broadcast(new ChatMessageSent($message))->toOthers();
        }else{
            broadcast(new UnreadMessages($message,$request->idChanelUser))->toOthers();
        }
        

        return $message;
    }

    public function readAllMessagesUser(Request $request){
        $registros = Message::where('chat_id', $request->chatId)
                    ->whereNull('readDate')
                    ->where('typeuser', '!=', $request->typeUser)
                    ->get();
        // Actualizar la fecha en los registros encontrados
        foreach ($registros as $registro) {
            $registro->readDate = now(); // Utiliza la función now() para obtener la fecha y hora actual
            $registro->save();
        }

        return true;
    }
    
    // Company
    // Función para obtener todos los mensajes
    public function getMessagesCompany(Request $request){
        $message = Message::where('chat_id', $request->chatId)->get();
        return $message;
    }
    // Función oficial para almacenar mensajes
    public function sentMessageCompany(Request $request)
    {
        $message = new Message;

        $message->content = $request->message;
        $message->user_id = $request->idCompany;
        $message->typeuser = $request->typeUser;
        $message->chat_id = $request->idchat;
        $message->save();

        if ($request->statusUser) {
            broadcast(new ChatMessageSent($message))->toOthers();
        }else{
            broadcast(new UnreadMessages($message,$request->idChanelUser))->toOthers();
        }

        return $message;
    }

    public function readAllMessagesCompany(Request $request){
        $registros = Message::where('chat_id', $request->chatId)
                    ->whereNull('readDate')
                    ->where('typeuser', '!=', $request->typeUser)
                    ->get();
        // Actualizar la fecha en los registros encontrados
        foreach ($registros as $registro) {
            $registro->readDate = now(); // Utiliza la función now() para obtener la fecha y hora actual
            $registro->save();
        }

        return $registros;
    }
}
