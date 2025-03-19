<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Test;

class SampleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('test', function(){
            return new Test();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
