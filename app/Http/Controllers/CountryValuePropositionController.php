<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryValuePropositionRequest;
use App\Http\Resources\CountryProviderCollection;
use App\Http\Resources\CountryValuePropositionCollection;
use App\Http\Resources\CountryValuePropositionResource;
use App\Models\Country;
use App\Models\CountryValueProposition;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryValuePropositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryValuePropositions = CountryValueProposition::latest()->get();
        return response()->success($countryValuePropositions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryValuePropositionRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new CountryValueProposition(), [
            ['slug', '=', $vp],
            ['country_id', '=', $country->id],
        ]);
        if ($checker)
            return response()->error([], "CountryValueProposition $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/country/providers");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $countryValueProposition = $country->addCountryValueProposition($data);
        return response()->success(new CountryValuePropositionResource($countryValueProposition), "countryValueProposition created successfully!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryValueProposition  $countryValueProposition
     * @return \Illuminate\Http\Response
     */
    public function show(CountryValueProposition $countryValueProposition, $country)
    {
        $country = Country::whereName($country)->first();
        $countryValuePropositions = new CountryValuePropositionCollection($country->CountryValuePropositions);
        return response()->success($countryValuePropositions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryValueProposition  $countryValueProposition
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryValuePropositionRequest $request, CountryValueProposition $countryValueProposition, $valueProposition)
    {
        $countryValueProposition = CountryValueProposition::select('*')->where([
            ["slug", "=", $valueProposition],
            ["id", "=", $request->id]
        ])->first();
        $data = UploadService::upload($request, "images/country/value_ptopositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new CountryValueProposition(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryValueProposition->id],
                ['country_id', '=', $countryValueProposition->country_id],
            ]);
            if ($checker)
                return response()->error([], "CountryValueProposition $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryValueProposition->update($data);
        return  response()->success($countryValueProposition, "CountryValueProposition created successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryValueProposition  $countryValueProposition
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryValueProposition $countryValueProposition, $valueProposition)
    {
        $countryValueProposition = CountryValueProposition::whereId($valueProposition)->first();
        $countryValueProposition->delete();
        return response()->success([], "CountryValueProposition deleted successfully!");
    }
}
