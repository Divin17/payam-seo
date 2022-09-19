<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderServiceRequest;
use App\Http\Resources\CountryProviderServiceCollection;
use App\Http\Resources\CountryProviderServiceResource;
use App\Models\Country;
use App\Models\CountryProviderService;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CountryProviderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderServices = CountryProviderService::latest()->get();
        return response()->success($countryProviderServices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderServiceRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $service = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryProviderService(), [
            ['slug', '=', $service],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderService $service already exists!!", 422);
        $first =
            UploadService::upload($request, "images/country/provider/services", "caption_image");
        $data = UploadService::upload($request, "images/country/provider/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($service))
            $data = \array_merge($data, ["slug" => $service]);
        $countryProviderService = $country->addCountryProviderService($data);
        return response()->success(new CountryProviderServiceResource($countryProviderService), "CountryProviderService created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderService  $countryProviderService
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderService $countryProviderService, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderServices = new CountryProviderServiceCollection($country->countryProviderServices);
        return response()->success($countryProviderServices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderService  $countryProviderService
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderServiceRequest $request, CountryProviderService $countryProviderService, $service)
    {
        $countryProviderService = CountryProviderService::select('*')->where([
            ["slug", "=", $service],
            ["id", "=", $request->id]
        ])->first();
        $first =
            UploadService::upload($request, "images/country/provider/services", "caption_image");
        $data = UploadService::upload($request, "images/country/provider/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryProviderService(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderService->id],
                ['country_id', '=', $countryProviderService->country_id],
                ['provider_id', '=', $countryProviderService->provider_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderService $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderService->update($data);
        return  response()->success(new CountryProviderServiceResource($countryProviderService), "CountryProviderService updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderService  $countryProviderService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryProviderService = CountryProviderService::whereId($id)->first();
        $countryProviderService->delete();
        return response()->success([], "CountryProviderService deleted successfully!");
    }
}
