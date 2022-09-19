<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStpRequest;
use App\Http\Resources\ServiceStpCollection;
use App\Http\Resources\ServiceStpResource;
use App\Models\ServiceStp;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceStpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceStps = new ServiceStpCollection(ServiceStp::latest()->get());
        return response()->success($serviceStps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStpRequest $request)
    {
        $step = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new ServiceStp(), [
            ['slug', '=', $step],
            ['service_id', '=', $request->service_id],
        ]);
        if ($checker)
            return response()->error([], "ServiceStp $step already exists!!", 422);
        $data = UploadService::upload($request, "images/provider/value_prositions");
        if (!empty($step))
            $data = \array_merge($data, ["slug" => $step]);
        $serviceStp = ServiceStp::create($data);
        return response()->success(new ServiceStpResource($serviceStp), 'ServiceStp created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceStp  $serviceStp
     * @return \Illuminate\Http\Response
     */
    public function show($service_id)
    {
        $serviceStps = new ServiceStpCollection(ServiceStp::where('service_id', $service_id)->get());
        return response()->success($serviceStps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\ServiceStp  $serviceStp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceStpRequest $request, ServiceStp $serviceStp)
    {
        $data = UploadService::upload($request, "images/provider/value_prositions");
        if (!empty($data['name'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new ServiceStp(), [
                ['slug', '=', $slug],
                ['id', '!=', $request->id],
                ['service_id', '=', $request->service_id],
            ]);
            if ($checker)
                return response()->error([], "ServiceStp $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $serviceStp->update($data);
        return  response()->success(new ServiceStpResource($serviceStp), "ServiceStp updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceStp  $serviceStp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceStp $serviceStp, $id)
    {
        $serviceStp = ServiceStp::whereId($id)->first();
        $serviceStp->delete();
        return response()->success([], "ServiceStp deleted successfully!");
    }
}
