@extends('dashboard');
@section('admin_content');
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL:: to('/save-brand-product')}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <?php

                            use Illuminate\Support\Facades\Session;

                            $message=Session::get("message");
                            if($message) {
                                echo " ".$message."";
                                $message=Session::forget("message");
                            }
                            
                            ?>
                            <div class="form-group">
                                <label for="idbrand_product_name">Tên thương hiệu</label>
                                <input type="text" name="brand_product_name" class="form-control" id="idbrand_product_name" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="idbrand_product_desc">Mô tả thương hiệu</label>
                                <textarea style="resize:none" rows="3" name="brand_product_desc" class="form-control" id="idbrand_product_desc" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="idbrand_product_estab">Ngày thành lập</label>
                                <input type="date" name="brand_product_estab" class="form-control" id="idbrand_product_estab" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="brand_product_image">Logo</label>
                                <input type="file" name="brand_product_image" id="brand_product_logo">
                            </div>
                            <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>
@endsection