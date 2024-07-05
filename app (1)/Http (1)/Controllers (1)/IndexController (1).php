<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\DB;

class IndexController extends RoutingController
{
    public function all_product()
    {
        $all_product_top = DB::table('tbl_product')->where('product_type', 'Top')
            ->join('category_product', 'category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();
        $all_product_new = DB::table('tbl_product')->where('product_type', 'New')
            ->join('category_product', 'category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();
        return view('trangchu/index')->with('all_product_top', $all_product_top)->with('all_product_new', $all_product_new);
    }
    public function product($product_id)
    {
        $one_product = DB::table('tbl_product')->where('product_id', $product_id)
            ->join('category_product', 'category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();
        $all_product_top = DB::table('tbl_product')->where('product_type', 'Top')
            ->join('category_product', 'category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();
        $all_product_new = DB::table('tbl_product')->where('product_type', 'New')
            ->join('category_product', 'category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();
        $all_product_related = DB::table('tbl_product')->where('product_name', 'New')
            ->join('category_product', 'category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();
        return view('trangchu/product')->with('one_product', $one_product)->with('all_product_top', $all_product_top)->with('all_product_new', $all_product_new);
    }
    public function product_type($product_type_name)
    {
        $all_product_type_new = DB::table('tbl_product')
            ->join('category_product', 'category_product.category_id', '=', 'tbl_product.category_id')->where('category_name','like', '%' . $product_type_name . '%')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();
            $all_product_type_top = DB::table('tbl_product')
            ->join('category_product', 'category_product.category_id', '=', 'tbl_product.category_id')->where('category_name','like', '%' . $product_type_name . '%')
            ->orderBy('tbl_product.product_id', 'desc')
            ->get();

        return    view('trangchu/product_type')->with('all_product_type_new', $all_product_type_new)->with('all_product_type_top', $all_product_type_top);
    }
}
