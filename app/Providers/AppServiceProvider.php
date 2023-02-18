<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Contracts\Support\Htmlable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl) {
            return (new MailMessage)
                ->subject(Lang::get('Verificación de email'))
                ->greeting(Lang::get("Hola estimado usuario ") . $notifiable->name)
                ->line(Lang::get('Por favor da click en el siguiente botón para confirmar tu correo'))
                ->action(Lang::get('Verificar ahora'), $verificationUrl)
                ->line(Lang::get('Sí tu no creaste una cuenta, no es necesaría ninguna acción requerida')

               );
        };
    }
}
