<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Member;
use App\Models\Retail;
use App\Models\Builder;
use App\Models\Payment;
use App\Models\Category;
use App\Models\Shipping;
use App\Models\Consultant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();


        $category = Category::count();
        $shipping = Shipping::count();
        $order    = Order::count();
        $payment  = Payment::count();
        $member   = Member::count();
        $city     = City::count();
        $consult  = Consultant::count();
        $builder  = Builder::count();
        $user     = Admin::where('role_id', '!=', 1)->count();
        $retail   = Retail::count();

        return view('dashboard.index', [
            "title" => "Dashboard",
            "category" => $category,
            "shipping" => $shipping,
            "order" => $order,
            "payment" => $payment,
            "member" => $member,
            "city"   => $city,
            "consult" => $consult,
            "builder" => $builder,
            'user'    => $user,
            'retail'  => $retail,
            'session' => $session
        ]);
    }
}
