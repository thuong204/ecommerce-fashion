<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as RoutingController;

class ProductController extends RoutingController
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
    public function add_product()
    {
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();
        $all_category_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        return view('admin.add_product')->with('all_brand_product', $all_brand_product)->with('all_category_product', $all_category_product);
    }
    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->get();
        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['product_cost'] = $request->input('product_price');
        $file = $request->file('product_image');
        if ($file) {
            $data['product_image'] = $file->getClientOriginalName();
        }
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['category_id'] = $request->input('product_category');
        $data['brand_id'] = $request->input('product_brand');
        $data['product_amount'] = $request->input('product_amount');
        $data['product_size'] = $request->input('product_size');
        $data['product_type'] = $request->input('product_type');
        // $data['category_product_name']= $request->category_product_name;
        DB::table('tbl_product')->insert($data);
        FacadesSession::put('message', "Thêm sản phẩm thành công");
        return Redirect::to("add-product");
    }
    public function all_product()
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
            ->join('category_product', 'category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')->paginate(10);
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('dashboard')->with('admin.all_product', $manager_product);
    }

    public function edit_product($product_id){
        $this->AuthLogin();
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $all_brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();
        $all_category_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('all_brand_product', $all_brand_product)->with('all_category_product', $all_category_product);
        return view('dashboard')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['product_cost'] = $request->input('product_price');
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['category_id'] = $request->input('product_category');
        $data['brand_id'] = $request->input('product_brand');
        $data['product_amount'] = $request->input('product_amount');
        $data['product_size'] = $request->input('product_size');
        $file=$request->FILE('product_image');
        if($file){
            $get_name_image=$file->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move('public/backend/images/products',$new_image);
            $data['product_image']= $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            FacadesSession::put('message', "Cập nhật sản phẩm thành công");
            return Redirect::to("all-product");
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        FacadesSession::put('message', "Cập nhật sản phẩm thành công");
        return Redirect::to("all-product");
    }
    public function delete_product($product_id)
    {
        $this->AuthLogin();
        $delete_product = DB::table("tbl_product")->where('product_id', $product_id)->delete();
        FacadesSession::put('message', "Xóa sản phẩm thành công");
        return Redirect::to("all-product");
    }
    //
}
