<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderUserTypeServiceVpRequest;
use App\Http\Resources\CountryProviderUserTypeCollection;
use App\Http\Resources\CountryProviderUserTypeServiceVpCollection;
use App\Http\Resources\CountryProviderUserTypeServiceVpResource;
use App\Models\Country;
use App\Models\CountryProviderUserTypeServiceVp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryProviderUserTypeServiceVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderUserTypeServiceVps = new CountryProviderUserTypeServiceVpCollection(CountryProviderUserTypeServiceVp::latest()->get());
        return response()->success($countryProviderUserTypeServiceVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderUserTypeServiceVpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryProviderUserTypeServiceVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderUserTypeServiceVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/country/provider/usertype/service/value_propositions");
        if (!empty($vp)) {
            $data = \array_merge($data, ["slug" => $vp]);
        }
        $countryProviderUserTypeServiceVp = $country->addCountryProviderUserTypeServiceVp($data);
        return response()->success(new CountryProviderUserTypeServiceVpResource($countryProviderUserTypeServiceVp), "CountryUserTypeProviderServiceVp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderUserTypeServiceVp  $countryProviderUserTypeServiceVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderUserTypeServiceVp $countryProviderUserTypeServiceVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderUserTypeServiceVps = new CountryProviderUserTypeServiceVpCollection($country->countryProviderUserTypeServiceVps);
        return response()->success($countryProviderUserTypeServiceVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderUserTypeServiceVp  $countryProviderUserTypeServiceVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderUserTypeServiceVpRequest $request, CountryProviderUserTypeServiceVp $countryProviderUserTypeServiceVp, $vp)
    {
        $countryProviderUserTypeServiceVp = CountryProviderUserTypeServiceVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/provider/usertype/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryProviderUserTypeServiceVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderUserTypeServiceVp->id],
                ['country_id', '=', $countryProviderUserTypeServiceVp->country_id],
                ['provider_id', '=', $countryProviderUserTypeServiceVp->provider_id],
                ['service_id', '=', $countryProviderUserTypeServiceVp->service_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderUserTypeServiceVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderUserTypeServiceVp->update($data);
        return  response()->success(new CountryProviderUserTypeServiceVpResource($countryProviderUserTypeServiceVp), "CountryProviderUserTypeServiceVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderUserTypeServiceVp  $countryProviderUserTypeServiceVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryProviderUserTypeServiceVp $countryProviderUserTypeServiceVp, $vp)
    {
        $countryProviderUserTypeServiceVp = CountryProviderUserTypeServiceVp::whereId($vp)->first();
        $countryProviderUserTypeServiceVp->delete();
        return response()->success([], "CountryProviderUserTypeServiceVp deleted successfully!");
    }
}
