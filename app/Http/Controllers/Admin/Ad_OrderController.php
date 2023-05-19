<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class Ad_OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('admin.order.order-list',[
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $order  = Order::where($where)->first();
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->all();
        // dd($data);
        $order = Order::findOrFail($order->id);
        $status = $data['status'] ?? $order->status;
        $payment_status = $data['payment_status'] ?? $order->payment_status;
        $order->update([
            'status' => $status,
            'payment_status' => $payment_status
        ]);
        return redirect()->route('admin.order.index')->with('success', 'Updated order status successfully!');
    }

    public function showDetail($order_id)
    {
        $order = Order::find($order_id);
        return view('admin.order.invoice',[
            'order' => $order
        ]);
    }

    public function printInvoice($order_id)
    {
        $order = Order::find($order_id);
        return view('admin.order.invoice-print',[
            'order' => $order
        ]);
    }

}
