<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function check_login_user(Request $request){
        $email = $request->email;
        $password = $request->password;
        $result = DB::table('table_user')->where('user_email', $email)->where('user_password', $password)->first();
        if ($result) {
            Session::put('name', $result->user_name);
            Session::put('id', $result->user_id);
            return Redirect::to('index');
        } else {
            Session::put('message', 'Email or password is incorrect .Please type again.');
            return Redirect::to('login_cus');
        }

    }
    public function logout_cus(){
        Session::put('name',null);
        Session::put('id',null);
        Cart::destroy();
        return Redirect::to('/login_cus');


    }
    //
}
