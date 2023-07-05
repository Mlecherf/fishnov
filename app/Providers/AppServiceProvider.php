<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Blade;
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
    public function boot(UrlGenerator $url)
    {
        Blade::if('manager', function () {
            return auth()?->user()?->type === "manager";
        });

        Blade::if('trawler', function () {
            return auth()?->user()?->type === "trawler";
        });
        if(config('app.env') === 'production')
            {
                $url->forceScheme('https');
            }
    }
}
