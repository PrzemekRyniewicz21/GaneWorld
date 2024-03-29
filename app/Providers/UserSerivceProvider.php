<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepository as UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Model\User;

class UserSerivceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class, function ($app){

            return new UserRepository($app->make(User::class));

        });

    }


    public function boot()
    {

    }
}
