<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $locale = app()->setLocale($request->segment(1));
        $language_exists = Language::whereCode($request->segment(1))->pluck('code');
        if ($language_exists) {
        // if (in_array($request->segment(1), Config('app.available_locales'))) {
            app()->setLocale($request->segment(1));
            Session::put('current_locale', $request->segment(1));
            return $next($request);
        }
        // return Response::make('Language not available', 400);
        return Response::make('Language not currently supported', 400);

        // abort(400);
    }
}
