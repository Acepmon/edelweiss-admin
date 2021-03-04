<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Http\Resources\ProductMediaResource;

class ProductMediaController extends Controller
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
            'medias' => 'required|array'
        ]);

        $medias = $request->input('medias');
        $configuration = \Uploadcare\Configuration::create(config('services.uploadcare.public_key'), config('services.uploadcare.private_key'));
        $api = (new \Uploadcare\Api($configuration))->file();
        $stored = collect();

        foreach ($medias as $index => $media) {
            $file = $api->storeFile($media['uuid']);

            $item = new ProductMedia();
            $item->product_id = $product->id;
            $item->name = $media['name'];
            $item->uuid = $media['uuid'];
            $item->type = $media['mimeType'];
            $item->url = $media['cdnUrl'];
            $item->original = $media['originalUrl'];
            $item->size = $media['size'];
            $item->save();

            $stored->push($item);
        }

        return ProductMediaResource::collection($stored);
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
