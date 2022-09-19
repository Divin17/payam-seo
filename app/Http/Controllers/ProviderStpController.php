<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderStpRequest;
use App\Http\Resources\ProviderStpCollection;
use App\Http\Resources\ProviderStpResource;
use App\Models\ProviderStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProviderStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providerStps = new ProviderStpCollection(ProviderStp::latest()->get());
        return response()->success($providerStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderStpRequest $request)
    {
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new ProviderStp(), [
            ['slug', '=', $step],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "ProviderStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/provider/value_prositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $providerStp = ProviderStp::create($data);
        return response()->success(new ProviderStpResource($providerStp), "providerStp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProviderStp  $providerStp
     * @return \Illuminate\Http\Response
     */
    public function show($provider_id)
    {
        $providerStps = new ProviderStpCollection(ProviderStp::where('provider_id', $provider_id)->get());
        return response()->success($providerStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\ProviderStp  $providerStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderStpRequest $request, ProviderStp $providerStp)
    {
        $data = UploadService::upload($request, "images/provider/value_prositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new ProviderStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $request->id],
                ['provider_id', '=', $request->provider_id],
            ]);
            if ($checker)
                return response()->error([], "ProviderStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $providerStp->update($data);
        return  response()->success(new ProviderStpResource($providerStp), "ProviderStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProviderStp  $providerStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProviderStp $providerStp, $id)
    {
        $providerStp = ProviderStp::whereId($id)->first();
        $providerStp->delete();
        return response()->success([], "ProviderStp deleted successfully!");
    }
}
