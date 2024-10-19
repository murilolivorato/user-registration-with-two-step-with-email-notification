<?php

namespace App\Providers;

use App\Events\EmailSent;
use App\Listeners\SendEmailListener;
use Illuminate\Support\ServiceProvider;
use Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(EmailSent::class, SendEmailListener::class);
    }
}
