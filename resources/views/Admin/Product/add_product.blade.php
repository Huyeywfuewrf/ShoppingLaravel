@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create  Product
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
                        <form role="form" action="{{URL::to('/save-product')}}" method="post"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Product</label>
                                <input data type="text"  class="form-control" name="productName" id="exampleInputEmail1" placeholder="Enter Category" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Material</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Material" id="exampleInputPassword1" placeholder="Enter Material"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Size</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="Size" id="exampleInputPassword1" placeholder="Enter Material"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Color</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Color" id="exampleInputPassword1" placeholder="Enter Material"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Price" id="exampleInputPassword1" placeholder="Enter Material"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Designs</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Designs" id="exampleInputPassword1" placeholder="Enter Material"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="Quantity" id="exampleInputPassword1" placeholder="Enter Material"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ImageUrl</label>
                                <input type="file" class="form-control" name="ImageUrl" id="exampleInputEmail1" accept="image/*" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Origin</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Origin" id="exampleInputPassword1" placeholder="Enter Material"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Intro</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Intro" id="ckeditor1" placeholder="Enter Material"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Featured</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Featured" id="ckeditor2" placeholder="Enter Material"> </textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Category</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                        <option value="{{$cate->categoryID}}">{{$cate->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Supplier</label>
                                <select name="product_supplier" class="form-control input-sm m-bot15">
                                    @foreach($supplier_product as $key => $supplier)
                                        <option value="{{$supplier->supplierID}}">{{$supplier->supplierName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Brand</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        <option value="{{$brand->brandID}}">{{$brand->brandName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Status</label>
                                <select name="Status" class="form-control input-sm m-bot15">
                                    <option value="0">Hide</option>
                                    <option value="1">Dísplay</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Add</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
@endsection
