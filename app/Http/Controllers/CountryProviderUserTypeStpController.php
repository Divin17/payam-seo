<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderUserTypeStpRequest;
use App\Http\Resources\CountryProviderUserTypeStpCollection;
use App\Http\Resources\CountryProviderUserTypeStpResource;
use App\Models\Country;
use App\Models\CountryProviderUserTypeStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryProviderUserTypeStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderUserTypeStps = new CountryProviderUserTypeStpCollection(CountryProviderUserTypeStp::latest()->get());
        return response()->success($countryProviderUserTypeStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderUserTypeStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryProviderUserTypeStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
            ['usertype_id', '=', $request->usertype_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderUserTypeStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/country/provider/usertype/value_propositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $countryProviderUserTypeStp = $country->addCountryProviderUserTypeStp($data);
        return response()->success(new CountryProviderUserTypeStpResource($countryProviderUserTypeStp), 'countryProviderUserTypeStp created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderUserTypeStp  $countryProviderUserTypeStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderUserTypeStp $countryProviderUserTypeStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderUserTypeStps = new CountryProviderUserTypeStpCollection($country->countryProviderUserTypeStps);
        return response()->success($countryProviderUserTypeStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderUserTypeStp  $countryProviderUserTypeStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderUserTypeStpRequest $request, CountryProviderUserTypeStp $countryProviderUserTypeStp, $stp)
    {
        $countryProviderUserTypeStp = CountryProviderUserTypeStp::select('*')->where([
            ["slug", "=", $stp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/provider/usertype/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryProviderUserTypeStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderUserTypeStp->id],
                ['country_id', '=', $countryProviderUserTypeStp->country_id],
                ['provider_id', '=', $countryProviderUserTypeStp->provider_id],
                ['usertype_id', '=', $countryProviderUserTypeStp->usertype_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderUserTypeStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderUserTypeStp->update($data);
        return  response()->success(new CountryProviderUserTypeStpResource($countryProviderUserTypeStp), "CountryProviderUserTypeStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderUserTypeStp  $countryProviderUserTypeStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryProviderUserTypeStp $countryProviderUserTypeStp, $stp)
    {
        $countryProviderUserTypeStp = CountryProviderUserTypeStp::whereId($stp)->first();
        $countryProviderUserTypeStp->delete();
        return response()->success([], "CountryProviderUserTypeStp deleted successfully!");
    }
}
