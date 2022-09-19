<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeVpRequest;
use App\Http\Resources\CountryUserTypeVpCollection;
use App\Http\Resources\CountryUserTypeVpResource;
use App\Models\Country;
use App\Models\CountryUserTypeVp;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;
use App\Services\UploadService;

class CountryUserTypeVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeVps = new CountryUserTypeVpCollection(CountryUserTypeVp::latest()->get());
        return response()->success($countryUserTypeVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeVpRequest $request, CountryUserTypeVp $countryUserTypeVp)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/country/user_types/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryUserTypeVp = $country->addCountryUserTypeVp($data);
        return response()->success(new CountryUserTypeVpResource($countryUserTypeVp), "CountryUserTypeVp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeVp  $countryUserTypeVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeVp $countryUserTypeVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeVps = new CountryUserTypeVpCollection($country->countryUserTypeVps);
        return response()->success($countryUserTypeVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeVp  $countryUserTypeVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeVpRequest $request, CountryUserTypeVp $countryUserTypeVp, $vp)
    {
        $countryUserTypeVp = CountryUserTypeVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/user_types/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeVp->id],
                ['country_id', '=', $countryUserTypeVp->country_id],
                ['usertype_id', '=', $request->usertype_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeVp->update($data);
        return  response()->success(new CountryUserTypeVpResource($countryUserTypeVp), "CountryUserTypeVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeVp  $countryUserTypeVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeVp $countryUserTypeVp, $vp)
    {
        $countryUserTypeVp = CountryUserTypeVp::whereId($vp)->first();
        $countryUserTypeVp->delete();
        return response()->success([], "CountryUserTypeVp deleted successfully!");
    }
}
