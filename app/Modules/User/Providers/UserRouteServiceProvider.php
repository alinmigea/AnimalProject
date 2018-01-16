<?php

namespace AnimalProject\Modules\User\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class UserRouteServiceProvider
 * @package AnimalProject\Modules\User\Providers
 */
class UserRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'AnimalProject\\Modules\\User\\Controllers';

    public function map()
    {
        Route::group([
            'middleware' => [],
            'namespace' => $this->namespace,
            'prefix' => 'users',
        ], function ($router) {

            // GET
            $router->get('/{id}', 'UserController@search')->where('id', '[0-9]+');
            $router->get('/', 'UserController@all');
            $router->get('/create', 'UserController@create');

            // POST
            $router->post('/', 'UserController@store');
        });
    }
}