<?php

namespace App\Providers;

use App\Models\Equipment;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $equipments = [];

        foreach(Equipment::all() as $equipment) {
            $equipments[$equipment->id] = $equipment->name;
        }

        $users = [];

        foreach(User::all() as $user) {
            $users[$user->id] = $user->name;
        }

        View::share('users', $users);
        View::share('equipments', $equipments);
        View::share('maitenanceTypes',  ['1' => 'Preventiva', '2' => 'Corretiva', '3' => 'Urgente']);
    }
}
