<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class CategoryProduct extends Controller
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
    public function add_category_product()
    {
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function save_category_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->input('category_product_name');
        $data['category_desc'] = $request->input('category_product_desc');
        // $data['category_product_name']= $request->category_product_name;
        DB::table('category_product')->insert($data);
        FacadesSession::put('message', "Thêm danh mục thành công");
        return Redirect::to("add-category-product");
    }
    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = DB::table('category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('dashboard')->with('admin.all_category_product', $manager_category_product);
    }
    public function edit_category_product($category_product_id)
    {
        $this->AuthLogin();
        $edit_category_product = DB::table('category_product')->where('category_id', $category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('dashboard')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request, $category_product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->input('category_product_name');
        $data['category_desc'] = $request->input('category_product_desc');

        DB::table('category_product')->where('category_id', $category_product_id)->update($data);
        FacadesSession::put('message', "Cập nhật danh mục thành công");
        return Redirect::to("all-category-product");
    }
    public function delete_category_product($category_product_id)
    {
        $this->AuthLogin();
        $delete_category_product = DB::table("category_product")->where('category_id', $category_product_id)->delete();
        FacadesSession::put('message', "Xóa danh mục thành công");
        return Redirect::to("all-category-product");
    }
}
