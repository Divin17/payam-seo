<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetatagRequest;
use App\Http\Resources\MetatagCollection;
use App\Http\Resources\MetatagResource;
use App\Models\Metatag;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;

class MetatagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metatags = new MetatagCollection(Metatag::latest()->get());
        return response()->success($metatags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MetatagRequest $request)
    {
        $data = $request->validated();
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new Metatag(), [
                ['slug', '=', $slug],
            ]);
            if ($checker)
                return response()->error([], "Metatag $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $metatag = Metatag::create($data);
        return response()->success(new MetatagResource($metatag), "Metatag created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Metatag  $metatag
     * @return \Illuminate\Http\Response
     */
    public function show(Metatag $metatag)
    {
        return response()->success(new MetatagResource($metatag));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Metatag  $metatag
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(MetatagRequest $request, $metatag)
    {
        $metatag = Metatag::select('*')->where([
            ["slug", "=", $metatag],
            ["id", "=", $request->id]
        ])->first();
        $data = $request->validated();
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new Metatag(), [
                ['slug', '=', $slug],
                ['id', '!=', $request->id],
            ]);
            if ($checker)
                return response()->error([], "Metatag $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $metatag->update($data);
        return  response()->success(new MetatagResource($metatag), "Metatag updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Metatag  $metatag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metatag = Metatag::whereId($id)->first();
        $metatag->delete();
        return response()->success([], "Metatag deleted successfully!");
    }
}
