<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageMeta;
use App\Http\Requests\UpdatePageMeta;
use App\Http\Resources\PageMetaResource;
use App\Models\PageMeta;
use Illuminate\Http\Request;

class PageMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = PageMeta::query();

        $with = array_filter(explode(',', $request->input('with')));
        $limit = $request->input('limit', 15);
        $sort = $request->input('sort', 'meta_key');
        $order = $request->input('order', 'asc');

        if ($request->has('meta_key')) {
            $items = $items->where('meta_key', $request->input('meta_key'));
        }

        if ($limit == -1) {
            $items = $items->with($with)->orderBy($sort, $order)->get();
        } else {
            $items = $items->with($with)->orderBy($sort, $order)->paginate($limit);
        }

        return PageMetaResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageMeta $request)
    {
        $pageMeta = PageMeta::create($request->all());

        return new PageMetaResource($pageMeta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageMeta $request, $pageId, $metaKey)
    {
        $pageMeta = PageMeta::where('page_id', $pageId)->where('meta_key', $metaKey)->first();

        if ($pageMeta == null) {
            return null;
        }

        $pageMeta = $pageMeta->update($request->all());

        return new PageMetaResource($pageMeta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pageId, $metaKey)
    {
        $pageMeta = PageMeta::where('page_id', $pageId)->where('meta_key', $metaKey)->first();

        if ($pageMeta == null) {
            return null;
        }

        $pageMeta->delete();
    }
}
