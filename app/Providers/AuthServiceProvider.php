<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(...$levels): void
    {
        Gate::define('superuser',function($user){
            return in_array($user->level, ['admin','manager']);
        });

        Gate::define('admin',function($user){
            return in_array($user->level, ['admin']);
        });
    }
}
