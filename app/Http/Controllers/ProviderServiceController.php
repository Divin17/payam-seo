<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderServiceRequest;
use App\Models\ProviderService;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProviderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providerServices = ProviderService::latest()->get();
        return response()->success($providerServices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderServiceRequest $request)
    {
        $service_slug = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new ProviderService(), [
            ['slug', '=', $service_slug],
            ['provider_id', '=', $request->provider_id],
        ]);
        if ($checker)
            return response()->error([], "ProviderService $service_slug already exists!!", 422);
        $data = UploadService::upload($request, "images/provider/services", "icon");
        if (!empty($service_slug))
            $data = \array_merge($data, ["slug" => $service_slug]);
        $providerService = ProviderService::create($data);
        return response()->success($providerService, "ProviderService created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProviderService  $providerService
     * @return \Illuminate\Http\Response
     */
    public function show(ProviderService $providerService)
    {
        return response()->success($providerService);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\ProviderService  $providerService
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderServiceRequest $request, ProviderService $providerService)
    {
        $data = UploadService::upload($request, "images/provider/services", "icon");
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new ProviderService(), [
                ['slug', '=', $slug],
                ['id', '!=', $request->id],
                ['provider_id', '=', $request->provider_id],
            ]);
            if ($checker) {
                return response()->error([], "ProviderService $slug already exists!!", 422);
            }
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $providerService->update($data);
        return  response()->success($providerService, "ProviderService updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProviderService  $providerService
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProviderService $providerService, $id)
    {
        $providerService = ProviderService::whereId($id)->first();
        $providerService->delete();
        return response()->success([], "ProviderService deleted successfully!");
    }
}
