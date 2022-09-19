<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\CountryServiceController;
use App\Http\Controllers\CountryUserTypeProviderServiceController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ProviderServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TableCreation;
use App\Http\Controllers\UserTypeServiceController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryNetworkController;
use App\Http\Controllers\CountryNetworkStpController;
use App\Http\Controllers\CountryNetworkVpController;
use App\Http\Controllers\CountryProviderController;
use App\Http\Controllers\CountryProviderServiceController;
use App\Http\Controllers\CountryProviderServiceStpController;
use App\Http\Controllers\CountryProviderServiceVpController;
use App\Http\Controllers\CountryProviderStpController;
use App\Http\Controllers\CountryProviderUserTypeController;
use App\Http\Controllers\CountryProviderUserTypeServiceController;
use App\Http\Controllers\CountryProviderUserTypeServiceStpController;
use App\Http\Controllers\CountryProviderUserTypeServiceVpController;
use App\Http\Controllers\CountryProviderUserTypeStpController;
use App\Http\Controllers\CountryProviderUserTypeVpController;
use App\Http\Controllers\CountryProviderVpController;
use App\Http\Controllers\CountryServiceStpController;
use App\Http\Controllers\CountryServiceVpController;
use App\Http\Controllers\CountryStpController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\CountryUserTypeController;
use App\Http\Controllers\CountryUserTypeProviderController;
use App\Http\Controllers\CountryUserTypeProviderServiceStpController;
use App\Http\Controllers\CountryUserTypeProviderServiceVpController;
use App\Http\Controllers\CountryUserTypeProviderStpController;
use App\Http\Controllers\CountryUserTypeProviderVpController;
use App\Http\Controllers\CountryUserTypeServiceController;
use App\Http\Controllers\CountryUserTypeServiceStpController;
use App\Http\Controllers\CountryUserTypeServiceVpController;
use App\Http\Controllers\CountryUserTypeStpController;
use App\Http\Controllers\CountryUserTypeVpController;
use App\Http\Controllers\CountryValuePropositionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MetatagController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProviderVpController;
use App\Http\Controllers\ServiceStpController;
use App\Http\Controllers\ServiceVpController;
use App\Http\Controllers\UserTypeStpController;
use App\Http\Controllers\UserTypeVpController;
use App\Http\Controllers\ValuePropositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// dd
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'countries' => CountryController::class,
        'faqs' => FaqController::class,
        'country-stps' => CountryStpController::class,
        'providers' => ProviderController::class,
        'provider-vps' => ProviderVpController::class,
        'provider-stps' => ProviderVpController::class,
        'user-types' => UserTypeController::class,
        'user-type-vps' => UserTypeVpController::class,
        'user-type-stps' => UserTypeStpController::class,
        'networks' => NetworkController::class,
        'services' => ServiceController::class,
        'service-vps' => ServiceVpController::class,
        'service-stps' => ServiceStpController::class,
        'value-propositions' => ValuePropositionController::class,
        'pages' => PageController::class,
        'metatags' => MetatagController::class,
        'languages' => LanguageController::class,
    ]);
    Route::prefix('country')->name('country.')->group(function () {
        Route::apiResources([
            'provider-services' => CountryProviderServiceController::class,
            'provider-service-vps' => CountryProviderServiceVpController::class,
            'provider-service-stps' => CountryProviderServiceStpController::class,
            'provider-user-types' => CountryProviderUserTypeController::class,
            'provider-user-type-vps' => CountryProviderUserTypeVpController::class,
            'provider-user-type-stps' => CountryProviderUserTypeStpController::class,
            'provider-user-type-services' => CountryProviderUserTypeServiceController::class,
            'provider-user-type-service-vps' => CountryProviderUserTypeServiceVpController::class,
            'provider-user-type-service-stps' => CountryProviderUserTypeServiceStpController::class,
            'providers' => CountryProviderController::class,
            'provider-vps' => CountryProviderVpController::class,
            'provider-stps' => CountryProviderStpController::class,
            'user-types' => CountryUserTypeController::class,
            'user-type-vps' => CountryUserTypeVpController::class,
            'user-type-stps' => CountryUserTypeStpController::class,
            'services' => CountryServiceController::class,
            'service-vps' => CountryServiceVpController::class,
            'service-stps' => CountryServiceStpController::class,
            'user-type-services' => CountryUserTypeServiceController::class,
            'user-type-service-vps' => CountryUserTypeServiceVpController::class,
            'user-type-service-stps' => CountryUserTypeServiceStpController::class,
            'user-type-providers' => CountryUserTypeProviderController::class,
            'user-type-provider-vps' => CountryUserTypeProviderVpController::class,
            'user-type-provider-stps' => CountryUserTypeProviderStpController::class,
            'user-type-provider-services' => CountryUserTypeProviderServiceController::class,
            'user-type-provider-service-vps' => CountryUserTypeProviderServiceVpController::class,
            'user-type-provider-service-stps' => CountryUserTypeProviderServiceStpController::class,
            'networks' => CountryNetworkController::class,
            'network-vps' => CountryNetworkVpController::class,
            'network-stps' => CountryNetworkStpController::class,
            'value-propositions' => CountryValuePropositionController::class,
        ]);
    });
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
Route::post('/login', [AuthenticationController::class, 'login']);
