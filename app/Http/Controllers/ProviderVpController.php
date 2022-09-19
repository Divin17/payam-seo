<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderVpRequest;
use App\Http\Resources\ProviderVpCollection;
use App\Http\Resources\ProviderVpResource;
use App\Models\ProviderVp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProviderVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providerVps = new ProviderVpCollection(ProviderVp::latest()->get());
        return response()->success($providerVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderVpRequest $request)
    {
        $data = UploadService::upload($request, "images/provider/value_prositions");
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new ProviderVp(), [
            ['slug', '=', $vp],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "ProviderVp $vp already exists!!", 422);
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $providerVp = ProviderVp::create($data);
        return response()->success(new ProviderVpResource($providerVp), "providerVp created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProviderVp  $providerVp
     * @return \Illuminate\Http\Response
     */
    public function show($provider_id)
    {
        $providerVps = new ProviderVpCollection(ProviderVp::where('provider_id', $provider_id)->get());
        return response()->success($providerVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\ProviderVp  $providerVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderVpRequest $request, ProviderVp $providerVp)
    {
        $data = UploadService::upload($request, "images/provider/value_prositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new ProviderVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $request->id],
                ['provider_id', '=', $request->provider_id],
            ]);
            if ($checker)
                return response()->error([], "ProviderVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $providerVp->update($data);
        return  response()->success(new ProviderVpResource($providerVp), "ProviderVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProviderVp  $providerVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProviderVp $providerVp, $id)
    {
        $providerVp = ProviderVp::whereId($id)->first();
        $providerVp->delete();
        return response()->success([], "ProviderVp deleted successfully!");
    }
}
