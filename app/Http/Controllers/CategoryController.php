<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $with = array_filter(explode(',', $request->input('with')));
        $limit = $request->input('limit', 10);
        $filters = $request->input('columnFilters', '{}');
        $filters = json_decode($filters, true);

        $items = Category::whereNull('parent_id');

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $items = $items->where('name', 'LIKE', '%' . $search . '%');
        }

        if ($limit == -1) {
            $items = $items->with($with)->orderBy('id', 'asc')->get();
        } else {
            $items = $items->with($with)->orderBy('id', 'asc')->paginate($limit);
        }

        return CategoryResource::collection($items);
    }

    public function products(Request $request, Category $category)
    {
        return ProductResource::collection($category->products);
    }

    public function show(Request $request, Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'image' => 'nullable|string|max:250',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->name = $request->input('name');
        $category->image = $request->input('image');
        $category->parent_id = $request->input('parent_id');
        $category->save();

        return new CategoryResource($category);
    }

    public function destroy(Request $request, Category $category)
    {
        $category->products()->update(['category_id' => null]);
        $category->delete();

        return response()->json([
            'result' => 'success'
        ]);
    }
}
