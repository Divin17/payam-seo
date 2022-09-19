<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryProviderUserTypeRequest;
use App\Http\Resources\CountryProviderUserTypeCollection;
use App\Http\Resources\CountryProviderUserTypeResource;
use App\Models\Country;
use App\Models\CountryProviderUserType;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryProviderUserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = Country::whereName($request->country)->first();
        $user_types = $country->countryUserTypes();
        $countryProviderUserTypes = $user_types->where('provider_id', $request->provider_id)->get();
        return response()->success(new CountryProviderUserTypeCollection($countryProviderUserTypes));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryProviderUserTypeRequest $request)
    {
        $country = Country::whereName($request->country)->first();
        $usertype = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new CountryProviderUserType(), [
            ['slug', '=', $usertype],
            ['country_id', '=', $country->id],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker) {
            return response()->error([], "CountryProviderUserType $usertype already exists!!", 422);
        }
        $first = UploadService::upload($request, "images/country/usertype/services", "caption_image");
        $data = UploadService::upload($request, "images/country/usertype/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($usertype))
            $data = \array_merge($data, ["slug" => $usertype]);
        $countryProviderUserType = $country->addCountryProviderUserType($data);
        return response()->success(new CountryProviderUserTypeResource($countryProviderUserType), 'CountryProviderUserType for ' . $country->name . ' added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryProviderUserType  $countryProviderUserType
     * @return \Illuminate\Http\Response
     */
    public function show(CountryProviderUserType $countryProviderUserType, $country)
    {
        $country = Country::whereName($country)->first();
        $countryProviderUserTypes = new CountryProviderUserTypeCollection($country->countryProviderUserTypes);
        return response()->success($countryProviderUserTypes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\CountryProviderUserType  $countryProviderUserType
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CountryProviderUserTypeRequest $request, CountryProviderUserType $countryProviderUserType, $userType)
    {
        $countryProviderUserType = CountryProviderUserType::select('*')->where([
            ["slug", "=", $userType],
            ["id", "=", $request->id]
        ])->first();
        $first = UploadService::upload($request, "images/country/usertype/services", "caption_image");
        $data = UploadService::upload($request, "images/country/usertype/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new CountryProviderUserType(), [
                ['slug', '=', $slug],
                ['id', '!=', $countryProviderUserType->id],
                ['country_id', '=', $countryProviderUserType->country_id],
                ['provider_id', '=', $countryProviderUserType->provider_id],
            ]);
            if ($checker) {
                return response()->error([], "CountryProviderUserType $slug already exists!!", 422);
            }
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $countryProviderUserType->update($data);
        return  response()->success(new CountryProviderUserTypeResource($countryProviderUserType), "CountryProviderUserType updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryProviderUserType  $countryProviderUserType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryProviderUserType = CountryProviderUserType::whereId($id)->first();
        $countryProviderUserType->delete();
        return response()->success([], "CountryProviderUserType deleted successfully!");
    }
}
