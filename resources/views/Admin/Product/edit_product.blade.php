@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update  Product
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
                        @foreach($edit_product as $key => $pro)
                        <form role="form" action="{{URL::to('/update-product/'.$pro->productID)}}" method="post"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Product</label>
                                <input type="text" class="form-control" name="productName" id="exampleInputEmail1" placeholder="Enter Category" value="{{$pro->productName}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Material</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Material" id="exampleInputPassword1" placeholder="Enter Material" >{{$pro->Material}}  </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Size</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="Size" id="exampleInputPassword1" placeholder="Enter Material">{{$pro->Size}}   </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Color</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="Color" id="exampleInputPassword1" placeholder="Enter Material">{{$pro->Color}}   </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="Price" id="exampleInputPassword1" placeholder="Enter Material">{{$pro->Price}}   </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Designs</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Designs" id="exampleInputPassword1" placeholder="Enter Material">{{$pro->Designs}}   </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="Quantity" id="exampleInputPassword1" placeholder="Enter Material">{{$pro->Quantity}}   </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ImageUrl</label>
                                <input type="file" class="form-control" name="ImageUrl" id="exampleInputEmail1" accept="image/*" >
                                <img src="{{URL::to('public/uploads/product/'.$pro->ImageUrl)}}" width="100px" height="100px">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Origin</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Origin" id="exampleInputPassword1" placeholder="Enter Material">{{$pro->Origin}}   </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Intro</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Intro" id="exampleInputPassword1" placeholder="Enter Material">{{$pro->Intro}}   </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Featured</label>
                                <textarea style="resize: none" rows="3" class="form-control" name="Featured" id="exampleInputPassword1" placeholder="Enter Material">{{$pro->Featured}}   </textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Category</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                        @if($cate->categoryID == $pro->categoryID)
                                            <option selected value="{{$cate->categoryID}}">{{$cate->categoryName}}</option>
                                        @else
                                            <option value="{{$cate->categoryID}}">{{$cate->categoryName}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Supplier</label>
                                <select name="product_supplier" class="form-control input-sm m-bot15">
                                    @foreach($supplier_product as $key => $supplier)
                                        @if($supplier->supplierID == $pro->supplierID)
                                            <option selected value="{{$supplier->supplierID}}">{{$supplier->supplierName}}</option>
                                        @else
                                            <option value="{{$supplier->supplierID}}">{{$supplier->supplierName}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Brand</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        @if($brand->brandID == $pro->brandID)
                                            <option selected value="{{$brand->brandID}}">{{$brand->brandName}}</option>
                                        @else
                                        <option value="{{$brand->brandID}}">{{$brand->brandName}}</option>
                                        @endif
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
                            <button type="submit" name="update_product" class="btn btn-info">Update</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>
        </div>
@endsection
