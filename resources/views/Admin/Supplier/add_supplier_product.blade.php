@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create Supplier Product
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
                        <form role="form" action="{{URL::to('/save-supplier-product')}}" method="get">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name supplier</label>
                                <input type="text" class="form-control" name="supplierName" id="exampleInputEmail1" placeholder="Enter supplier">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact Title</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="contactTitle" id="exampleInputPassword1" placeholder="Enter Contact Title"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Supplier Address</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="supplierAddress" id="exampleInputPassword1" placeholder="Enter Supplier Address"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Supplier Email</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="supplierEmail" id="exampleInputPassword1" placeholder="Enter Supplier Email"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Supplier Phone</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="supplierPhone" id="exampleInputPassword1" placeholder="Enter Supplier Phone"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Supplier Fax</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="supplierFax" id="exampleInputPassword1" placeholder="Enter Supplier Fax"> </textarea>
                            </div>
                            <button type="submit" name="add_supplier_product" class="btn btn-info">Add supplier</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
@endsection
