@extends('dashboard');
@section('admin_content');
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <div class="panel-body">
                    @foreach($edit_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-product/'.$edit_value->product_id)}}" method="post"enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input type="text" value="{{$edit_value->product_name}}" name="product_name" class="form-control" id="idproduct_name">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Giá sản phẩm</label>
                                <input type="text" value="{{$edit_value->product_cost}}" name="product_price" class="form-control" id="idproduct_price">
                            </div>
                            <div class="form-group">
                                <label for="product_image">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" id="idproduct_img" class="form-control">
                                <img src="{{URL::to('public/backend/images/products/' . $edit_value->product_image) }}" style="width:100px;height:100px;" alt="">
                            </div>
                            <div class="form-group">
                                <label for="product_size">Size</label>
                                <input type="text" value="{{$edit_value->product_size}}" name="product_size" class="form-control" id="idproduct_size">
                            </div>
                            <div class="form-group">
                                <label for="product_desc">Mô tả sản phẩm</label>
                                <textarea style="resize:none" rows="2" name="product_desc" class="form-control" id="idproduct_desc">{{$edit_value->product_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_content">Nội dung sản phẩm</label>
                                <textarea style="resize:none" rows="5" name="product_content" class="form-control" id="idproduct_content">{{$edit_value->product_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_category">Danh mục sản phẩm</label>
                                <select name="product_category" class="form-control">
                                    @foreach($all_category_product as $key => $cate_product)
                                        @if($cate_product->category_id==$edit_value->category_id)
                                        <option selected value="{{$cate_product->category_id}}">{{$cate_product->category_name}}</option>
                                        @else
                                        <option value="{{$cate_product->category_id}}">{{$cate_product->category_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_brand">Thương hiệu</label>
                                <select name="product_brand" class="form-control">
                                    @foreach($all_brand_product as $key => $brand_product)
                                        @if($brand_product->brand_id==$edit_value->brand_id)
                                        <option selected value="{{$brand_product->brand_id}}">{{$brand_product->brand_name}}</option>
                                        @else
                                        <option value="{{$brand_product->brand_id}}">{{$brand_product->brand_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_amount">Số lượng sản phẩm</label>
                                <input type="text" value="{{$edit_value->product_amount}}" name="product_amount" class="form-control" id="idproduct_amount">
                            </div>
                            <button type="submit" name="update_product" class="btn btn-info">Cập nhật danh mục</button>
                        </form>
                    </div>
                    @endforeach

                </div>
            </section>

        </div>
    </div>
</div>
@endsection