<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use App\Services\UploadService;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::latest()->get();
        return response()->success($languages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $data = UploadService::upload($request, "images/languages");
        $language = Language::create($data);
        return response()->success($language);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        return response()->success($language);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Language  $language
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $data = UploadService::upload($request, "images/languages");
        $language->update($data);
        return  response()->success($language, "Language updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return response()->success([], "Language deleted successfully!");
    }
}
