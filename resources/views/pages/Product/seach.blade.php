@extends('layout')
@section('content')

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Search Results</h2>
        @foreach($search_product as $key => $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/uploads/product/'.$product->ImageUrl)}}" alt="" />
                            <h2>{{number_format($product->Price).' '.'VND'}}</h2>
                            <p>{{$product->productName}}</p>
                            <a href="{{URL::to('/detail/'.$product->productID)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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

@endsection

