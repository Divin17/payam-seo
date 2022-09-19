<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceVpRequest;
use App\Http\Resources\ServiceVpCollection;
use App\Http\Resources\ServiceVpResource;
use App\Models\ServiceVp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceVpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceVps = new ServiceVpCollection(ServiceVp::latest()->get());
        return response()->success($serviceVps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceVpRequest $request)
    {
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new ServiceVp(), [
            ['slug', '=', $vp],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "ServiceVp $vp already exists!!", 422);
        $data = UploadService::upload($request, "images/provider/value_prositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $serviceVp = ServiceVp::create($data);
        return response()->success(new ServiceVpResource($serviceVp), 'ServiceVp created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceVp  $serviceVp
     * @return \Illuminate\Http\Response
     */
    public function show($service_id)
    {
        $serviceVps = new ServiceVpCollection(ServiceVp::where('service_id', $service_id)->get());
        return response()->success($serviceVps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\ServiceVp  $serviceVp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceVpRequest $request, ServiceVp $serviceVp)
    {
        $data = UploadService::upload($request, "images/provider/value_prositions");
        if (!empty($data['name'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new ServiceVp(), [
                ['slug', '=', $slug],
                ['id', '!=', $request->id],
                ['service_id', '=', $request->service_id],
            ]);
            if ($checker)
                return response()->error([], "ServiceVp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $serviceVp->update($data);
        return  response()->success(new ServiceVpResource($serviceVp), "ServiceVp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceVp  $serviceVp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceVp $serviceVp, $id)
    {
        $serviceVp = ServiceVp::whereId($id)->first();
        $serviceVp->delete();
        return response()->success([], "ServiceVp deleted successfully!");
    }
}
