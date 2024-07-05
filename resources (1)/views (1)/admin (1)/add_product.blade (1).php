@extends('dashboard');
@section('admin_content');
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL:: to('/save-product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <?php

                            use Illuminate\Support\Facades\Session;

                            $message = Session::get("message");
                            if ($message) {
                                echo " " . $message . "";
                                $message = Session::forget("message");
                            }

                            ?>
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="idproduct_name">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Giá sản phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="idproduct_price">
                            </div>
                            <div class="form-group">
                                <label for="product_image">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" id="idproduct_img">
                            </div>
                            <div class="form-group">
                                <label for="product_size">Size</label>
                                <input type="text" name="product_size" class="form-control" id="idproduct_size">
                            </div>
                            <div class="form-group">
                                <label for="product_type">Product Type</label>
                                <input type="text" name="product_type" class="form-control" id="idproduct_type">
                            </div>
                            <div class="form-group">
                                <label for="product_desc">Mô tả sản phẩm</label>
                                <textarea style="resize:none" rows="4" name="product_desc" class="form-control" id="idproduct_desc"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_content">Nội dung sản phẩm</label>
                                <textarea style="resize:none" rows="6" name="product_content" class="form-control" id="idproduct_content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_category">Danh mục sản phẩm</label>
                                <select name="product_category" class="form-control">
                                    @foreach($all_category_product as $key => $cate_product)
                                    <option value="{{$cate_product->category_id}}">{{$cate_product->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_brand">Thương hiệu</label>
                                <select name="product_brand" class="form-control">
                                    @foreach($all_brand_product as $key => $brand_product)
                                    <option value="{{$brand_product->brand_id}}">{{$brand_product->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_amount">Số lượng sản phẩm</label>
                                <input type="text" name="product_amount" class="form-control" id="idproduct_amount">
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>
@endsection