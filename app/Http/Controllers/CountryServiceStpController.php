<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryServiceStpRequest;
use App\Http\Resources\CountryServiceStpCollection;
use App\Http\Resources\CountryServiceStpResource;
use App\Models\Country;
use App\Models\CountryServiceStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryServiceStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryServiceStps = new CountryServiceStpCollection(CountryServiceStp::latest()->get());
        return response()->success($countryServiceStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryServiceStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $service = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryServiceStp(), [
            ['slug', '=', $service],
            ['country_id', '=', $country->id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->success([], "CountryServiceStp $service already exists!!");
        $data = UploadService::upload($request, "images/country/service/value_propositions");
        if (!empty($service))
            $data = \array_merge($data, ["slug" => $service]);
        $countryServiceStp = $country->addCountryServiceStp($data);
        return response()->success(new CountryServiceStpResource($countryServiceStp), "CountryServiceStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryServiceStp  $countryServiceStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryServiceStp $countryServiceStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryServiceStps = new CountryServiceStpCollection($country->countryServiceStps);
        return response()->success($countryServiceStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryServiceStp  $countryServiceStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryServiceStpRequest $request, CountryServiceStp $countryServiceStp, $stp)
    {
        $countryServiceStp = CountryServiceStp::select('*')->where([
            ["slug", "=", $stp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryServiceStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryServiceStp->id],
                ['country_id', '=', $countryServiceStp->country_id],
                ['service_id', '=', $countryServiceStp->service_id],
            ]);
            if ($checker)
                return response()->error([], "CountryServiceStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryServiceStp->update($data);
        return  response()->success(new CountryServiceStpResource($countryServiceStp), "CountryServiceStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryServiceStp  $countryServiceStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryServiceStp $countryServiceStp, $stp)
    {
        $countryServiceStp = CountryServiceStp::whereId($stp)->first();
        $countryServiceStp->delete();
        return response()->success([], "CountryServiceStp deleted successfully!");
    }
}
