<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Http\Resources\FaqCollection;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::latest()->get();
        return response()->success(new FaqCollection($faqs));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $faq = Faq::create($request->validated());
        return response()->success(new FaqResource($faq), "Faq created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return response()->success(new FaqResource($faq));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Faq  $faq
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        return  response()->success(new FaqResource($faq), "Faq updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->success([], "Faq deleted successfully!");
    }
}
