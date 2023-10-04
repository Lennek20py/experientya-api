<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Company;
use App\Models\User;
use App\Models\ChatCompanyStudent;
use App\Models\Message;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ChatCompanyStudentController extends Controller
{
    //+++++++++++++++++ Compay +++++++++++++++++
    // Crear un nuevo chat con un estudiante o obtener el id del chat existente
    public function chat_with_student(Request $request)
    {
        $resultado = '';
        // Obtener todos los datos de una tabla
        $users = User::all();
        // Utilizar método where
        $userWhere = User::where('user_last_name', 'Soto')->get();
        // Doble where
        $userWhere = User::where('user_last_name', 'Soto')->where('id', 15)->get();

        // Busqueda de chat
        $chat = ChatCompanyStudent::where('company_id', $request->id_company)->where('student_id', $request->id_student)->first();

        if ($chat) {
            $chat;
        } else {
            $chat = new ChatCompanyStudent;

            $chat->company_id = $request->id_company;
            $chat->student_id = $request->id_student;
            $chat->save();
        }

        return Inertia::render('Chat/chatMainView', [
            'tipoUser' => 'company',
            'infoChat' => 'ojo',
        ]);
    }

    // Obtener todos los chats de la compañia
    public function chats_company(Request $request)
    {

        $chats = ChatCompanyStudent::where('company_id', $request->id_company)->get();

        $chats = ChatCompanyStudent::select('chat_company_students.id AS chatId', 'users.id AS id', 'users.user_first_name AS name', 'users.profile_photo_path AS photo','messages.content AS message','messages.typeuser AS tipeUserMessage','messages.created_at AS messageDate', 'messages.readDate', 'chat_company_students.created_at AS chatDate')
            ->leftjoin('users', 'chat_company_students.student_id', '=', 'users.id')
            ->leftJoin('messages', function ($join) {
                $join->on('messages.id', '=', DB::raw('(
                    SELECT id
                    FROM messages
                    WHERE chat_id = chat_company_students.id
                    ORDER BY created_at DESC
                    LIMIT 1
                )'));
            })
            ->where('company_id', $request->id_company)
            ->get();

        return $chats;
    }

    // +++++++++++++++++ Users (students) +++++++++++++++++

    public function chats_student(Request $request)
    {
        $chats = ChatCompanyStudent::select('chat_company_students.id AS chatId', 'companies.id AS id', 'companies.company_name AS name', 'companies.profile_photo_path AS photo', 'messages.content AS message','messages.typeuser AS tipeUserMessage','messages.created_at AS messageDate', 'messages.readDate', 'chat_company_students.created_at AS chatDate')
            ->leftjoin('companies', 'chat_company_students.company_id', '=', 'companies.id')
            ->leftJoin('messages', function ($join) {
                $join->on('messages.id', '=', DB::raw('(
                    SELECT id
                    FROM messages
                    WHERE chat_id = chat_company_students.id
                    ORDER BY created_at DESC
                    LIMIT 1
                )'));
            })
            ->where('student_id', $request->id_student)
            ->get();

        return $chats;
    }
}
