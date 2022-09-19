<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryNetworkStpRequest;
use App\Http\Resources\CountryNetworkStpCollection;
use App\Http\Resources\CountryNetworkStpResource;
use App\Models\Country;
use App\Models\CountryNetworkStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryNetworkStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryNetworkStps = new CountryNetworkStpCollection(CountryNetworkStp::latest()->get());
        return response()->success($countryNetworkStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryNetworkStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryNetworkStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
            ['network_id', '=', $request->network_id],
        ]);
        if ($checker)
            return response()->error([], "CountryNetworkStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/country/networks/value_propositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $countryNetworkStp = $country->addCountryNetworkStp($data);
        return response()->success(new CountryNetworkStpResource($countryNetworkStp), "CountryNetworkStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryNetworkStp  $countryNetworkStp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryNetworkStp $countryNetworkStp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryNetworkStps = new CountryNetworkStpCollection($country->countryNetworkStps);
        return response()->success($countryNetworkStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryNetworkStp  $countryNetworkStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryNetworkStpRequest $request, CountryNetworkStp $countryNetworkStp, $stp)
    {
        $countryNetworkStp = CountryNetworkStp::select('*')->where([
            ["slug", "=", $stp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/networks/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryNetworkStp(), [
                ['slug', '=', $slug],
                ['country_id', '=', $countryNetworkStp->country_id],
                ['id', '!=', $countryNetworkStp->id],
                ['network_id', '=', $countryNetworkStp->network_id],
            ]);
            if ($checker)
                return response()->error([], "CountryNetworkStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryNetworkStp->update($data);
        return  response()->success(new CountryNetworkStpResource($countryNetworkStp), "CountryNetworkStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryNetworkStp  $countryNetworkStp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryNetworkStp = CountryNetworkStp::whereId($id)->first();
        $countryNetworkStp->delete();
        return response()->success([], "CountryNetworkStp deleted successfully!");
    }
}
