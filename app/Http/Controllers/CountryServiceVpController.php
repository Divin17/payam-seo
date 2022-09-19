<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryServiceVpRequest;
use App\Http\Resources\CountryServiceVpCollection;
use App\Http\Resources\CountryServiceVpResource;
use App\Models\Country;
use App\Models\CountryServiceVp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryServiceVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryServiceVps = new CountryServiceVpCollection(CountryServiceVp::latest()->get());
        return response()->success($countryServiceVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryServiceVpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryServiceVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "CountryServiceVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/country/service/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryServiceVp = $country->addCountryServiceVp($data);
        return response()->success(new CountryServiceVpResource($countryServiceVp), "CountryServiceVp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryServiceVp  $countryServiceVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryServiceVp $countryServiceVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryServiceVps = new CountryServiceVpCollection($country->countryServiceVps);
        return response()->success($countryServiceVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryServiceVp  $countryServiceVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryServiceVpRequest $request, CountryServiceVp $countryServiceVp, $vp)
    {
        $countryServiceVp = CountryServiceVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryServiceVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryServiceVp->id],
                ['country_id', '=', $countryServiceVp->country_id],
                ['service_id', '=', $countryServiceVp->service_id],
            ]);
            if ($checker)
                return response()->error([], "CountryServiceVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryServiceVp->update($data);
        return  response()->success(new CountryServiceVpResource($countryServiceVp), "CountryServiceVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryServiceVp  $countryServiceVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryServiceVp $countryServiceVp, $vp)
    {
        $countryServiceVp = CountryServiceVp::whereId($vp)->first();
        $countryServiceVp->delete();
        return response()->success([], "CountryServiceVp deleted successfully!");
    }
}
