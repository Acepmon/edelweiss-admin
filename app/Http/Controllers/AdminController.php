<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdmin;
use App\Http\Requests\UpdateAdmin;
use App\Http\Requests\UpdateAdminPassword;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Admin::query();

        $with = array_filter(explode(',', $request->input('with')));
        $limit = $request->input('limit', 15);
        $sort = $request->input('sort', 'created_at');
        $order = $request->input('order', 'desc');

        if ($request->has('role_cd')) {
            $items = $items->where('role_cd', $request->input('role_cd'));
        }

        if ($limit == -1) {
            $items = $items->with($with)->orderBy($sort, $order)->get();
        } else {
            $items = $items->with($with)->orderBy($sort, $order)->paginate($limit);
        }

        return AdminResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        $admin = Admin::create($request->all());

        if ($request->has('role')) {
            $role = $request->input('role');
            $admin->role_cd = $role;
            $admin->save();
        }

        return new AdminResource($admin);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return new AdminResource($admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmin $request, Admin $admin)
    {
        $admin = $admin->update($request->all());

        return new AdminResource($admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdateAdminPassword $request, Admin $admin)
    {
        $admin->password = Hash::make($request->password);
        $admin->save();

        return new AdminResource($admin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
    }
}
