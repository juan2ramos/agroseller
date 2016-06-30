<?php

namespace Agrosellers\Providers;


use Illuminate\Contracts\View\Factory;
use Agrosellers\Composers\NotifyComposer;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    public function boot(Factory $factory)
    {
        $factory->composer('layoutBack', NotifyComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}
