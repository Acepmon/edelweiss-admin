<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\CommonCode;
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

        if ($request->has('uncategorized')) {
            $items = $items->whereNull('category_id');
        }

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
        $request->validate([
            'product_title' => 'required|string|max:250',
            'product_status_cd' => 'required|string',

            'product_desc' => 'nullable|string',
            'product_sku' => 'nullable|string',
            'product_barcode' => 'nullable|string',
            'product_stock' => 'nullable|numeric',
            'product_price' => 'nullable|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|array',

            'charge_tax' => 'nullable|boolean',
            'sell_out_of_stock' => 'nullable|boolean',
            'has_variants' => 'nullable|boolean',
        ]);

        $item = new Product();
        $item->product_title = $request->input('product_title');
        $item->product_status_cd = $request->input('product_status_cd');
        $item->product_desc = $request->input('product_desc');
        $item->product_sku = $request->input('product_sku');
        $item->product_barcode = $request->input('product_barcode');
        $item->product_stock = $request->input('product_stock');
        $item->category_id = $request->input('category_id');
        $item->tags = implode(',', $request->input('tags'));
        $item->charge_tax = $request->input('charge_tax');
        $item->sell_out_of_stock = $request->input('sell_out_of_stock');
        $item->has_variants = $request->input('has_variants');
        $item->save();

        return new ProductResource($item);
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

    public function batchUpdate(Request $request)
    {
        $request->validate([
            'where' => ['nullable', 'array'],
            'whereIn.key' => ['nullable', 'string'],
            'whereIn.val' => ['nullable', 'array'],
            'set' => ['required', 'array'],
        ]);

        $where = $request->input('where');
        $whereIn = $request->input('whereIn');
        $set = $request->input('set');
        $affected = null;

        if ($request->has('where')) {
            $affected = Product::where($where)->update($set);
        } else if ($request->has('whereIn')) {
            $affected = Product::whereIn($whereIn['key'], $whereIn['val'])->update($set);
        }

        return response()->json([
            'result' => 'success',
            'affected' => $affected
        ]);
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
