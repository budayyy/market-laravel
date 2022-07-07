<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();


        $order = Order::join('member', 'odr_mb_id', '=', 'mb_id')
            ->join('address', 'odr_adr_id', '=', 'adr_id')
            ->join('shipping', 'odr_shp_id', '=', 'shp_id')
            ->join('retail', 'odr_rtl_id', '=', 'rtl_id')
            ->join('payment', 'odr_pay_id', '=', 'pay_id')
            ->select('order.odr_id', 'order.odr_date', 'order.odr_status', 'member.mb_name', 'shipping.shp_name', 'retail.rtl_name', 'payment.pay_name', 'address.adr_address')->get();

        return view('orders.index', [
            "title" => "Orders",
            "order" => $order,
            "session" => $session
        ]);
    }

    public function detail(Request $request, $id)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $orderId = Order::join('member', 'odr_mb_id', '=', 'mb_id')
            ->join('address', 'odr_adr_id', '=', 'adr_id')
            ->join('shipping', 'odr_shp_id', '=', 'shp_id')
            ->join('retail', 'odr_rtl_id', '=', 'rtl_id')
            ->join('payment', 'odr_pay_id', '=', 'pay_id')
            ->select('order.odr_id', 'order.odr_date', 'order.odr_status', 'order.odr_ongkir', 'member.mb_name', 'member.mb_phone', 'member.mb_email', 'shipping.shp_name', 'retail.rtl_name', 'retail.rtl_addres', 'retail.rtl_phone', 'payment.pay_name', 'address.adr_address')
            ->where('order.odr_id', $id)
            ->first();

        $productId = DB::table('order_detail')
            ->join('product', 'odd_prd_id', '=', 'prd_id')
            ->join('category', 'prd_ctg_id', '=', 'ctg_id')
            ->select('order_detail.*', 'product.*', 'category.*')
            ->where('order_detail.odr_id', $id)
            ->get();


        return view('orders.detail', [
            "title" => "Orders",
            "orderId" => $orderId,
            "productId" => $productId,
            "session"   => $session
        ]);
    }

    public function invoice(Request $request, $id)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $orderId = Order::join('member', 'odr_mb_id', '=', 'mb_id')
            ->join('address', 'odr_adr_id', '=', 'adr_id')
            ->join('shipping', 'odr_shp_id', '=', 'shp_id')
            ->join('retail', 'odr_rtl_id', '=', 'rtl_id')
            ->join('payment', 'odr_pay_id', '=', 'pay_id')
            ->select('order.odr_id', 'order.odr_date', 'order.odr_status', 'order.odr_ongkir', 'member.mb_name', 'member.mb_phone', 'member.mb_email', 'shipping.shp_name', 'retail.rtl_name', 'retail.rtl_addres', 'retail.rtl_phone', 'payment.pay_name', 'address.adr_address')
            ->where('order.odr_id', $id)
            ->first();

        $productId = DB::table('order_detail')
            ->join('product', 'odd_prd_id', '=', 'prd_id')
            ->join('category', 'prd_ctg_id', '=', 'ctg_id')
            ->select('order_detail.*', 'product.*', 'category.*')
            ->where('order_detail.odr_id', $id)
            ->get();


        return view('orders.invoice', [
            "title" => "Invoice Print",
            "orderId" => $orderId,
            "productId" => $productId,
            "session"   => $session
        ]);
    }
}
