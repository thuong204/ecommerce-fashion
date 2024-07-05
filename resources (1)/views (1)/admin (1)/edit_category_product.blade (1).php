@extends('dashboard');
@section('admin_content');
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                <div class="panel-body">
                    @foreach($edit_category_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL:: to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="idcategory_product_name">Tên danh mục</label>
                                <input type="text"  value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="idcategory_product_name">
                            </div>
                            <div class="form-group">
                                <label for="idcategory_product_desc">Mô tả danh mục</label>
                                <textarea style="resize:none" rows="3" name="category_product_desc" class="form-control" id="idcategory_product_desc">{{$edit_value->category_desc}}</textarea>
                            </div>
                            <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                        </form>
                    </div>
                    @endforeach

                </div>
            </section>

        </div>
    </div>
</div>
@endsection