<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValuePropositionRequest;
use App\Http\Resources\ValuePropositionCollection;
use App\Http\Resources\ValuePropositionResource;
use App\Models\ValueProposition;
use App\Services\DuplicationCheck;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ValuePropositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valuePropositions = new ValuePropositionCollection(ValueProposition::latest()->get());
        return response()->success($valuePropositions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValuePropositionRequest $request)
    {
        $vp = Str::slug(json_decode($request->title)->en);
        $checker = DuplicationCheck::check(new ValueProposition(), [
            ['slug', '=', $vp],
        ]);
        if ($checker) {
            return response()->error([], "ValueProposition $vp already exists!!", 422);
        }
        $data = UploadService::upload($request, "images/value_propositions");
        if (!empty($vp))
            $data = \array_merge($data, ["slug" => $vp]);
        $valueProposition = ValueProposition::create($data);
        return response()->success(new ValuePropositionResource($valueProposition), "ValueProposition created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ValueProposition  $valueProposition
     * @return \Illuminate\Http\Response
     */
    public function show(ValueProposition $valueProposition)
    {
        return response()->success(new ValuePropositionResource($valueProposition));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\ValueProposition  $valueProposition
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ValuePropositionRequest $request, ValueProposition $valueProposition)
    {
        $data = UploadService::upload($request, "images/value_propositions");
        if (!empty($data['title'])) {
            $title = json_decode($data['title'], true);
            $slug = Str::slug($title['en']);
            $checker = DuplicationCheck::check(new ValueProposition(), [
                ['slug', '=', $slug],
                ['id', '!=', $valueProposition->id],
            ]);
            if ($checker)
                return response()->error([], "ValueProposition $slug already exists!!", 422);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $valueProposition->update($data);
        return  response()->success(new ValuePropositionResource($valueProposition), "ValueProposition updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ValueProposition  $valueProposition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $valueProposition = ValueProposition::whereId($id)->first();
        $valueProposition->delete();
        return response()->success([], "ValueProposition deleted successfully!");
    }
}
