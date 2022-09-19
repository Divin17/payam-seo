<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryServiceRequest;
use App\Http\Resources\CountryServiceCollection;
use App\Http\Resources\CountryServiceResource;
use App\Models\Country;
use App\Models\CountryService;
use App\Services\DuplicationCheck;
use App\Services\saveSetupSteps;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = Country::whereName($request->country)->first();
        $services = new CountryServiceCollection($country->countryServices);
        return response()->success($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryServiceRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $service = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryService(), [
            ['slug', '=', $service],
            ['country_id', '=', $country->id],
        ]);
        if ($checker)
            return response()->error([], "CountryService $service already exists!!", 422);
        $first = UploadService::upload($request, "images/country/providers", "caption_image");
        $data = UploadService::upload($request, "images/country/providers", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($service))
            $data = \array_merge($data, ["slug" => $service]);
        $countryService =
            $country->addCountryService($data);
        return response()->success(new CountryServiceResource($countryService), "Country Service created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryService  $countryService
     * @return \Illuminate\Http\Response
     */
    public function show(CountryService $countryService, $country)
    {
        $country = Country::whereName($country)->first();
        $services = new CountryServiceCollection($country->countryServices);
        return response()->success($services);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryService  $countryService
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryServiceRequest $request, CountryService $countryService, $service)
    {
        $countryService = CountryService::select('*')->where([
            ["slug", "=", $service],
            ["id", "=", $request->id]
        ])->first();
        $first = UploadService::upload($request, "images/country/providers", "caption_image");
        $data = UploadService::upload($request, "images/country/providers", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryService(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryService->id],
                ['country_id', '=', $countryService->country_id],
            ]);
            if ($checker)
                return response()->error([], "CountryService $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryService->update($data);
        return  response()->success(new CountryServiceResource($countryService), "CountryService updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryService  $countryService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryService $countryService, $service)
    {
        $countryService = CountryService::whereId($service)->first();
        $countryService->delete();
        return response()->success([], "CountryService deleted successfully!");
    }
}
