@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List  Product
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }

                ?>
                <table class="table table-striped b-t b-light  " >
                    <thead >
                    <tr >
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        <th>Status</th>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Material</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Designs</th>
                        <th>Quantity</th>
                        <th>ImageUrl</th>
                        <th>Intro</th>
                        <th>Origin</th>
                        <th>Featured</th>
                        <th>Supplier</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($all_product as $key => $pro)
                        <tr >
                            <td>
                                <a onclick="return confirm('Are you sure to update?')" href="{{URL::to('/edit-product/'.$pro->productID)}}" class="active styling-edit" >
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-product/'.$pro->productID)}}" class="active styling-edit" >
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                            <td><span class="text-ellipsis">
                                <?php
                                    if($pro->Status == 1){
                                    ?>
                               <a href="{{URL::to('/unactive-product/'.$pro->productID) }}"><span class="fa-thumbs-styling fa fa-thumbs-up"></span></a>
                                <?php
                                    }else{
                                    ?>
                                    <a href="{{URL::to('/active-product/'.$pro->productID) }}"><span class="fa-thumbs-styling fa fa-thumbs-down"></span></a>
                                    <?php
                                    }

                                    ?>

                            </span></td>
                            <td>{{ $pro->productID }}</td>
                            <td>{{ $pro->productName }}</td>
                            <td>{{ $pro->Material }}</td>
                            <td>{{ $pro->Size }}</td>
                            <td>{{ $pro->Color }}</td>
                            <td>{{ $pro->Price }}</td>
                            <td>{{ $pro->Designs }}</td>
                            <td>{{ $pro->Quantity }}</td>
                            <td><img src="public/uploads/product/{{ $pro->ImageUrl }}" height="100" width="100" > </td>
                            <td>{{ $pro->Intro }}</td>
                            <td>{{ $pro->Origin }}</td>
                            <td>{{ $pro->Featured }}</td>
                            <td>{{ $pro->supplierName }}</td>
                            <td>{{ $pro->categoryName }}</td>
                            <td>{{ $pro->brandName  }}</td>
                        </tr>
                    @endforeach
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
                           {!! $all_product->links() !!}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
