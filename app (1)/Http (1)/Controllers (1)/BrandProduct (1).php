<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class BrandProduct extends RoutingController
{
    public function add_brand_product(){
        return view('admin.add_brand_product');
    }
    public function save_brand_product(Request $request){
        $data=array();
        $data['brand_name']= $request->input('brand_product_name');
        $data['brand_desc']= $request->input('brand_product_desc');
        $data['brand_establish']= $request->input('brand_product_estab');
        $file= $request->file('brand_product_image');
        if($file){
            $data['brand_logo']= $file->getClientOriginalName();
        }
        // $data['category_product_name']= $request->category_product_name;
        DB::table('tbl_brand')->insert( $data );
        FacadesSession::put('message',"Thêm thương hiệu thành công");
        return Redirect::to("add-brand-product");
    }
    public function all_brand_product(){
        $all_brand_product=DB::table('tbl_brand')->get();
        $manager_brand_product =view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('dashboard')->with('admin.all_brand_product',$manager_brand_product);

    }
    public function edit_brand_product($brand_product_id){
        $edit_brand_product=DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $manager_brand_product =view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('dashboard')->with('admin.edit_category_product',$manager_brand_product);

    }
    public function update_brand_product(Request $request, $brand_product_id){
        $data=array();
        $data['brand_name']= $request->input('brand_product_name');
        $data['brand_desc']= $request->input('brand_product_desc');
        $file= $request->file('brand_product_logo');
        if($file){
            $get_name_logo=$file->getClientOriginalName();
            $name_image=current(explode('.',$get_name_logo));
            $new_image=$name_image.rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move('public/backend/images/logo',$new_image);
            $data['brand_logo']= $new_image;
            DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update( $data );
            FacadesSession::put('message',"Cập nhật thương hiệu sản phẩm thành công");
            return Redirect::to("all-brand-product");
        }
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update( $data );
        FacadesSession::put('message',"Cập nhật thương hiệu sản phẩm thành công");
        return Redirect::to("all-brand-product");
    }
    public function delete_brand_product($brand_product_id){
        $delete_brand_product=DB::table("tbl_brand")->where('brand_id', $brand_product_id)->delete();
        FacadesSession::put('message',"Xóa thương hiệu thành công");
        return Redirect::to("all-brand-product");

}
    //
}
