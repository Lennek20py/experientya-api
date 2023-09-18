<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Acepta que se conecte un usuario logueado con company
        // Broadcast::routes(['middleware' => ['web','auth:company']]);
        // Acepta que se conecte un usuario logueado con user
        // Broadcast::routes(['middleware' => ['web','auth:web']]);

        Broadcast::routes(['middleware' => ['web','auth:company,web']]);

        require base_path('routes/channels.php');
    }
}
