<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

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
        // ป้องกัน error "Specified key was too long" ใน MySQL เก่า
        Schema::defaultStringLength(191);

        // ตั้ง timezone เป็นเวลาประเทศไทย
        date_default_timezone_set('Asia/Bangkok');

        // บังคับใช้ https เฉพาะตอน production (deploy จริง)
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
