<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUserTypeRequest;
use App\Http\Resources\CountryUserTypeCollection;
use App\Http\Resources\CountryUserTypeResource;
use App\Models\Country;
use App\Models\CountryUserType;
use App\Services\DuplicationCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\UploadService;
use Illuminate\Support\Str;

class CountryUserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = Country::whereName($request->country)->first();
        $userTypes = new CountryUserTypeCollection($country->countryUserTypes);
        return response()->success($userTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryUserTypeRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $usertype = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryUserType(), [
            ['slug', '=', $usertype],
            ['country_id', '=', $country->id],
        ]);
        if ($checker)
            return response()->error([], "Country UserType $usertype already exists!!", 422);
        $first = UploadService::upload($request, "images/country/user_types", "caption_image");
        $data = UploadService::upload($request, "images/country/user_types", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($usertype))
            $data = \array_merge($data, ["slug" => $usertype]);
        $userType = $country->addCountryUserType($data);
        return response()->success(new CountryUserTypeResource($userType), 'CountryUserType created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryUserType  $countryUserType
     * @return \Illuminate\Http\Response
     */
    public function show(CountryUserType $countryUserType, $country)
    {
        $country = Country::whereName($country)->first();
        $userTypes = new CountryUserTypeCollection($country->countryUserTypes);
        return response()->success($userTypes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryUserType  $countryUserType
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUserTypeRequest $request, CountryUserType $countryUserType, $userType)
    {
        $countryUserType = CountryUserType::select('*')->where([
            ["slug", "=", $userType],
            ["id", "=", $request->id]
        ])->first();
        $first = UploadService::upload($request, "images/country/user_types", "caption_image");
        $data = UploadService::upload($request, "images/country/user_types", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryUserType(), [
                ['slug', '=', $slug],
                ['country_id', '=', $countryUserType->country_id],
                ['id', '!=', $countryUserType->id],
            ]);
            if ($checker)
                return response()->error([], "CountryUserType $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryUserType->update($data);
        return  response()->success(new CountryUserTypeResource($countryUserType), "CountryUserType updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryUserType  $countryUserType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryUserType $countryUserType, $userType)
    {
        $countryUserType = CountryUserType::whereId($userType)->first();
        $countryUserType->delete();
        return response()->success([], "CountryUserType deleted successfully!");
    }
}
