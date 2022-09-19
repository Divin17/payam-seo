<?php

use App\Http\Livewire\About;
use App\Http\Livewire\Agents;
use App\Http\Livewire\Contact;
use App\Http\Livewire\CookiesPolicy;
use App\Http\Livewire\Country;
use App\Http\Livewire\DefaultUserTypeOrProvider;
use App\Http\Livewire\CountryUserTypeOrProvider;
use App\Http\Livewire\CountryUserTypeOrProviderL2;
use App\Http\Livewire\Home;
use App\Http\Livewire\HowItWorks;
use App\Http\Livewire\Individuals;
use App\Http\Livewire\MakePayments;
use App\Http\Livewire\Merchants;
use App\Http\Livewire\PayGoodsAndServices;
use App\Http\Livewire\Pricing;
use App\Http\Livewire\PrivacyPolicy;
use App\Http\Livewire\Providers;
use App\Http\Livewire\ReceivePayments;
use App\Http\Livewire\SendMoneyRequest;
use App\Http\Livewire\ShowUserType;
use App\Http\Livewire\ShowService;
use App\Http\Livewire\ShowProvider;
use App\Http\Livewire\UserType;
use App\Http\Livewire\WinWin;
use App\Models\CountryUserTypeProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*--------------------------Header Routes ----------------------*/

/*-----------------------Defaults---------------------*/
Route::get('/', function () {
    return redirect(app()->getLocale());
});

// Route::get('{locale}', function ($locale) {
//     if (! in_array($locale, ['en', 'fr'])) {
//         abort(404);
//     }
//     $lo = App::setLocale($locale);
//     // return response()->success($lo);
// });

Route::get('/get_locale', function () {
    return App::currentLocale();
});
Route::group(['prefix' => '{locale}', 'middleware' => 'setLocale'], function () {
    Route::get('/', function () {
        return Redirect::route('africa', ['locale' => 'en']);
    });
    Route::get('/Africa', Home::class)->name('africa');
    Route::get('/Africa/{slug}', DefaultUserTypeOrProvider::class)->name('show_default_data');
    Route::get('/individuals', Individuals::class);
    Route::get('/agents', Agents::class);
    Route::get('/merchants', Merchants::class);

    Route::get('/pricing', Pricing::class)->name('pricing');
    Route::get('/about', About::class)->name('about');
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/how-it-works', HowItWorks::class)->name('how_it_works');

    Route::get('/send-money-request', SendMoneyRequest::class)->name('send_money_request');
    Route::get('/pay-goods-services', PayGoodsAndServices::class)->name('pay_goods_services');

    Route::get('/make-payments', MakePayments::class)->name('make_payments');
    Route::get('/receive-payments', ReceivePayments::class)->name('receive_payments');
    Route::get('/cookies-policy', CookiesPolicy::class)->name('cookies');
    Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy');
    Route::get('win-win', WinWin::class);
    // Route::get('provider', Providers::class);
    // Route::get('/Africa/{slug}', ShowProvider::class)->name('show_default_provider');
    /*----------------------- Country Routes --------------*/
    Route::get('/{country}', Country::class)->name('show_country');
    Route::get('/{country}/{slug}', CountryUserTypeOrProvider::class)->name('show_country_data');
    // Route::get('/{country}/{provider}send-money-request, ShowProvider::class)->name('show_country_provider');

    Route::get('/{country}/{slug1}/{slug2}', CountryUserTypeOrProviderL2::class)->name('show_data_from_ut_or_pr');
    // Route::get('/{country}/{provider}/{UserType}', ShowUserType::class)->name('show_usertype_from_provider');

    Route::get('/{country}/{slug1}/{slug2}/{service}', ShowService::class)->name('show_service');
    // Route::get('/{country}/{provider}/u/{UserType}/{service}', ShowService::class)->name('show_service_from_usertype');
    /* Footer Links */
});

// Route::prefix('fr')->group(function () {
// });
