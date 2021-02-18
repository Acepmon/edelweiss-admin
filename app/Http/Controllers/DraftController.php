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
        $with = array_filter(explode(',', $request->input('with', 'customer')));
        $limit = $request->input('limit', 10);
        $sorts = $request->input('sort', ['field' => 'id', 'type' => 'asc']);
        $sorts = json_decode($sorts[0], true);
        $sort = $sorts['field'];
        $order = $sorts['type'];
        $filters = $request->input('columnFilters', '{}');
        $filters = json_decode($filters, true);

        $items = Draft::query();

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            // $items = $items->where('id', $search);
        }

        if (array_key_exists('id', $filters) && !empty($filters['id'])) {
            $id = $filters['id'];
            $items = $items->where('id', $id);
        }

        if (array_key_exists('created_at', $filters) && !empty($filters['created_at'])) {
            $createdAt = $filters['created_at'];
            $items = $items->where('created_at', 'LIKE', `%$createdAt%`);
        }

        if (array_key_exists('customer_name', $filters) && !empty($filters['customer_name'])) {
            $customerName = $filters['customer_name'];
            $items = $items->whereHas('customer', function ($query) use ($customerName) {
                $query->where('first_name', 'LIKE', '%' . $customerName . '%')->orWhere('last_name', 'LIKE', '%' . $customerName . '%');
            });
        }

        if (array_key_exists('status_cd', $filters) && !empty($filters['status_cd'])) {
            $statusCd = $filters['status_cd'];
            $items = $items->where('status_cd', $statusCd);
        }

        if (array_key_exists('total_amount', $filters) && !empty($filters['total_amount'])) {
            $totalAmount = $filters['total_amount'];
            $items = $items->where('total_amount', $totalAmount);
        }

        if ($limit == -1) {
            $items = $items->with($with)->orderBy($sort, $order)->get();
        } else {
            $items = $items->with($with)->orderBy($sort, $order)->paginate($limit);
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
