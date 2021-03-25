<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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

        $items = Order::query();

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

        if ((array_key_exists('order_status_cd', $filters) && !empty($filters['order_status_cd'])) || $request->has('order_status_cd')) {
            $orderStatusCd = $request->has('order_status_cd') ? $request->input('order_status_cd') : $filters['order_status_cd'];
            $items = $items->where('order_status_cd', $orderStatusCd);
        }

        if ((array_key_exists('payment_status_cd', $filters) && !empty($filters['payment_status_cd'])) || $request->has('payment_status_cd')) {
            $paymentStatusCd = $request->has('payment_status_cd') ? $request->input('payment_status_cd') : $filters['payment_status_cd'];
            $items = $items->where('payment_status_cd', $paymentStatusCd);
        }

        if ((array_key_exists('fulfillment_status_cd', $filters) && !empty($filters['fulfillment_status_cd'])) || $request->has('fulfillment_status_cd')) {
            $fulfillmentStatusCd = $request->has('fulfillment_status_cd') ? $request->input('fulfillment_status_cd') : $filters['fulfillment_status_cd'];
            $items = $items->where('fulfillment_status_cd', $fulfillmentStatusCd);
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

        return OrderResource::collection($items);
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
