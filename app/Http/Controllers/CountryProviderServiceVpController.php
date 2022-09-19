<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderServiceVpRequest;
use App\Http\Resources\CountryProviderServiceVpCollection;
use App\Http\Resources\CountryProviderServiceVpResource;
use App\Models\Country;
use App\Models\CountryProviderService;
use App\Models\CountryProviderServiceVp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryProviderServiceVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryProviderServiceVps = new CountryProviderServiceVpCollection(CountryProviderServiceVp::latest()->get());
        return response()->success($countryProviderServiceVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderServiceVpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryProviderServiceVp(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "CountryProviderServiceVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/country/provider/service/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryProviderServiceVp = $country->addCountryProviderServiceVp($data);
        return response()->success(new CountryProviderServiceVpResource($countryProviderServiceVp), "CountryProviderServiceVp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderServiceVp  $countryProviderServiceVp
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderServiceVp $countryProviderServiceVp, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderServiceVps = new CountryProviderServiceVpCollection($country->countryProviderServiceVps);
        return response()->success($countryProviderServiceVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderServiceVp  $countryProviderServiceVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderServiceVpRequest $request, CountryProviderServiceVp $countryProviderServiceVp, $vp)
    {
        $countryProviderServiceVp = CountryProviderServiceVp::select('*')->where([
            ["slug", "=", $vp],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/provider/service/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryProviderServiceVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderServiceVp->id],
                ['country_id', '=', $countryProviderServiceVp->country_id],
                ['provider_id', '=', $countryProviderServiceVp->provider_id],
                ['service_id', '=', $countryProviderServiceVp->service_id],
            ]);
            if ($checker)
                return response()->error([], "CountryProviderServiceVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderServiceVp->update($data);
        return  response()->success(new CountryProviderServiceVpResource($countryProviderServiceVp), "CountryProviderServiceVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderServiceVp  $countryProviderServiceVp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryProviderServiceVp = CountryProviderServiceVp::whereId($id)->first();
        $countryProviderServiceVp->delete();
        return response()->success([], "CountryProviderServiceVp deleted successfully!");
    }
}
