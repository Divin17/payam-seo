<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderVpRequest;
use App\Http\Resources\CountryProviderVpCollection;
use App\Http\Resources\CountryProviderVpResource;
use App\Models\Country;
use App\Models\CountryProviderVp;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;
use App\Services\UploadService;

class CountryProviderVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderVps = new CountryProviderVpCollection(CountryProviderVp::latest()->get());
        return response()->success($countryProviderVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderVpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryProviderVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/country/providers/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryProviderVp = $country->addCountryProviderVp($data);
        return response()->success(new CountryProviderVpResource($countryProviderVp), "CountryProviderVp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderVp  $countryProviderVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderVp $countryProviderVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderVps = new CountryProviderVpCollection($country->countryProviderVps);
        return response()->success($countryProviderVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderVp  $countryProviderVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderVpRequest $request, CountryProviderVp $countryProviderVp, $vp)
    {
        $countryProviderVp = CountryProviderVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/providers/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryProviderVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderVp->id],
                ['country_id', '=', $countryProviderVp->country_id],
                ['provider_id', '=', $countryProviderVp->provider_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderVp->update($data);
        return  response()->success(new CountryProviderVpResource($countryProviderVp), "CountryProviderVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderVp  $countryProviderVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryProviderVp $countryProviderVp, $vp)
    {
        $countryProviderVp = CountryProviderVp::whereId($vp)->first();
        $countryProviderVp->delete();
        return response()->success([], "CountryProviderVp deleted successfully!");
    }
}
