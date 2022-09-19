<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeServiceRequest;
use App\Http\Resources\CountryUserTypeServiceCollection;
use App\Http\Resources\CountryUserTypeServiceResource;
use App\Models\Country;
use App\Models\CountryUserTypeProviderService;
use App\Models\CountryUserTypeService;
use App\Services\DuplicationCheck;
use Illuminate\Http\Request;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryUserTypeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeServices = new CountryUserTypeServiceCollection(CountryUserTypeService::latest()->get());
        return response()->success($countryUserTypeServices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeServiceRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $service = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeService(), [
            ['slug', '=', $service],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeService $service already exists!!", 422);
        $first = UploadService::upload($request, "images/country/usertype/services", "caption_image");
        $data = UploadService::upload($request, "images/country/usertype/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($service))
            $data = \array_merge($data, ["slug" => $service]);
        $countryUserTypeService = $country->addCountryUserTypeService($data);
        return response()->success(new CountryUserTypeServiceResource($countryUserTypeService), "CountryUserTypeService created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeService  $countryUserTypeService
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeService $countryUserTypeService, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeServices = new CountryUserTypeServiceCollection($country->countryUserTypeServices);
        return response()->success($countryUserTypeServices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeService  $countryUserTypeService
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeServiceRequest $request, CountryUserTypeService $countryUserTypeService, $service)
    {
        $countryUserTypeService = CountryUserTypeService::select('*')->where([
            ["slug", "=", $service],
            ["id", "=", $request->id]
        ])->first();
        $first = UploadService::upload($request, "images/country/usertype/services", "caption_image");
        $data = UploadService::upload($request, "images/country/usertype/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeService(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeService->id],
                ['country_id', '=', $countryUserTypeService->country_id],
                ['usertype_id', '=', $countryUserTypeService->usertype_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeService $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeService->update($data);
        return  response()->success(new CountryUserTypeServiceResource($countryUserTypeService), "CountryUserTypeService updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeService  $countryUserTypeService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeService $countryUserTypeService, $service)
    {
        $countryUserTypeService = CountryUserTypeService::whereId($service)->first();
        $countryUserTypeService->delete();
        return response()->success([], "CountryUserTypeService deleted successfully!");
    }
}
