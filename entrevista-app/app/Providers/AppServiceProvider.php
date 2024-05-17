<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('maioridade', function ($attribute, $value, $parameters, $validator) {
            $dataNascimento = \Carbon\Carbon::createFromFormat('Y-m-d', $value);
            $idade = $dataNascimento->diffInYears(\Carbon\Carbon::now());
            return $idade >= 18;
        });
    }
}
