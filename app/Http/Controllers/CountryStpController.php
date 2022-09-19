<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryStpRequest;
use App\Http\Resources\CountryStpCollection;
use App\Http\Resources\CountryStpResource;
use App\Models\Country;
use App\Models\CountryStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryStps = new CountryStpCollection(CountryStp::latest()->get());
        return response()->success($countryStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStpRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryStp(), [
            ['slug', '=', $step],
            ['country_id', '=', $country->id],
        ]);
        if ($checker)
            return response()->error([], "CountryStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/usertype/value_prositions");
        if (!empty($data['title'])) {
            $data = \array_merge($data, ["slug" => $step]);
        }
        $countryStp = $country->addCountryStp($data);
        return response()->success(new CountryStpResource($countryStp), "CountryStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryStp  $countryStp
     * @return \Illuminate\Http\Response
     */
    public function show($usertype_id)
    {
        $countryStps = new CountryStpCollection(CountryStp::where('usertype_id', $usertype_id)->get());
        return response()->success($countryStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryStp  $countryStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryStpRequest $request, CountryStp $countryStp)
    {
        $data = UploadService::upload($request, "images/usertype/value_prositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryStp->id],
                ['country_id', '=', $countryStp->country_id],
            ]);
            if ($checker)
                return response()->error([], "CountryStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryStp->update($data);
        return  response()->success(new CountryStpResource($countryStp), "CountryStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryStp  $countryStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryStp $countryStp, $id)
    {
        $countryStp = CountryStp::whereId($id)->first();
        $countryStp->delete();
        return response()->success([], "CountryStp deleted successfully!");
    }
}
