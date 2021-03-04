<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSeo;
use App\Http\Resources\SeoResource;

class ProductSeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'seo_title' => 'nullable|string|max:70',
            'seo_desc' => 'nullable|string|max:320',
            'seo_url' => 'nullable|string|max:250',
            'seo_url_host' => 'nullable|string',
        ]);

        $item = $product->seo()->updateOrCreate([
            'seo_title' => $request->input('seo_title'),
            'seo_desc' => $request->input('seo_desc'),
            'seo_url' => $request->input('seo_url_host') . $request->input('seo_url'),
        ]);

        return new SeoResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
