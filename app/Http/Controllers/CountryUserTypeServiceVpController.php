<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeServiceVpRequest;
use App\Http\Resources\CountryUserTypeServiceVpCollection;
use App\Http\Resources\CountryUserTypeServiceVpResource;
use App\Models\Country;
use App\Models\CountryUserTypeServiceVp;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;
use App\Services\UploadService;

class CountryUserTypeServiceVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryUserTypeServiceVps = new CountryUserTypeServiceVpCollection(CountryUserTypeServiceVp::latest()->get());
        return response()->success($countryUserTypeServiceVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeServiceVpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryUserTypeServiceVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['usertype_id', '=', $request->usertype_id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "CountryUserTypeServiceVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/usertype/service/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryUserTypeServiceVp = $country->addCountryUserTypeServiceVp($data);
        return response()->success(new CountryUserTypeServiceVpResource($countryUserTypeServiceVp), "countryUserTypeServiceVp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserTypeServiceVp  $countryUserTypeServiceVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserTypeServiceVp $countryUserTypeServiceVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryUserTypeServiceVps = new CountryUserTypeServiceVpCollection($country->countryUserTypeServiceVps);
        return response()->success($countryUserTypeServiceVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserTypeServiceVp  $countryUserTypeServiceVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeServiceVpRequest $request, CountryUserTypeServiceVp $countryUserTypeServiceVp, $vp)
    {
        $countryUserTypeServiceVp = CountryUserTypeServiceVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/usertype/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryUserTypeServiceVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryUserTypeServiceVp->id],
                ['country_id', '=', $countryUserTypeServiceVp->country_id],
                ['usertype_id', '=', $countryUserTypeServiceVp->usertype_id],
                ['service_id', '=', $countryUserTypeServiceVp->service_id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserTypeServiceVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserTypeServiceVp->update($data);
        return  response()->success(new CountryUserTypeServiceVpResource($countryUserTypeServiceVp), "CountryUserTypeServiceVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserTypeServiceVp  $countryUserTypeServiceVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserTypeServiceVp $countryUserTypeServiceVp, $vp)
    {
        $countryUserTypeServiceVp = CountryUserTypeServiceVp::whereId($vp)->first();
        $countryUserTypeServiceVp->delete();
        return response()->success([], "CountryUserTypeServiceVp deleted successfully!");
    }
}
