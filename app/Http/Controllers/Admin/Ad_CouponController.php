<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class Ad_CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.list', [
            'coupons' => $coupons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $status = $request->has('status') ? 1 : 0;
        // dd($request->has('id'));
        $coupon   =   Coupon::updateOrCreate(
            [
                'id' => $request->id,
                'code' => $request->code
            ],
            [
                'value' => $request->value,
                'status' => $status,
                'times' => $request->times,
                'value_order' => $request->value_order
            ]
        );

        return response()->json($coupon);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $coupon  = Coupon::where($where)->first();
        return response()->json($coupon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id)->delete();
        return response()->json($coupon);
    }
}
