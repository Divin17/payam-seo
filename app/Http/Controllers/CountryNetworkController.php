<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryNetworkRequest;
use App\Http\Resources\CountryNetworkCollection;
use App\Http\Resources\CountryNetworkResource;
use App\Models\Country;
use App\Models\CountryNetwork;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = Country::whereName($request->country)->first();
        $networks = new CountryNetworkCollection($country->countryNetworks);
        return response()->success($networks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryNetworkRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $network = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryNetwork(), [
            ['slug', '=', $network],
            ['country_id', '=', $country->id],
        ]);
        if ($checker)
            return response()->error([], "CountryNetwork $network already exists!!", 422);
        $first = UploadService::upload($request, "images/country/network", "caption_image");
        $data = UploadService::upload($request, "images/country/network");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($network))
            $data = \array_merge($data, ["slug" => $network]);
        $countryNetwork = $country->addCountryNetwork($data);
        return response()->success(new CountryNetworkResource($countryNetwork), "Country network created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryNetwork  $countryNetwork
     * @return \Illuminate\Http\Response
     */
    public function show(CountryNetwork $countryNetwork, $country)
    {
        $country = Country::whereName($country)->first();
        $networks = new CountryNetworkCollection($country->countryNetworks);
        return response()->success($networks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryNetwork  $countryNetwork
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryNetworkRequest $request, CountryNetwork $countryNetwork, $network)
    {
        $countryNetwork = CountryNetwork::select('*')->where([
            ["slug", "=", $network],
            ["id", "=", $request->id]
        ])->first();
        $first = UploadService::upload($request, "images/country/network", "caption_image");
        $data = UploadService::upload($request, "images/country/network");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryNetwork(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryNetwork->id],
                ['country_id', '=', $countryNetwork->country_id],
            ]);
            if ($checker)
                return response()->error([], "CountryNetwork $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryNetwork->update($data);
        return  response()->success(new CountryNetworkResource($countryNetwork), "CountryNetwork updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryNetwork  $countryNetwork
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryNetwork = CountryNetwork::whereId($id)->first();
        $countryNetwork->delete();
        return response()->success([], "CountryNetwork deleted successfully!");
    }
}
