<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;
use App\Models\Company;
use App\Models\ChatCompanyStudent;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{chat_id}', function ($user, $chat_id) {

    if ($user->chats->contains($chat_id)) {
        return $user;
    }
});

// Canal para los mensajes del chat verdadero
Broadcast::channel('chat-message.{chat_id}', function ($userOrCompany) {

    if ($userOrCompany instanceof \App\Models\User) {
        // Lógica para verificar el acceso del usuario
        // Puedes aplicar cualquier lógica personalizada aquí

        // Verifica si el ID coincide con el ID del usuario
        return true;
    } elseif ($userOrCompany instanceof \App\Models\Company) {
        // Lógica para verificar el acceso de la compañía
        // Puedes aplicar cualquier lógica personalizada aquí

        // Verifica si el ID coincide con el ID de la compañía
        return true;
    }

    return null;
}, ['guard' => 'company']);

// Example Broadcasting Laravel Event on a public channel
Broadcast::channel('privat-test-{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
