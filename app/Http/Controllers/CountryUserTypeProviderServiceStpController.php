<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeProviderServiceStpRequest;
use App\Http\Resources\CountryUserTypeProviderServiceStpCollection;
use App\Http\Resources\CountryUserTypeProviderServiceStpResource;
use App\Http\Resources\CountryUserTypeProviderStpCollection;
use App\Models\Country;
use App\Models\CountryUserTypeProviderServiceStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryUserTypeProviderServiceStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeProviderServiceStps = CountryUserTypeProviderServiceStp::latest()->get();
        return response()->success(new CountryUserTypeProviderServiceStpCollection($countryUserTypeProviderServiceStps));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeProviderServiceStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeProviderServiceStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
            ['provider_id', '=', $request->provider_id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "Country UserType Provider Service Step $step already exists!!", 422);
        $data = UploadService::upload($request, "images/country/usertype/provider/service/value_propositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $countryUserTypeProviderServiceStp = $country->addCountryUserTypeProviderServiceStp($data);
        return response()->success(new CountryUserTypeProviderServiceStpResource($countryUserTypeProviderServiceStp), "countryUserTypeProviderServiceStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeProviderServiceStp  $countryUserTypeProviderServiceStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeProviderServiceStp $countryUserTypeProviderServiceStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeProviderServiceStps = new CountryUserTypeProviderServiceStpCollection($country->countryUserTypeProviderServiceStps);
        return response()->success($countryUserTypeProviderServiceStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeProviderServiceStp  $countryUserTypeProviderServiceStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeProviderServiceStpRequest $request, CountryUserTypeProviderServiceStp $countryUserTypeProviderServiceStp, $stp)
    {
        $countryUserTypeProviderServiceStp = CountryUserTypeProviderServiceStp::select('*')->where([
            ["slug", "=", $stp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/usertype/provider/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeProviderServiceStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeProviderServiceStp->id],
                ['country_id', '=', $countryUserTypeProviderServiceStp->country_id],
                ['usertype_id', '=', $countryUserTypeProviderServiceStp->usertype_id],
                ['provider_id', '=', $countryUserTypeProviderServiceStp->provider_id],
                ['service_id', '=', $countryUserTypeProviderServiceStp->service_id],
            ]);
            if ($checker)
                return response()->error([], "Country UserType Provider Service Step $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeProviderServiceStp->update($data);
        return  response()->success(new CountryUserTypeProviderServiceStpResource($countryUserTypeProviderServiceStp), "CountryUserTypeProviderServiceStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeProviderServiceStp  $countryUserTypeProviderServiceStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeProviderServiceStp $countryUserTypeProviderServiceStp, $stp)
    {
        $countryUserTypeProviderServiceStp = CountryUserTypeProviderServiceStp::whereId($stp)->first();
        $countryUserTypeProviderServiceStp->delete();
        return response()->success([], "CountryUserTypeProviderServiceStp deleted successfully!");
    }
}
