<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeProviderServiceRequest;
use App\Http\Resources\CountryUserTypeProviderServiceCollection;
use App\Http\Resources\CountryUserTypeProviderServiceResource;
use App\Models\Country;
use App\Models\CountryUserTypeProviderService;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryUserTypeProviderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeProviderServices = new CountryUserTypeProviderServiceCollection(CountryUserTypeProviderService::latest()->get());
        return response()->success($countryUserTypeProviderServices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeProviderServiceRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $service = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeProviderService(), [
            ['slug', '=', $service],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeProviderService $service already exists!!", 422);
        $first = UploadService::upload($request, "images/country/usertype/provider/services", "caption_image");
        $data = UploadService::upload($request, "images/country/usertype/provider/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($service))
            $data = \array_merge($data, ["slug" => $service]);
        $countryUserTypeProviderService = $country->addCountryUserTypeProviderService($data);
        return response()->success(new CountryUserTypeProviderServiceResource($countryUserTypeProviderService), "countryUserTypeProviderService created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeProviderService  $countryUserTypeProviderService
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeProviderService $countryUserTypeProviderService, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeProviderServices = new CountryUserTypeProviderServiceCollection($country->countryUserTypeProviderServices);
        return response()->success($countryUserTypeProviderServices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeProviderService  $countryUserTypeProviderService
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeProviderServiceRequest $request, CountryUserTypeProviderService $countryUserTypeProviderService, $service)
    {
        $countryUserTypeProviderService = CountryUserTypeProviderService::select('*')->where([
            // ["slug", "=", $service],
            ["id", "=", $request->id]
        ])->first();
        $first = UploadService::upload($request, "images/country/usertype/provider/services", "caption_image");
        $data = UploadService::upload($request, "images/country/usertype/provider/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeProviderService(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeProviderService->id],
                ['country_id', '=', $countryUserTypeProviderService->country_id],
                ['usertype_id', '=', $countryUserTypeProviderService->usertype_id],
                ['provider_id', '=', $countryUserTypeProviderService->provider_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeProviderService $service already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeProviderService->update($data);
        return  response()->success(new CountryUserTypeProviderServiceResource($countryUserTypeProviderService), "CountryUserTypeProviderService updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeProviderService  $countryUserTypeProviderService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeProviderService $countryUserTypeProviderService, $service)
    {
        $countryUserTypeProviderService = CountryUserTypeProviderService::whereId($service)->first();
        $countryUserTypeProviderService->delete();
        return response()->success([], "CountryUserTypeProviderService deleted successfully!");
    }
}
