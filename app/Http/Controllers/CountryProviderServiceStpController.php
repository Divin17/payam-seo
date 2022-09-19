<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderServiceStpRequest;
use App\Http\Resources\CountryProviderServiceStpCollection;
use App\Http\Resources\CountryProviderServiceStpResource;
use App\Models\Country;
use App\Models\CountryProviderServiceStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryProviderServiceStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderServiceStps = new CountryProviderServiceStpCollection(CountryProviderServiceStp::latest()->get());
        return response()->success($countryProviderServiceStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderServiceStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryProviderServiceStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderServiceStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/country/provider/service/value_propositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $countryProviderServiceStp = $country->addCountryProviderServiceStp($data);
        return response()->success(new CountryProviderServiceStpResource($countryProviderServiceStp), "CountryProviderServiceStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderServiceStp  $countryProviderServiceStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderServiceStp $countryProviderServiceStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderServiceStps = new CountryProviderServiceStpCollection($country->countryProviderServiceStps);
        return response()->success($countryProviderServiceStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderServiceStp  $countryProviderServiceStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderServiceStpRequest $request, CountryProviderServiceStp $countryProviderServiceStp, $stp)
    {
        $countryProviderServiceStp = CountryProviderServiceStp::select('*')->where([
            ["slug", "=", $stp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/provider/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryProviderServiceStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderServiceStp->id],
                ['country_id', '=', $countryProviderServiceStp->country_id],
                ['provider_id', '=', $countryProviderServiceStp->provider_id],
                ['service_id', '=', $countryProviderServiceStp->service_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderServiceStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderServiceStp->update($data);
        return  response()->success(new CountryProviderServiceStpResource($countryProviderServiceStp), "CountryProviderServiceStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderServiceStp  $countryProviderServiceStp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryProviderServiceStp = CountryProviderServiceStp::whereId($id)->first();
        $countryProviderServiceStp->delete();
        return response()->success([], "CountryProviderServiceStp deleted successfully!");
    }
}
