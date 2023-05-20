<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ViewProductData;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $count_product = Product::all()->count('*');
        $count_cate = Category::all()->count('*');
        $products = Product::all();
        $order_details = OrderDetail::all();
        return view('admin.dashboard.dashboard',[
            'count_cate' => $count_cate,
            'count_product' => $count_product,
            'products' => $products,
            'order_details' => $order_details
        ]);
    }

    public function productSales(Request $request)
    {
        $sub7day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $products = ViewProductData::where('quantity_sell','<>', null)->get();
        $chart_data = [];
        
        $label = [];
        $data = [];
        foreach($products as $key=>$value){
            $label[] = $value->created_at;
            $data[] = $value->quantity;
            
        }
        return response()->json([
            'label'=>$label,
            'data'=>$data,
        ]);
    }
}
