<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
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

        if ($limit == -1) {
            $items = $items->with($with)->orderBy('id', 'asc')->get();
        } else {
            $items = $items->with($with)->orderBy('id', 'asc')->paginate($limit);
        }

        return CategoryResource::collection($items);
    }
}
