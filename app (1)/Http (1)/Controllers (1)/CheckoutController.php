<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id=  FacadesSession::get("admin_id");
        if($admin_id){
            Redirect::to('dashboard');
        }
        else{
            Redirect::to('admin_login')->send();
        }
    }
    public function cart_product()
    {
        $this->AuthLogin();
        $order_product = DB::table('tbl_order')
        ->join('table_user','tbl_order.customer_id', '=','table_user.user_id')
        ->select('tbl_order.*','table_user.user_name')
        ->orderBy('tbl_order.order_id','desc')->get();
        $manager_order_product =view('admin.cart_product')->with('order_product',$order_product);
        return view('dashboard')->with('admin.cart_product',$manager_order_product);
    }
    public function order_detail_product($order_id)
    {
        $this->AuthLogin();
        $order_product = DB::table('tbl_order')
        ->join('tbl_order_detail','tbl_order.order_id', '=','tbl_order_detail.order_id')
        ->join('table_user','tbl_order.customer_id','=','table_user.user_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->where('tbl_order.order_id',$order_id)
        ->select('tbl_order.*','table_user.*','tbl_shipping.*','tbl_order_detail.*')->get();

        $manager_order_detail_product =view('admin.order_detail_product')->with('order_product',$order_product);
        return view('dashboard')->with('admin.order_detail_product',$manager_order_detail_product);
    }

    //
}
