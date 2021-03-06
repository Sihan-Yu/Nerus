<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use LMenu;

class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Permissions will break if the user isn't signed in, so we better make it only generate the menu if the user is logged in
        if (Auth::user()) {

            // Actual menu, and it does apply filters depending on permissions
            LMenu::make('sidebar', function ($menu) {

                // Dashboard, always on top
                $menu->add('dashboard', ['route' => 'dashboard'])->data(['permissions' => 'employee', 'icon' => 'fa fa-dashboard']);

                // CRM
                $menu->add('crm', ['route' => 'crm.index'])->data(['permissions' => 'crm:view', 'icon' => 'fa fa-address-book']);
                $menu->crm->add('crm', ['route' => 'crm.index'])->data(['permissions' => 'crm:view', 'icon' => 'fa fa-address-book']);

                // Orders
                //$menu->add('orders', ['route' => 'home'])->data(['permissions' => 'role:see', 'icon' => 'fa fa-list-alt']);
                //$menu->orders->add('create_order', ['route' => 'home'])->data(['permissions' => 'order:create', 'icon' => 'fa fa-plus']);
                //$menu->orders->add('order_list', ['route' => 'home'])->data(['permissions' => 'order:create', 'icon' => 'fa fa-list']);

            })->filter(function ($item) {

                return Auth::user()->can($item->data('permissions'));

            });

            // Product Menu
            LMenu::make('productbar', function ($menu) {

                // Motors
                $menu->add('motors', ['route' => 'products.motor'])->data(['permissions' => 'products:view', 'icon' => 'fa fa-cogs']);
                $menu->motors->add('list_motor', ['route' => 'products.motor.add'])->data(['permissions' => 'products:view', 'icon' => 'fa fa-list']);
                $menu->motors->add('add_motor', ['route' => 'products.motor.add'])->data(['permissions' => 'products:view', 'icon' => 'fa fa-plus']);
                $menu->motors->add('edit_motor', ['route' => 'products.motor.add'])->data(['permissions' => 'products:view', 'icon' => 'fa fa-tag']);

                $menu->add('fans', ['route' => 'products.index'])->data(['permissions' => 'products:view', 'icon' => 'fa fa-themeisle']);
                $menu->fans->add('list_fans', ['route' => 'products.index'])->data(['permissions' => 'products:view', 'icon' => 'fa fa-tag']);

            })->filter(function ($item) {

                return Auth::user()->can($item->data('permissions'));

            });

            // Admin menu
            LMenu::make('adminbar', function ($menu) {

                // User Management
                $menu->add('users', ['route' => 'user.index'])->data(['permissions' => 'user:view', 'icon' => 'fa fa-user-o']);
                $menu->users->add('users', ['route' => 'user.index'])->data(['permissions' => 'user:view', 'icon' => 'fa fa-user-o']);
                $menu->users->add('permissions', ['route' => 'permissions.index'])->data(['permissions' => 'role:view', 'icon' => 'fa fa-hand-paper-o']);
                $menu->users->add('audit', ['route' => 'audit.trail'])->data(['permissions' => 'audit:view', 'icon' => 'fa fa-stack-overflow']);

            })->filter(function ($item) {

                return Auth::user()->can($item->data('permissions'));

            });

        }

        return $next($request);

    }

}
