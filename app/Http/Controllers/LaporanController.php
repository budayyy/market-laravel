<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $total_terjual = OrderDetail::sum('odd_qty');
        $harga_total   = OrderDetail::sum('odd_totalprice');

        $chart = DB::table('order_detail')
            ->selectRaw('sum(order_detail.odd_qty) as terbanyak')
            ->selectRaw('sum(order_detail.odd_totalprice) as tertinggi')
            ->selectRaw('monthname(odd_create) as month')
            ->groupBy('month')
            ->orderBy('odd_create', 'ASC')
            ->get();

        $terbanyak = [];
        foreach ($chart as $row) {
            $terbanyak[] = $row->terbanyak;
        }
        $bulan = [];
        foreach ($chart as $row) {
            $bulan[] = $row->month;
        }
        $tertinggi = [];
        foreach ($chart as $row) {
            $tertinggi[] = $row->tertinggi;
        }


        return view('laporan.index', [
            "title" => "Laporan",
            "total_terjual" => $total_terjual,
            "harga_total" => $harga_total,
            "bulan"        => $bulan,
            "terbanyak"        => $terbanyak,
            "tertinggi"     => $tertinggi,
            "session" => $session
        ]);
    }

    public function penjualan(Request $request)
    {
        // Session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $total_terjual = OrderDetail::sum('odd_qty');
        $harga_total   = OrderDetail::sum('odd_totalprice');
        $jml_ctg       = Category::count();
        $category      = Category::all();
        $penjualan     = DB::table('order_detail')
            ->join('product', 'odd_prd_id', '=', 'prd_id')
            ->join('category', 'prd_ctg_id', '=', 'ctg_id')
            ->select('category.ctg_name')
            ->selectRaw('sum(order_detail.odd_qty) as terjual')
            ->selectRaw('sum(order_detail.odd_totalprice) as total')
            ->groupBy('prd_ctg_id')->get();

        return view('laporan.penjualan', [
            "title" => "Laporan",
            "total_terjual" => $total_terjual,
            "harga_total" => $harga_total,
            "jml_ctg"   => $jml_ctg,
            "penjualan" => $penjualan,
            "category"  => $category,
            "session"   => $session
        ]);
    }

    public function terbanyak(Request $request)
    {
        // Session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $total_terjual = OrderDetail::sum('odd_qty');
        $harga_total   = OrderDetail::sum('odd_totalprice');
        $jumlah_barang = OrderDetail::orderByDesc('odd_qty')->count();
        $terbanyak     = OrderDetail::orderByDesc('odd_qty')->get();
        $category      = Category::all();


        return view('laporan.terbanyak', [
            "title" => "Laporan",
            "total_terjual" => $total_terjual,
            "harga_total" => $harga_total,
            "jumlah_barang" => $jumlah_barang,
            "terbanyak"     => $terbanyak,
            "category"      => $category,
            "session"   => $session
        ]);
    }

    public function periode(Request $request)
    {
        // Session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $total_terjual = OrderDetail::sum('odd_qty');
        $harga_total   = OrderDetail::sum('odd_totalprice');
        $category      = Category::all();
        $periode       = DB::table('order_detail')
            ->select('odd_create')
            ->selectRaw('sum(order_detail.odd_qty) as terjual')
            ->selectRaw('sum(order_detail.odd_totalprice) as total')
            ->groupBy(DB::raw('MONTH(odd_create)'))
            ->get();

        return view('laporan.periode', [
            "title" => "Laporan",
            "total_terjual" => $total_terjual,
            "harga_total" => $harga_total,
            "periode"   => $periode,
            "category"  => $category,
            "session" => $session
        ]);
    }
}
