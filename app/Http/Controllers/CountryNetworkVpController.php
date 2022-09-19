<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryNetworkVpRequest;
use App\Http\Resources\CountryNetworkVpCollection;
use App\Http\Resources\CountryNetworkVpResource;
use App\Models\Country;
use App\Models\CountryNetworkVp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryNetworkVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryNetworkVps = new CountryNetworkVpCollection(CountryNetworkVp::latest()->get());
        return response()->success($countryNetworkVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryNetworkVpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryNetworkVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['network_id', '=', $request->network_id],
        ]);
        if ($checker)
            return response()->error([], "CountryNetworkVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/country/networks/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryNetworkVp = $country->addCountryNetworkVp($data);
        return response()->success(new CountryNetworkVpResource($countryNetworkVp), "CountryNetworkVp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryNetworkVp  $countryNetworkVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryNetworkVp $countryNetworkVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryNetworkVps = new CountryNetworkVpCollection($country->countryNetworkVps);
        return response()->success($countryNetworkVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryNetworkVp  $countryNetworkVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryNetworkVpRequest $request, CountryNetworkVp $countryNetworkVp, $vp)
    {
        $countryNetworkVp = CountryNetworkVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/networks/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryNetworkVp(), [
                ['slug', '=', $vp],
                ['id', '!=', $countryNetworkVp->id],
                ['country_id', '=', $countryNetworkVp->country_id],
                ['network_id', '=', $countryNetworkVp->network_id],
            ]);
            if ($checker)
                return response()->error([], "CountryNetworkVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryNetworkVp->update($data);
        return  response()->success(new CountryNetworkVpResource($countryNetworkVp), "CountryNetworkVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryNetworkVp  $countryNetworkVp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryNetworkVp = CountryNetworkVp::whereId($id)->first();
        $countryNetworkVp->delete();
        return response()->success([], "CountryNetworkVp deleted successfully!");
    }
}
