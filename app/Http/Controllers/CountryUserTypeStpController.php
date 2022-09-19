<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeStpRequest;
use App\Http\Resources\CountryUserTypeStpCollection;
use App\Http\Resources\CountryUserTypeStpResource;
use App\Models\Country;
use App\Models\CountryUserTypeStp;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;
use App\Services\UploadService;

class CountryUserTypeStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeStps = new CountryUserTypeStpCollection(CountryUserTypeStp::latest()->get());
        return response()->success($countryUserTypeStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeStpRequest $request, CountryUserTypeStp $countryUserTypeStp)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/country/user_types/value_propositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $countryUserTypeStp = $country->addCountryUserTypeStp($data);
        return response()->success(new CountryUserTypeStpResource($countryUserTypeStp), "CountryUserTypeStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeStp  $countryUserTypeStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeStp $countryUserTypeStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeStps = new CountryUserTypeStpCollection($country->countryUserTypeStps);
        return response()->success($countryUserTypeStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeStp  $countryUserTypeStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeStpRequest $request, CountryUserTypeStp $countryUserTypeStp, $stp)
    {
        $countryUserTypeStp = CountryUserTypeStp::select('*')->where([
            ["slug", "=", $stp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/user_types/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeStp->id],
                ['country_id', '=', $countryUserTypeStp->country_id],
                ['usertype_id', '=', $countryUserTypeStp->usertype_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeStp->update($data);
        return  response()->success(new CountryUserTypeStpResource($countryUserTypeStp), "CountryUserTypeStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeStp  $countryUserTypeStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeStp $countryUserTypeStp, $stp)
    {
        $countryUserTypeStp = CountryUserTypeStp::whereId($stp)->first();
        $countryUserTypeStp->delete();
        return response()->success([], "CountryUserTypeStp deleted successfully!");
    }
}
