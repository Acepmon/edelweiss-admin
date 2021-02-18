<?php

namespace App\Http\Controllers;

use App\Http\Resources\DraftResource;
use App\Models\Draft;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $with = array_filter(explode(',', $request->input('with')));
        $perPage = $request->input('perPage', 10);
        $sorts = $request->input('sort', ['field' => 'id', 'type' => 'asc']);
        $sorts = json_decode($sorts[0], true);
        $sort = $sorts['field'];
        $order = $sorts['type'];

        $items = Draft::query();

        if ($perPage == -1) {
            $items = $items->with($with)->orderBy($sort, $order)->get();
        } else {
            $items = $items->with($with)->orderBy($sort, $order)->paginate($perPage);
        }

        return DraftResource::collection($items);
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
