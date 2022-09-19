<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderStpRequest;
use App\Http\Resources\CountryProviderStpCollection;
use App\Http\Resources\CountryProviderStpResource;
use App\Models\Country;
use App\Models\CountryProviderStp;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;
use App\Services\UploadService;

class CountryProviderStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderStps = new CountryProviderStpCollection(CountryProviderStp::latest()->get());
        return response()->success($countryProviderStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryProviderStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/country/providers/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderStp = $country->addCountryProviderStp($data);
        return response()->success(new CountryProviderStpResource($countryProviderStp), "CountryProviderStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderStp  $countryProviderStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderStp $countryProviderStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderStps = new CountryProviderStpCollection($country->countryProviderStps);
        return response()->success($countryProviderStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderStp  $countryProviderStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderStpRequest $request, CountryProviderStp $countryProviderStp, $vp)
    {
        $countryProviderStp = CountryProviderStp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/providers/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryProviderStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderStp->id],
                ['country_id', '=', $countryProviderStp->country_id],
                ['provider_id', '=', $countryProviderStp->provider_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderStp->update($data);
        return  response()->success(new CountryProviderStpResource($countryProviderStp), "CountryProviderStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderStp  $countryProviderStp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryProviderStp = CountryProviderStp::whereId($id)->first();
        $countryProviderStp->delete();
        return response()->success([], "CountryProviderStp deleted successfully!");
    }
}
