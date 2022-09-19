<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Services\DuplicationCheck;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()->get();
        return response()->success($pages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $data = $request->validated();
        $page_slug = Str::slug(json_decode($request->name)->en);
        $checker = DuplicationCheck::check(new Page(), [
            ['slug', '=', $page_slug],
        ]);
        if ($checker)
            return response()->error([], "Page $page_slug already exists!!", 422);
        if (!empty($page_slug))
            $data = \array_merge($data, ["slug" => $page_slug]);
        $page = Page::create($data);
        return response()->success($page, "Page created successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return response()->success($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Page  $page
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $data = $request->validated();
        if (!empty($data['name'])) {
            $name = json_decode($data['name'], true);
            $slug = Str::slug($name['en']);
            $data = \array_merge($data, ["slug" => $slug]);
        }
        $page->update($data);
        return  response()->success($page, "Page updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page, $id)
    {
        $page = Page::whereId($id)->first();
        $page->delete();
        return response()->success([], "Page deleted successfully!");
    }
}
