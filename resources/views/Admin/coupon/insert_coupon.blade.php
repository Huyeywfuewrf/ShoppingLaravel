@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create Discount Product
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }

                ?>
                <div class="panel-body">

                    <div class="position-center">
                        @if (count($errors) > 0)
                            <div class = "alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="get">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Discount</label>
                                <input type="text" class="form-control" name="couponName" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Discount code</label>
                                <input type="text" class="form-control" name="couponCode" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity Discount</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="couponTime" id="exampleInputPassword1" > </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Features Of The Discount Code</label>
                                <select name="couponCondition" class="form-control input-sm m-bot15">
                                    <option value="0">--------Choose-------</option>
                                    <option value="1">Percentage Discount</option>
                                    <option value="2">Discount By Money</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Enter Percentage Or Discount</label>
                                <input type="text" class="form-control" name="couponNumber" id="exampleInputEmail1" >
                            </div>
                            <button type="submit" name="add_coupon" class="btn btn-info">Add Code</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
@endsection
