<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\User;
use App\Policies\BookPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
         /* @var array<class-string, class-string>
     */
    protected $policies = [
        Book::class => BookPolicy::class,
        User::class => UserPolicy::class,
    ];


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('is_admin' , function ($user){
            if ($user->user_id == 3)
                return true;
            else
                return false;
        });
    }
}
