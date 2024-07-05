@extends('dashboard');
@section('admin_content');
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    @foreach($edit_brand_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL:: to('/update-brand-product/'.$edit_value->brand_id)}}" method="post"enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="idbrand_product_name">Tên thương hiệu</label>
                                <input type="text"  value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="idbrand_product_name">
                            </div>
                            <div class="form-group">
                                <label for="idbrand_product_desc">Mô tả thương hiệu</label>
                                <textarea style="resize:none" rows="3" name="brand_product_desc" class="form-control" id="idbrand_product_desc">{{$edit_value->brand_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="brand_product_image">Logo</label>
                                <input type="file" name="brand_product_logo" id="idcategory_product_img">
                                <img src="{{URL::to('public/backend/images/logo/'.$edit_value->brand_logo)}}" style="width:100px;height:100px;" alt="">
                            </div>
                            <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu</button>
                        </form>
                    </div>
                    @endforeach

                </div>
            </section>

        </div>
    </div>
</div>
@endsection