@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Brand Product
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }

                ?>
                <div class="panel-body">
                    @foreach($edit_brand_product as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brandID)}}" method="get">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Brand</label>
                                    <input type="text" value="{{ $edit_value->brandName}}" class="form-control" name="brandName" id="exampleInputEmail1" placeholder="Enter brand Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Brand description</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="brandDescription" id="exampleInputPassword1" >{{ $edit_value->brandDescription}} </textarea>
                                </div>
                                <button type="submit" name="update_brand_product" class="btn btn-info">Update</button>
                            </form>
                        </div>
                    @endforeach

{{--                                            <div class="position-center">--}}
{{--                                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand_product->brandID)}}" method="get">--}}
{{--                                                    {{csrf_field()}}--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="exampleInputEmail1">Name Brand</label>--}}
{{--                                                        <input type="text" value="{{ $edit_brand_product->brandName}}" class="form-control" name="brandName" id="exampleInputEmail1" placeholder="Enter brand Name">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="exampleInputPassword1">Brand description</label>--}}
{{--                                                        <textarea style="resize: none" rows="5" class="form-control" name="brandDescription" id="exampleInputPassword1" >{{ $edit_brand_product->brandDescription}} </textarea>--}}
{{--                                                    </div>--}}
{{--                                                    <button type="submit" name="update_brand_product" class="btn btn-info">Update</button>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
                </div>
            </section>
        </div>
@endsection
