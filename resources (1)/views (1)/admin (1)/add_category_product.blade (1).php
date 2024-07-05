@extends('dashboard');
@section('admin_content');
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL:: to('/save-category-product')}}" method="post"  enctype="multipart/form-data">
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
                                <label for="category_product_name">Tên danh mục</label>
                                <input type="text" name="category_product_name" class="form-control" id="idcategory_product_name" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="category_product_desc">Mô tả danh mục</label>
                                <textarea style="resize:none" rows="3" name="category_product_desc" class="form-control" id="idcategory_product_desc" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>
@endsection