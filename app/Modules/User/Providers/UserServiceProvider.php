<?php

namespace AnimalProject\Modules\User\Providers;

use AnimalProject\Modules\User\Contracts\UserRepositoryContract;
use AnimalProject\Modules\User\Models\User;
use AnimalProject\Modules\User\Policies\UserPolicy;
use AnimalProject\Modules\User\Repositories\UserRepository;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;

/**
 * Class UserServiceProvider
 * @package AnimalProject\Modules\User\Providers
 */
class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services for this module.
     *
     * @return void
     */
    public function boot()
    {
//        foreach (get_class_methods(new UserPolicy()) as $method)
//        {
//            $gate->define($method, "AnimalProject\\Modules\\User\\Policies\\UserPolicy@{$method}");
//        }
//
//        $gate->policy(User::class, UserPolicy::class);
    }

    /**
     * Register any application services for this module.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);

        $this->app->register(UserRouteServiceProvider::class);
    }
}