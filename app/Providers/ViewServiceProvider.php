<?php

namespace App\Providers;

use App\Notifications;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function ($view) {
            $view->with('notifications', Notifications::getLoggedInUserNotifications());
        });

    }

}
