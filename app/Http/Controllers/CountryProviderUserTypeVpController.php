<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderUserTypeVpRequest;
use App\Http\Resources\CountryProviderUserTypeVpCollection;
use App\Http\Resources\CountryProviderUserTypeVpResource;
use App\Models\Country;
use App\Models\CountryProviderUserTypeVp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryProviderUserTypeVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderUserTypeVps = new CountryProviderUserTypeVpCollection(CountryProviderUserTypeVp::latest()->get());
        return response()->success($countryProviderUserTypeVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderUserTypeVpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryProviderUserTypeVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
            ['usertype_id', '=', $request->usertype_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderUserTypeVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/country/provider/usertype/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryProviderUserTypeVp = $country->addCountryProviderUserTypeVp($data);
        return response()->success(new CountryProviderUserTypeVpResource($countryProviderUserTypeVp), 'countryProviderUserTypeVp created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderUserTypeVp  $countryProviderUserTypeVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderUserTypeVp $countryProviderUserTypeVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderUserTypeVps = new CountryProviderUserTypeVpCollection($country->countryProviderUserTypeVps);
        return response()->success($countryProviderUserTypeVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderUserTypeVp  $countryProviderUserTypeVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderUserTypeVpRequest $request, CountryProviderUserTypeVp $countryProviderUserTypeVp, $vp)
    {
        $countryProviderUserTypeVp = CountryProviderUserTypeVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/provider/usertype/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryProviderUserTypeVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderUserTypeVp->id],
                ['country_id', '=', $countryProviderUserTypeVp->country_id],
                ['provider_id', '=', $countryProviderUserTypeVp->provider_id],
                ['usertype_id', '=', $countryProviderUserTypeVp->usertype_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderUserTypeVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderUserTypeVp->update($data);
        return  response()->success(new CountryProviderUserTypeVpResource($countryProviderUserTypeVp), "CountryProviderUserTypeVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderUserTypeVp  $countryProviderUserTypeVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryProviderUserTypeVp $countryProviderUserTypeVp, $vp)
    {
        $countryProviderUserTypeVp = CountryProviderUserTypeVp::whereId($vp)->first();
        $countryProviderUserTypeVp->delete();
        return response()->success([], "CountryProviderUserTypeVp deleted successfully!");
    }
}
