<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

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
    public function boot()
    {
        Response::macro('success', function ($data = [], $message = '') {
            return response()->make([
                'status' => true,
                'data' => $data,
                'message' => $message
            ]);
        });
        Response::macro('error', function ($error = null, $message = '', $status_code = 400) {
            return response()->make([
                'status' => false,
                'error' => $error,
                'message' => $message,
            ], $status_code);
        });

        View::share('defaultCountry', 'Africa');
        View::share('defaultCountryHeader', 'The stress-free way to send money and pay for goods and services in Africa');
        View::share('metaTitle', 'Use Payam daily');
        View::share('metaDescription', 'Payam works well everywhere');
        View::share('metaKeywords', ['Payam', 'send', 'money', 'receive', 'money']);

        View::share('locale', app()->currentLocale());

        $locale = app()->currentLocale();
        if ($locale = 'en') {
            View::share('c_lang', 'en');
        }
        if ($locale = 'fr') {
            View::share('c_lang', 'fr');
        }
    }
}
