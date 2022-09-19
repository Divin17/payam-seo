<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeServiceStpRequest;
use App\Http\Resources\CountryUserTypeServiceStpCollection;
use App\Http\Resources\CountryUserTypeServiceStpResource;
use App\Models\Country;
use App\Models\CountryUserTypeServiceStp;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;
use App\Services\UploadService;

class CountryUserTypeServiceStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeServiceStps = new CountryUserTypeServiceStpCollection(CountryUserTypeServiceStp::latest()->get());
        return response()->success($countryUserTypeServiceStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeServiceStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeServiceStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeServiceStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/usertype/service/value_propositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $countryUserTypeServiceStp = $country->addCountryUserTypeServiceStp($data);
        return response()->success(new CountryUserTypeServiceStpResource($countryUserTypeServiceStp), "countryUserTypeServiceStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeServiceStp  $countryUserTypeServiceStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeServiceStp $countryUserTypeServiceStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeServiceStps = new CountryUserTypeServiceStpCollection($country->countryUserTypeServiceStps);
        return response()->success($countryUserTypeServiceStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeServiceStp  $countryUserTypeServiceStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeServiceStpRequest $request, CountryUserTypeServiceStp $countryUserTypeServiceStp, $stp)
    {
        $countryUserTypeServiceStp = CountryUserTypeServiceStp::select('*')->where([
            ["slug", "=", $stp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/usertype/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeServiceStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeServiceStp->id],
                ['country_id', '=', $countryUserTypeServiceStp->country_id],
                ['usertype_id', '=', $countryUserTypeServiceStp->usertype_id],
                ['service_id', '=', $countryUserTypeServiceStp->service_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeServiceStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeServiceStp->update($data);
        return  response()->success(new CountryUserTypeServiceStpResource($countryUserTypeServiceStp), "CountryUserTypeServiceStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeServiceStp  $countryUserTypeServiceStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeServiceStp $countryUserTypeServiceStp, $stp)
    {
        $countryUserTypeServiceStp = CountryUserTypeServiceStp::whereId($stp)->first();
        $countryUserTypeServiceStp->delete();
        return response()->success([], "CountryUserTypeServiceStp deleted successfully!");
    }
}
