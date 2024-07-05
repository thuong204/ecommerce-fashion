<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

use function Laravel\Prompts\alert;

class CartController extends Controller
{
    public function AuthLogin(){
        $user_id=  FacadesSession::get('id');
        if($user_id){
            Redirect::to('trangchu/shopping_cart');
        }
        else{
            Redirect::to('login_cus')->send();
        }
    }

    public function save_cart(Request $request)
    {
        $this->AuthLogin();
        $product_id = $request->productid_hidden;
        $amount = $request->amount;
        $color = $request->color;
        $size = $request->size;
        $product_info= DB::table('tbl_product')->where('product_id', $product_id)->first();

        $data['id']=$product_info->product_id;
        $data['qty']=$amount;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_cost;
        $data['options']['image']=$product_info->product_image;
        
        Cart::add($data);
        return view('trangchu/shopping_cart');
    }
    public function delete_cart($rowId)
    {
        Cart::update($rowId,0);
        return view('trangchu/shopping_cart');

    }
    public function save_check_out_cus(Request $request){
        $this->AuthLogin();
        $content=Cart::content();
        $data=array();
        $data['ship_name']=$request->calc_shipping_name;
        $data['ship_phone']=$request->calc_shipping_phone;
        $data['ship_address']=$request->calc_shipping_address;

        $shipping_id= DB::table('tbl_shipping')->insertGetId($data);
        FacadesSession::put('shipping_id',$shipping_id);

        $data_order = array();
        $data_order['customer_id']=FacadesSession::get('id');
        $data_order['shipping_id']=FacadesSession::get('shipping_id');
        $data_order['order_subtotal']=Cart::subtotal();
        $data_order['order_tax']=Cart::tax();
        $data_order['order_total']=Cart::total();
        $data_order['order_status']="Đang chờ xử lí";
        $order_id = DB::table('tbl_order')->insertGetId($data_order);

        $data_order_detail=array();
        foreach( $content as $cont){
            $data_order_detail['order_id']=$order_id;
            $data_order_detail['product_id']=$cont->id;
            $data_order_detail['product_name']=$cont->name;
            $data_order_detail['product_qty']=$cont->qty;
            $data_order_detail['product_price']=$cont->price;
            $data_order_detail['product_qty_price']=$cont->price*$cont->qty;
            $order_detail_id = DB::table('tbl_order_detail')->insertGetId($data_order_detail);
            FacadesSession::put('order_detail_id',$order_detail_id);
        }
        return redirect::to('shopping_cart');
    }
    //
}
