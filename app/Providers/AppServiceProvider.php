<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
        Validator::extend('nik', function ($attribute, $value, $parameters, $validator) {
            // Tambahkan logika validasi NIK di sini sesuai kebutuhan
            // Contoh sederhana:
            return preg_match('/^[0-9]{16}$/', $value);
        });
    }

    /**
        * Register any application services.
        *
        * @return void
        */
    public function register()
    {
        //
    }
}
