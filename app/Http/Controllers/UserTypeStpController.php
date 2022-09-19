<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTypeStpRequest;
use App\Http\Resources\UserTypeStpCollection;
use App\Http\Resources\UserTypeStpResource;
use App\Models\UserTypeStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserTypeStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypeStps = new UserTypeStpCollection(UserTypeStp::latest()->get());
        return response()->success($userTypeStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypeStpRequest $request)
    {
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new UserTypeStp(), [
            ['slug', '=', $step],
            ['usertype_id', '=', $request->usertype_id],
        ]);
        if ($checker)
            return response()->error([], "UserTypeStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/usertype/value_prositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $userTypeStp = UserTypeStp::create($data);
        return response()->success(new UserTypeStpResource($userTypeStp), "UserTypeStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTypeStp  $userTypeStp
     * @return \Illuminate\Http\Response
     */
    public function show($usertype_id)
    {
        $userTypeStps = new UserTypeStpCollection(UserTypeStp::where('usertype_id', $usertype_id)->get());
        return response()->success($userTypeStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\UserTypeStp  $userTypeStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserTypeStpRequest $request, UserTypeStp $userTypeStp)
    {
        $data = UploadService::upload($request, "images/usertype/value_prositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new UserTypeStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $request->id],
                ['usertype_id', '=', $request->usertype_id],
            ]);
            if ($checker)
                return response()->error([], "UserTypeStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $userTypeStp->update($data);
        return  response()->success(new UserTypeStpResource($userTypeStp), "UserTypeStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTypeStp  $userTypeStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTypeStp $userTypeStp, $id)
    {
        $userTypeStp = UserTypeStp::whereId($id)->first();
        $userTypeStp->delete();
        return response()->success([], "UserTypeStp deleted successfully!");
    }
}
