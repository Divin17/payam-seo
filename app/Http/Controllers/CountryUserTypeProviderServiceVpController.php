<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeProviderServiceVpRequest;
use App\Http\Resources\CountryUserTypeProviderServiceVpCollection;
use App\Http\Resources\CountryUserTypeProviderServiceVpResource;
use App\Http\Resources\CountryUserTypeProviderVpCollection;
use App\Models\Country;
use App\Models\CountryUserTypeProviderServiceVp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryUserTypeProviderServiceVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeProviderServiceVps = CountryUserTypeProviderServiceVp::latest()->get();
        return response()->success(new CountryUserTypeProviderServiceVpCollection($countryUserTypeProviderServiceVps));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeProviderServiceVpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeProviderServiceVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
            ['provider_id', '=', $request->provider_id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeProviderServiceVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/country/usertype/provider/service/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryUserTypeProviderServiceVp = $country->addCountryUserTypeProviderServiceVp($data);
        return response()->success(new CountryUserTypeProviderServiceVpResource($countryUserTypeProviderServiceVp), "countryUserTypeProviderServiceVp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeProviderServiceVp  $countryUserTypeProviderServiceVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeProviderServiceVp $countryUserTypeProviderServiceVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeProviderServiceVps = new CountryUserTypeProviderServiceVpCollection($country->countryUserTypeProviderServiceVps);
        return response()->success($countryUserTypeProviderServiceVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeProviderServiceVp  $countryUserTypeProviderServiceVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeProviderServiceVpRequest $request, CountryUserTypeProviderServiceVp $countryUserTypeProviderServiceVp, $vp)
    {
        $countryUserTypeProviderServiceVp = CountryUserTypeProviderServiceVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/usertype/provider/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeProviderServiceVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeProviderServiceVp->id],
                ['country_id', '=', $countryUserTypeProviderServiceVp->country_id],
                ['usertype_id', '=', $countryUserTypeProviderServiceVp->usertype_id],
                ['provider_id', '=', $countryUserTypeProviderServiceVp->provider_id],
                ['service_id', '=', $countryUserTypeProviderServiceVp->service_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeProviderServiceVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeProviderServiceVp->update($data);
        return  response()->success(new CountryUserTypeProviderServiceVpResource($countryUserTypeProviderServiceVp), "CountryUserTypeProviderServiceVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeProviderServiceVp  $countryUserTypeProviderServiceVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeProviderServiceVp $countryUserTypeProviderServiceVp, $vp)
    {
        $countryUserTypeProviderServiceVp = CountryUserTypeProviderServiceVp::whereId($vp)->first();
        $countryUserTypeProviderServiceVp->delete();
        return response()->success([], "CountryUserTypeProviderServiceVp deleted successfully!");
    }
}
