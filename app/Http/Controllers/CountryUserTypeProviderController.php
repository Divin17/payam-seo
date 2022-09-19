<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeProviderRequest;
use App\Http\Resources\CountryUserTypeProviderCollection;
use App\Http\Resources\CountryUserTypeProviderResource;
use App\Models\Country;
use App\Models\CountryUserTypeProvider;
use App\Services\DuplicationCheck;
use Illuminate\Http\Request;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryUserTypeProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = Country::whereName($request->country)->first();
        $providers = $country->countryUserTypeProviders();
        $countryUserTypeProviders = $providers->where('usertype_id', $request->usertype_id)->get();
        return response()->success($countryUserTypeProviders, 'Available providers for ' . $country->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeProviderRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $provider = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeProvider(), [
            ['slug', '=', $provider],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeProvider $provider already exists!!", 422);
        $first = UploadService::upload($request, "images/country/user_types/providers", "caption_image");
        $data = UploadService::upload($request, "images/country/user_types/providers");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($provider))
            $data = \array_merge($data, ["slug" => $provider]);
        $countryUserTypeProvider = $country->addCountryUserTypeProvider($data);
        return response()->success(new CountryUserTypeProviderResource($countryUserTypeProvider), 'CountryUserTypeProvider for ' . $country->name . ' added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeProvider  $countryUserTypeProvider
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeProvider $countryUserTypeProvider, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeProviders = new CountryUserTypeProviderCollection($country->countryUserTypeProviders);
        // $countryUserTypeProviders = $providers->where('usertype_id', $usertype_id)->get();
        return response()->success($countryUserTypeProviders);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeProvider  $countryUserTypeProvider
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeProviderRequest $request, CountryUserTypeProvider $countryUserTypeProvider, $provider)
    {
        $countryUserTypeProvider = CountryUserTypeProvider::select('*')->where([
            // ["slug", "=", $provider],
            ["id", "=", $request->id]
        ])->first();
        $first = UploadService::upload($request, "images/country/user_types/providers", "caption_image");
        $data = UploadService::upload($request, "images/country/user_types/providers");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeProvider(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeProvider->id],
                ['country_id', '=', $countryUserTypeProvider->country_id],
                ['usertype_id', '=', $countryUserTypeProvider->usertype_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeProvider $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeProvider->update($data);
        return  response()->success(new CountryUserTypeProviderResource($countryUserTypeProvider), "CountryUserTypeProvider updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeProvider  $countryUserTypeProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeProvider $countryUserTypeProvider, $provider)
    {
        $countryUserTypeProvider = CountryUserTypeProvider::whereId($provider)->first();
        $countryUserTypeProvider->delete();
        return response()->success([], "CountryUserTypeProvider deleted successfully!");
    }
}
