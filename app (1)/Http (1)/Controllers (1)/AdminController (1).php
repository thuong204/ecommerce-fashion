<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function AuthLogin(){
        $admin_id=  Session::get("admin_id");
        if($admin_id){
            Redirect::to('dashboard');
        }
        else{
            Redirect::to('admin_login')->send();
        }
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('dashboard');
    }
    public function index()
    {
        return view("admin_login");
    }
    public function dashboard(Request $request)
    {
        $email = $request->admin_email;
        $password = $request->admin_password;
        $result = DB::table('tbl_admin')->where('admin_email', $email)->where('admin_password', $password)->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('dashboard');
        } else {
            Session::put('message', 'Email or password is incorrect .Please type again.');
            return Redirect::to('admin_login');
        }
    }
    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('admin_login');
    }
    //         if(!empty($result)){
    //           
    //             return Redirect::to('/dashboard');
    //         }
    //         else{
    //             Session::put('message','Email or username is not correct .Please type agin.');
    //             return Redirect::to('/admin_login');
    //         }
    // }
    public function check_login_user(Request $request){
        $email = $request->email;
        $password = $request->password;
        $result = DB::table('user')->where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('lastname', $result->lastname);
            Session::put('id', $result->id);
            return Redirect::to('index');
        } else {
            Session::put('message', 'Email or password is incorrect .Please type again.');
            return Redirect::to('login_cus');
        }

    }
}
