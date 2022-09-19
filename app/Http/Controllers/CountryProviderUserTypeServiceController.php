<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderUserTypeServiceRequest;
use App\Http\Resources\CountryProviderUserTypeServiceCollection;
use App\Http\Resources\CountryProviderUserTypeServiceResource;
use App\Models\Country;
use App\Models\CountryProviderUserTypeService;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CountryProviderUserTypeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderUserTypeServices = new CountryProviderUserTypeServiceCollection(CountryProviderUserTypeService::latest()->get());
        return response()->success($countryProviderUserTypeServices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderUserTypeServiceRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $service = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryProviderUserTypeService(), [
            ['slug', '=', $service],
            ['usertype_id', '=', $request->usertype_id],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderUserTypeService $service already exists!!", 422);
        $first = UploadService::upload($request, "images/country/provider/usertype/services", "caption_image");
        $data = UploadService::upload($request, "images/country/usertype/provider/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($service))
            $data = \array_merge($data, ["slug" => $service]);
        $countryProviderUserTypeService = $country->addCountryProviderUserTypeService($data);
        return response()->success(new CountryProviderUserTypeServiceResource($countryProviderUserTypeService), "CountryProviderUserTypeService created successfully!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderUserTypeService  $countryProviderUserTypeService
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderUserTypeService $countryProviderUserTypeService, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderUserTypeServices = new CountryProviderUserTypeServiceCollection($country->countryProviderUserTypeServices);
        return response()->success($countryProviderUserTypeServices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderUserTypeService  $countryProviderUserTypeService
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderUserTypeServiceRequest $request, CountryProviderUserTypeService $countryProviderUserTypeService, $service)
    {
        $countryProviderUserTypeService = CountryProviderUserTypeService::select('*')->where([
            ["slug", "=", $service],
            ["id", "=", $request->id]
        ])->first();
        $first = UploadService::upload($request, "images/country/provider/usertype/services", "caption_image");
        $data = UploadService::upload($request, "images/country/usertype/provider/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryProviderUserTypeService(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderUserTypeService->id],
                ['usertype_id', '=', $countryProviderUserTypeService->usertype_id],
                ['country_id', '=', $countryProviderUserTypeService->country_id],
                ['provider_id', '=', $countryProviderUserTypeService->provider_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderUserTypeService $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderUserTypeService->update($data);
        return  response()->success(new CountryProviderUserTypeServiceResource($countryProviderUserTypeService), "CountryProviderUserTypeService updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderUserTypeService  $countryProviderUserTypeService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryProviderUserTypeService $countryProviderUserTypeService, $service)
    {
        $countryProviderUserTypeService = CountryProviderUserTypeService::whereId($service)->first();
        $countryProviderUserTypeService->delete();
        return response()->success([], "CountryProviderUserTypeService deleted successfully!");
    }
}
