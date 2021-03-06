<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommonCodeResource;
use App\Models\CommonCode;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = CommonCode::query()->where('comm2_cd', '$$');

        $with = array_filter(explode(',', $request->input('with')));
        $limit = $request->input('limit', 10);

        if ($limit == -1) {
            $items = $items->with($with)->get();
        } else {
            $items = $items->with($with)->paginate($limit);
        }

        return CommonCodeResource::collection($items);
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
    public function show(Request $request, $cd1)
    {
        $items = CommonCode::whereNotIn('comm2_cd', ['$$'])->where('comm1_cd', $cd1);

        $with = array_filter(explode(',', $request->input('with')));
        $limit = $request->input('limit', 15);
        $sort = $request->input('sort', 'comm2_cd');
        $order = $request->input('order', 'asc');

        if ($limit == -1) {
            $items = $items->with($with)->orderBy($sort, $order)->get();
        } else {
            $items = $items->with($with)->orderBy($sort, $order)->paginate($limit);
        }

        return CommonCodeResource::collection($items);
    }

    public function show2(Request $request, $cd1, $cd2)
    {
        $item = CommonCode::where('comm1_cd', $cd1)->where('comm2_cd', $cd2)->first();

        return new CommonCodeResource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cd1, $cd2)
    {
        $request->validate([
            'comm1_cd' => 'required',
            'comm2_cd' => 'required',
            'comm2_nm' => 'required'
        ]);

        $item = CommonCode::where('comm1_cd', $cd1)->where('comm2_cd', $cd2)->first();
        
        if ($item != null) {
            CommonCode::where('comm1_cd', $cd1)->where('comm2_cd', $cd2)->update($request->all());
        }

        return response()->json([
            'result' => 'success',
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $cd1, $cd2)
    {
        $item = CommonCode::where('comm1_cd', $cd1)->where('comm2_cd', $cd2)->first();

        if ($item == null) {
            return response()->json([
                'result' => 'error',
                'message' => 'Resource not found',
            ], 404);
        }

        if ($cd2 == '$$') {
            CommonCode::where('comm1_cd', $cd1)->delete();
        } else {
            CommonCode::where('comm1_cd', $cd1)->where('comm2_cd', $cd2)->delete();
        }

        return response()->json([
            'result' => 'success',
            'message' => 'Resource deleted'
        ]);
    }
}
