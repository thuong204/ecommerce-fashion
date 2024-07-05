@extends('dashboard');
@section('admin_content');
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Sản phẩm
        </div>

        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Search</button>
                    </span>
                </div>
            </div>
        </div>

        <?php
                use Illuminate\Support\Facades\Session;

                $message = Session::get("message");
                if ($message) {
                    echo "<span style= 'color:red'> " . $message . "</span>";
                    $message = Session::forget("message");
                }

                ?>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Size</th>
                        <th>Mô tả</th>
                        <th>Nội dung</th>
                        <th>Số lượng</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $key => $product)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$product->product_name}}</td>
                        <td> <?php echo('$') ?>{{$product->product_cost}}</td>
                        <td> <img src="{{ asset('public/backend/images/products/' . $product->product_image) }} " style="width:100px;" alt=""></td>
                        <td>{{$product->product_cost}}</td>
                        <td>
                            <span class="text-ellipsis">
                                {{$product->product_desc}}
                            </span>
                        </td>
                        <td>
                            <span class="text-ellipsis">
                                {{$product->product_content}}
                            </span>
                        </td>
                        <td>{{$product->product_amount}}</td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->brand_name}}</td>
                        <td>
                            <a href="{{URL::to('/edit-product/'.$product->product_id)}}" class="active styling-edit"><i class="fa fa-pencil square-o text-succes text-active"></i></a>
                            <a href="{{URL::to('/delete-product/'.$product->product_id)}}" class="active styling-edit"  onclick="return confirm('Bạn có chắc xóa sản phẩm này không?')"><i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    {{ $all_product->links() }}
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

</div>
@endsection