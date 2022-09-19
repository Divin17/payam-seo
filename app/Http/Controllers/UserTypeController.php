<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTypeRequest;
use App\Http\Resources\UserTypeCollection;
use App\Http\Resources\UserTypeResource;
use App\Models\UserType;
use App\Services\DuplicationCheck;
use App\Services\StringifyDataService;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes = new UserTypeCollection(UserType::latest()->get());
        return response()->success($userTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypeRequest $request)
    {
        $service_slug = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new UserType(), [
            ['slug', '=', $service_slug],
        ]);
        if ($checker)
            return response()->error([], "UserType $service_slug already exists!!", 422);
        $first = UploadService::upload($request, "images/user_types", "caption_image");
        $data = UploadService::upload($request, "images/user_types/icons", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($service_slug))
            $data = \array_merge($data, ["slug" => $service_slug]);
        $userType = UserType::create($data);
        return response()->success(new UserTypeResource($userType), 'UserType created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show(UserType $userType)
    {
        return response()->success(new UserTypeResource($userType));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\UserType  $userType
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserTypeRequest $request, UserType $userType)
    {
        $first = UploadService::upload($request, "images/user_types", "caption_image");
        $data = UploadService::upload($request, "images/user_types/icons", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new UserType(), [
                ['slug', '=', $slug],
                ['id', '!=', $request->id],
            ]);
            if ($checker)
                return response()->error([], "UserType $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $userType->update($data);
        return  response()->success(new UserTypeResource($userType), "UserType created successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userType = UserType::whereId($id)->first();
        $userType->delete();
        return response()->success([], "UserType deleted successfully!");
    }
}
