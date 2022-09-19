<?php

namespace App\Http\Controllers;

use App\Http\Requests\NetworkRequest;
use App\Http\Resources\NetworkCollection;
use App\Http\Resources\NetworkResource;
use App\Models\Network;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $networks = new NetworkCollection(Network::latest()->get());
        return response()->success($networks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NetworkRequest $request)
    {
        $network_slug = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new Network(), [
            ['slug', '=', $network_slug],
        ]);
        if ($checker)
            return response()->error([], "Network $network_slug already exists!!", 422);
        $first = UploadService::upload($request, "images/networks", "caption_image");
        $data = UploadService::upload($request, "images/networks");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($network_slug))
            $data = \array_merge($data, ["slug" => $network_slug]);
        $network = Network::create($data);
        return response()->success(new NetworkResource($network), "Network created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function show(Network $network)
    {
        return response()->success(new NetworkResource($network));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Network  $network
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(NetworkRequest $request, Network $network)
    {
        $first = UploadService::upload($request, "images/networks", "caption_image");
        $data = UploadService::upload($request, "images/networks");
        if (!empty($first['caption_image']))
            $data = array_merge($data, ["caption_image" => $first["caption_image"]]);
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $checker = DuplicationCheck::check(new Network(), [
                ['slug', '=', $slug],
                ['id', '!=', $network->id],
            ]);
            if ($checker)
                return response()->error([], "Network $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $network->update($data);
        return  response()->success(new NetworkResource($network), "Network updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $network = Network::whereId($id)->first();
        $network->delete();
        return response()->success([], "Network deleted successfully!");
    }
}
