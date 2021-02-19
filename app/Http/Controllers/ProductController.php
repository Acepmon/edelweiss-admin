<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $with = array_filter(explode(',', $request->input('with')));
        $limit = $request->input('limit', 10);
        $filters = $request->input('columnFilters', '{}');
        $filters = json_decode($filters, true);

        $items = Product::query();

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $items = $items->where('product_title', 'LIKE', '%' . $search . '%');
        }

        if ($limit == -1) {
            $items = $items->with($with)->orderBy('id', 'asc')->get();
        } else {
            $items = $items->with($with)->orderBy('id', 'asc')->paginate($limit);
        }

        return ProductResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
