<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Http\Resources\ProviderCollection;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = new ProviderCollection(Provider::latest()->get());
        return response()->success($providers, 'Available providers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        $provider_slug = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new Provider(), [
            ['slug', '=', $provider_slug],
        ]);
        if ($checker) {
            return response()->error([], "Provider $provider_slug already exists!!", 422);
        }
        $first = UploadService::upload($request, "images/providers", "caption_image");
        $data = UploadService::upload($request, "images/providers");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($provider_slug))
            $data = \array_merge($data, ["slug" => $provider_slug]);
        $provider = Provider::create($data);
        return response()->success(new ProviderResource($provider), 'Provider created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return response()->success(new ProviderResource($provider));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderRequest $request, Provider $provider)
    {
        $first = UploadService::upload($request, "images/providers", "caption_image");
        $data = UploadService::upload($request, "images/providers");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new Provider(), [
                ['slug', '=', $slug],
                ['id', '!=', $provider->id],
            ]);
            if ($checker)
                return response()->error([], "Provider $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $provider->update($data);
        return response()->success(new ProviderResource($provider), 'Provider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::whereId($id)->first();
        try {
            $provider->delete();
            return response()->success(null, 'Provider deleted successfully');
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 'Action failed', 400);
        }
    }
}
