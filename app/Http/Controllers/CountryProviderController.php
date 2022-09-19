<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderRequest;
use App\Http\Resources\CountryProviderCollection;
use App\Http\Resources\CountryProviderResource;
use App\Models\Country;
use App\Models\CountryProvider;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = Country::whereName($request->country)->first();
        $providers = new CountryProviderCollection($country->countryProviders);
        return response()->success($providers, 'Available providers for ' . $country->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $provider = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryProvider(), [
            ['slug', '=', $provider],
            ['country_id', '=', $country->id],
        ]);
        if ($checker)
            return response()->error([], "CountryProvider $provider already exists!!", 422);
        $first = UploadService::upload($request, "images/country/providers", "caption_image");
        $data = UploadService::upload($request, "images/country/providers");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($provider))
            $data = \array_merge($data, ["slug" => $provider]);
        $countryProvider = $country->addCountryProvider($data);
        return response()->success(new CountryProviderResource($countryProvider), 'Country provider for ' . $country->name . ' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProvider  $countryProvider
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProvider $countryProvider, $country)
    {
        $country = Country::whereName($country)->first();
        $providers = new CountryProviderCollection($country->countryProviders);
        return response()->success($providers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CountryProvider  $countryProvider
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderRequest $request, CountryProvider $countryProvider, $provider)
    {
        $countryProvider = CountryProvider::select('*')->where([
            ["slug", "=", $provider],
            ["id", "=", $request->id]
        ])->first();
        $first = UploadService::upload($request, "images/country/providers", "caption_image");
        $data = UploadService::upload($request, "images/country/providers");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryProvider(), [
                ['slug', '=', $provider],
                ['country_id', '=', $countryProvider->country_id],
                ['id', '!=', $countryProvider->id],
            ]);
            if ($checker)
                return response()->error([], "CountryProvider $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProvider->update($data);
        return response()->success(new CountryProviderResource($countryProvider), 'Provider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProvider  $countryProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryProvider = CountryProvider::whereId($id)->first();
        try {
            $countryProvider->delete();
            return response()->success(null, 'Provider deleted successfully');
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 'Action failed', 400);
        }
    }
}
