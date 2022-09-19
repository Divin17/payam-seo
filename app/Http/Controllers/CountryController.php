<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryCollection;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Services\UploadService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = new CountryCollection(Country::latest()->get());
        return response()->success($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $data = UploadService::upload($request, "images/country", "flag");
        $country = Country::create($data);
        return response()->success(new CountryResource($country), "Country created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return response()->success(new CountryResource($country));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Country  $country
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        $data = UploadService::upload($request, "images/country", "flag");
        $country->update($data);
        return  response()->success(new CountryResource($country), "Country updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::whereId($id)->first();
        $country->delete();
        return response()->success(null, "Country deleted successfully!");
    }
}
