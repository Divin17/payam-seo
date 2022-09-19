<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeProviderStpRequest;
use App\Http\Resources\CountryUserTypeProviderStpCollection;
use App\Http\Resources\CountryUserTypeProviderStpResource;
use App\Models\Country;
use App\Models\CountryUserTypeProviderStp;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;
use App\Services\UploadService;

class CountryUserTypeProviderStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeProviderStps = new CountryUserTypeProviderStpCollection(CountryUserTypeProviderStp::latest()->get());
        return response()->success($countryUserTypeProviderStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeProviderStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeProviderStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeProviderStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/user_type/provider/value_propositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $countryUserTypeProviderStp = $country->addCountryUserTypeProviderStp($data);
        return response()->success(new CountryUserTypeProviderStpResource($countryUserTypeProviderStp, 'CountryUserTypeProviderStp created successfully!!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeProviderStp  $countryUserTypeProviderStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeProviderStp $countryUserTypeProviderStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeProviderStps = new CountryUserTypeProviderStpCollection($country->countryUserTypeProviderStps);
        return response()->success($countryUserTypeProviderStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeProviderStp  $countryUserTypeProviderStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeProviderStpRequest $request, CountryUserTypeProviderStp $countryUserTypeProviderStp, $stp)
    {
        $countryUserTypeProviderStp = CountryUserTypeProviderStp::select('*')->where([
            ["slug", "=", $stp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/user_type/provider/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeProviderStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeProviderStp->id],
                ['country_id', '=', $countryUserTypeProviderStp->country_id],
                ['usertype_id', '=', $countryUserTypeProviderStp->usertype_id],
                ['provider_id', '=', $countryUserTypeProviderStp->provider_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeProviderStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeProviderStp->update($data);
        return  response()->success(new CountryUserTypeProviderStpResource($countryUserTypeProviderStp), "CountryUserTypeProviderStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeProviderStp  $countryUserTypeProviderStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeProviderStp $countryUserTypeProviderStp, $stp)
    {
        $countryUserTypeProviderStp = CountryUserTypeProviderStp::whereId($stp)->first();
        $countryUserTypeProviderStp->delete();
        return response()->success([], "CountryUserTypeProviderStp deleted successfully!");
    }
}
