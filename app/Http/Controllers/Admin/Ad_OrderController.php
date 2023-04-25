<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class Ad_OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.order-list');
    }

    public function progress()
    {
        return view();
    }

    //response to ajax
    public function updateStatusOrder(Request $request, $order_id)
    {
        $status = $request->status;
        $order = Order::findOrFail($order_id);
        $order->update([
            'status' => $status
        ]);
        return response()->json($order);
    }

    public function showDetail()
    {
        return view('admin.order.invoice');
    }

    public function printInvoice()
    {
        return view('admin.order.invoice-print');
    }
}
