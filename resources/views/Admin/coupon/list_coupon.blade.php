@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Brand Product
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
                        <th>Coupon Name</th>
                        <th>Coupon Code</th>
                        <th>Coupon Time</th>
                        <th>Coupon Condition</th>
                        <th>Coupon Number</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coupon as $key => $cou)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{ $cou->couponName }}</td>
                            <td>{{ $cou->couponCode }}</td>
                            <td>{{ $cou->couponTime }}</td>
                            <td><span class="text-ellipsis">
                                <?php
                                    if( $cou->couponCondition == 1){
                                    ?>
                                     Discount follow %
                                <?php
                                    }else{
                                    ?>
                                      Discount by money
                                    <?php
                                    }

                                    ?>

                            </span>
                            </td>
                            <td>
                                <span class="text-ellipsis">
                                <?php
                                if( $cou->couponCondition == 1){
                                ?>
                                     Discount {{$cou->couponNumber}} %
                                <?php
                                }else{
                                ?>
                                        Discount {{$cou->couponNumber}} VND
                                    <?php
                                }

                                ?>

                            </span></td>
                            <td>
                                <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-coupon/'.$cou->couponID)}}" class="active styling-edit" >
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
