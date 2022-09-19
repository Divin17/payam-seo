<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderUserTypeServiceStpRequest;
use App\Http\Resources\CountryProviderUserTypeCollection;
use App\Http\Resources\CountryProviderUserTypeServiceStpCollection;
use App\Http\Resources\CountryProviderUserTypeServiceStpResource;
use App\Models\Country;
use App\Models\CountryProviderUserTypeServiceStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryProviderUserTypeServiceStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderUserTypeServiceStps = new CountryProviderUserTypeServiceStpCollection(CountryProviderUserTypeServiceStp::latest()->get());
        return response()->success($countryProviderUserTypeServiceStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderUserTypeServiceStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryProviderUserTypeServiceStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
            ['usertype_id', '=', $request->usertype_id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderUserTypeServiceStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/country/provider/usertype/service/value_propositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $countryProviderUserTypeServiceStp = $country->addCountryProviderUserTypeServiceStp($data);
        return response()->success(new CountryProviderUserTypeServiceStpResource($countryProviderUserTypeServiceStp), "CountryUserTypeProviderServiceStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderUserTypeServiceStp  $countryProviderUserTypeServiceStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderUserTypeServiceStp $countryProviderUserTypeServiceStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderUserTypeServiceStps = new CountryProviderUserTypeServiceStpCollection($country->countryProviderUserTypeServiceStps);
        return response()->success($countryProviderUserTypeServiceStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderUserTypeServiceStp  $countryProviderUserTypeServiceStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderUserTypeServiceStpRequest $request, CountryProviderUserTypeServiceStp $countryProviderUserTypeServiceStp, $stp)
    {
        $countryProviderUserTypeServiceStp = CountryProviderUserTypeServiceStp::select('*')->where([
            ["slug", "=", $stp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/provider/usertype/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryProviderUserTypeServiceStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderUserTypeServiceStp->id],
                ['country_id', '=', $countryProviderUserTypeServiceStp->country_id],
                ['provider_id', '=', $countryProviderUserTypeServiceStp->provider_id],
                ['usertype_id', '=', $countryProviderUserTypeServiceStp->usertype_id],
                ['service_id', '=', $countryProviderUserTypeServiceStp->service_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderUserTypeServiceStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderUserTypeServiceStp->update($data);
        return  response()->success(new CountryProviderUserTypeServiceStpResource($countryProviderUserTypeServiceStp), "CountryProviderUserTypeServiceStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderUserTypeServiceStp  $countryProviderUserTypeServiceStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryProviderUserTypeServiceStp $countryProviderUserTypeServiceStp, $stp)
    {
        $countryProviderUserTypeServiceStp = CountryProviderUserTypeServiceStp::whereId($stp)->first();
        $countryProviderUserTypeServiceStp->delete();
        return response()->success([], "CountryProviderUserTypeServiceStp deleted successfully!");
    }
}
