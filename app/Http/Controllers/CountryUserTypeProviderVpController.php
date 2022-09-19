<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeProviderVpRequest;
use App\Http\Resources\CountryUserTypeProviderVpCollection;
use App\Http\Resources\CountryUserTypeProviderVpResource;
use App\Models\Country;
use App\Models\CountryUserTypeProviderVp;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;
use App\Services\UploadService;

class CountryUserTypeProviderVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeProviderVps = new CountryUserTypeProviderVpCollection(CountryUserTypeProviderVp::latest()->get());
        return response()->success($countryUserTypeProviderVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeProviderVpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeProviderVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeProviderVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/user_type/provider/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryUserTypeProviderVp = $country->addCountryUserTypeProviderVp($data);
        return response()->success(new CountryUserTypeProviderVpResource($countryUserTypeProviderVp, 'CountryUserTypeProviderVp created successfully!!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeProviderVp  $countryUserTypeProviderVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeProviderVp $countryUserTypeProviderVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeProviderVps = new CountryUserTypeProviderVpCollection($country->countryUserTypeProviderVps);
        return response()->success($countryUserTypeProviderVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeProviderVp  $countryUserTypeProviderVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeProviderVpRequest $request, CountryUserTypeProviderVp $countryUserTypeProviderVp, $vp)
    {
        $countryUserTypeProviderVp = CountryUserTypeProviderVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/user_type/provider/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeProviderVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeProviderVp->id],
                ['country_id', '=', $countryUserTypeProviderVp->country_id],
                ['usertype_id', '=', $countryUserTypeProviderVp->usertype_id],
                ['provider_id', '=', $countryUserTypeProviderVp->provider_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeProviderVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeProviderVp->update($data);
        return  response()->success(new CountryUserTypeProviderVpResource($countryUserTypeProviderVp), "CountryUserTypeProviderVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeProviderVp  $countryUserTypeProviderVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeProviderVp $countryUserTypeProviderVp, $vp)
    {
        $countryUserTypeProviderVp = CountryUserTypeProviderVp::whereId($vp)->first();
        $countryUserTypeProviderVp->delete();
        return response()->success([], "CountryUserTypeProviderVp deleted successfully!");
    }
}
