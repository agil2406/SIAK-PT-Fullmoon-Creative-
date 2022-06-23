<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('admin',function(User $user){
            return $user->level === 'admin';
        });
        Gate::define('direksi',function(User $user){
            return $user->level === 'direksi';
        });
        Gate::define('supervisor',function(User $user){
            return $user->level === 'supervisor';
        });
    }
}
