<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceCollection;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = new ServiceCollection(Service::latest()->get());
        return response()->success(($services));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service_slug = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new Service(), [
            ['slug', '=', $service_slug],
        ]);
        if ($checker)
            return response()->error([], "Service $service_slug already exists!!", 422);
        $first = UploadService::upload($request, "images/services", "caption_image");
        $data = UploadService::upload($request, "images/services", "icon");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($service_slug))
            $data = \array_merge($data, ["slug" => $service_slug]);
        $service = Service::create($data);
        return response()->success(new ServiceResource($service), "Service created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return response()->success(new ServiceResource($service));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Service  $service
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $first = UploadService::upload($request, "images/services", "caption_image");
        $data = UploadService::upload($request, "images/services", "icon");
        if (!empty($first['caption_image'])) {
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        }
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new Service(), [
                ['slug', '=', $slug],
                ['id', '!=', $service->id],
            ]);
            if ($checker)
                return response()->error([], "Service $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $service->update($data);
        return  response()->success(new ServiceResource($service), "Service updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::whereId($id)->first();
        $service->delete();
        return response()->success([], "Service deleted successfully!");
    }
}
