@extends('layout')
@section('content')

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Latest product</h2>
    <div class="row">
        <div class="col-md-4">
            <label for="amount">Sort by selection</label>
            <form>
                @csrf
                <select name="sort" id="sort" class="form-control">
                    <option value="{{Request::url()}}?sort_by=none">Default</option>
                    <option value="{{Request::url()}}?sort_by=tang_dan">Sort by ascending price</option>
                    <option value="{{Request::url()}}?sort_by=giam_dan">Sort by price descending</option>
                    <option value="{{Request::url()}}?sort_by=kytu_az">Filter products by name from A to Z</option>
                    <option value="{{Request::url()}}?sort_by=kytu_za">Filter products by name from Z to A</option>
                </select>
            </form>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="amount">Filter prices by</label>
                <form>
                    <div id="slider-range"></div>
                    <input type="text" id="amount" readonly style="border:0; color:#985f0d; font-weight:bold;">
                    <input type="hidden" name="start_price" id="start_price">
                    <input type="hidden" name="end_price" id="end_price" >
                    <br>
                    <input type="submit" class="btn btn-sm btn-default" name="Filter_price" value="Filter prices by">
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    @foreach($all_product as $key => $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        @csrf
                        <input type="hidden"  class="cart_product_id_{{$product->productID}}" value="{{$product->productID}}">
                        <input type="hidden"  class="cart_product_name_{{$product->productID}}" value="{{$product->productName}}">

                        <input type="hidden" value="{{$product->Quantity}}" class="cart_product_quantity_{{$product->productID}}">

                        <input type="hidden"  class="cart_product_image_{{$product->productID}}" value="{{$product->ImageUrl}}">
                        <input type="hidden"  class="cart_product_price_{{$product->productID}}" value="{{$product->Price}}">
                        <input type="hidden"  class="cart_product_qty_{{$product->productID}}" value="1">
                    <img src="{{URL::to('public/uploads/product/'.$product->ImageUrl)}}" alt="" />
                    <h2>{{number_format($product->Price).' '.'VND'}}</h2>
                    <p>{{$product->productName}}</p>
{{--                    <a href="{{URL::to('/detail/'.$product->productID)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                      <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->productID}}" name="add-to-cart">Add to cart</button>
                    </form>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Favourite</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Compare</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div><!--features_items-->
<div class="col-sm-7 text-right text-center-xs">
<ul class="pagination pagination-sm m-t-none m-b-none">
    {!!$all_product->links()!!}
</ul>
</div>

@endsection
