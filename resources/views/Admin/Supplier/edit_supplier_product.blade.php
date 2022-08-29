@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Supplier Product
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }

                ?>
                <div class="panel-body">
                    @foreach($edit_supplier_product as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-supplier-product/'.$edit_value->supplierID)}}" method="get">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Supplier</label>
                                    <input type="text" value="{{ $edit_value->supplierName}}" class="form-control" name="supplierName" id="exampleInputEmail1" placeholder="Enter supplier Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact Title</label>
                                    <textarea style="resize: none" rows="1" class="form-control" name="contactTitle" id="exampleInputPassword1" >{{ $edit_value->contactTitle}} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Supplier Address</label>
                                    <textarea style="resize: none" rows="1" class="form-control" name="supplierAddress" id="exampleInputPassword1"
                                              placeholder="Enter Supplier Address">{{ $edit_value->supplierAddress}}  </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Supplier Email</label>
                                    <textarea style="resize: none" rows="1" class="form-control" name="supplierEmail" id="exampleInputPassword1"
                                              placeholder="Enter Supplier Email">{{ $edit_value->supplierEmail}}  </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Supplier Phone</label>
                                    <textarea style="resize: none" rows="1" class="form-control" name="supplierPhone" id="exampleInputPassword1"
                                              placeholder="Enter Supplier Phone">{{ $edit_value->supplierPhone}}  </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Supplier Fax</label>
                                    <textarea style="resize: none" rows="1" class="form-control" name="supplierFax" id="exampleInputPassword1"
                                              placeholder="Enter Supplier Fax">{{ $edit_value->supplierFax}}  </textarea>
                                </div>
                                <button type="submit" name="update_supplier_product" class="btn btn-info">Update</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
@endsection
