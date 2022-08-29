@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Customer
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }

                ?>
                <div class="panel-body">
                    @foreach($customer as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-customer/'.$edit_value->customerID)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Customer</label>
                                    <input type="text" value="{{ $edit_value->customerName}}" class="form-control" name="customerName" id="exampleInputEmail1" placeholder="Enter Category">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <textarea style="resize: none" rows="1" class="form-control" name="customerEmail" id="exampleInputPassword1" >{{$edit_value->customerEmail}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" value="{{ $edit_value->customerPassword}}" class="form-control" name="customerPassword" id="exampleInputEmail1" placeholder="Enter Category">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <textarea style="resize: none" rows="1" class="form-control"  name="customerPhone" id="exampleInputPassword1" >{{$edit_value->customerPhone}} </textarea>
                                </div>
                                <button type="submit" name="update_customer" class="btn btn-info">Update</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
@endsection
