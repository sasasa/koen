<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('katakana', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[ァ-ヶー]+/u', $value);
        });

        Validator::extend('hiragana', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[ぁ-ん]+/u', $value);
        });

        Validator::extend('hiragana_katakana', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[ぁ-んァ-ヶー]+/u', $value);
        });
    }
}
