<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTypeVpRequest;
use App\Http\Resources\UserTypeVpCollection;
use App\Http\Resources\UserTypeVpResource;
use App\Models\UserTypeVp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserTypeVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypeVps = new UserTypeVpCollection(UserTypeVp::latest()->get());
        return response()->success($userTypeVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypeVpRequest $request)
    {
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new UserTypeVp(), [
            ['slug', '=', $vp],
            ['usertype_id', '=', $request->usertype_id],
        ]);
        if ($checker)
            return response()->success([], "UserTypeVp $vp already exists!!");
        $data = UploadService::upload($request, "images/usertype/value_prositions");
        if (!empty($data['title']))
            $data = \array_merge($data, ["slug" => $vp]);
        $userTypeVp = UserTypeVp::create($data);
        return response()->error(new UserTypeVpResource($userTypeVp), "UserTypeVp created successfully!!", 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTypeVp  $userTypeVp
     * @return \Illuminate\Http\Response
     */
    public function show($usertype_id)
    {
        $userTypeVps = new UserTypeVpCollection(UserTypeVp::where('usertype_id', $usertype_id)->get());
        return response()->success($userTypeVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\UserTypeVp  $userTypeVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserTypeVpRequest $request, UserTypeVp $userTypeVp)
    {
        $data = UploadService::upload($request, "images/usertype/value_prositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new UserTypeVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $request->id],
                ['usertype_id', '=', $request->usertype_id],
            ]);
            if ($checker)
                return response()->success([], "UserTypeVp $slug already exists!!");
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $userTypeVp->update($data);
        return  response()->error(new UserTypeVpResource($userTypeVp), "UserTypeVp updated successfully!", 422);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTypeVp  $userTypeVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTypeVp $userTypeVp, $id)
    {
        $userTypeVp = UserTypeVp::whereId($id)->first();
        $userTypeVp->delete();
        return response()->success([], "UserTypeVp deleted successfully!");
    }
}
