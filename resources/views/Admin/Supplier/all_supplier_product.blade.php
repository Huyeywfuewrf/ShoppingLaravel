@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Supplier Product
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
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        <th>ID</th>
                        <th>Supplier Name</th>
                        <th>Contact Title</th>
                        <th>Supplier Address</th>
                        <th>Supplier Email</th>
                        <th>Supplier Phone</th>
                        <th>Supplier Fax</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_supplier_product as $key => $cate_pro)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{ $cate_pro->supplierID  }} </td>
                            <td>{{ $cate_pro->supplierName }}</td>
                            <td>{{ $cate_pro->contactTitle }}</td>
                            <td>{{ $cate_pro->supplierAddress }}</td>
                            <td>{{ $cate_pro->supplierEmail }}</td>
                            <td>{{ $cate_pro->supplierPhone }}</td>
                            <td>{{ $cate_pro->supplierFax }}</td>
{{--                            <td><span class="text-ellipsis">--}}
{{--                                <?php--}}
{{--                                    if($cate_pro->brandStatus == 1){--}}
{{--                                    ?>--}}
{{--                               <a href="{{URL::to('/unactive-brand-product/'.$cate_pro->brandID) }}"><span class="fa-thumbs-styling fa fa-thumbs-up"></span></a>--}}
{{--                                <?php--}}
{{--                                    }else{--}}
{{--                                    ?>--}}
{{--                                    <a href="{{URL::to('/active-brand-product/'.$cate_pro->brandID) }}"><span class="fa-thumbs-styling fa fa-thumbs-down"></span></a>--}}
{{--                                    <?php--}}
{{--                                    }--}}

{{--                                    ?>--}}

{{--                            </span></td>--}}
                            <td>
                                <a onclick="return confirm('Are you sure to update?')" href="{{URL::to('/edit-supplier-product/'.$cate_pro->supplierID)}}" class="active styling-edit" >
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-supplier-product/'.$cate_pro->supplierID)}}" class="active styling-edit" >
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
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
