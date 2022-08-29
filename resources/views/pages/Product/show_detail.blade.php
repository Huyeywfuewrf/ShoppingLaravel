@extends('layout')
@section('content')
@foreach($detail_product as $key =>$value)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('public/uploads/product/'.$value->ImageUrl)}}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <a href=""><img src="{{URL::to('public/Fontend/images/similar1.jpg')}}" alt=""></a>
                    <a href=""><img src="{{URL::to('public/Fontend/images/similar2.jpg')}}" alt=""></a>
                    <a href=""><img src="{{URL::to('public/Fontend/images/similar3.jpg')}}" alt=""></a>
                </div>
            </div>

            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->productName}}</h2>
            <h2> ID: {{$value->productID}}</h2>
            <img src="images/product-details/rating.png" alt="" />
{{--          <form action="{{URL::to('/save-cart')}}" method ="post">--}}
{{--                      {{csrf_field()}}--}}
{{--                    <span>--}}
{{--                    <span>{{number_format($value->Price).'VND'}}</span>--}}
{{--                    <label>Quantity:</label>--}}
{{--                          <br>--}}
{{--                    <input name="qty" type="number" min="1" value="3" />--}}
{{--                     <input type="hidden" name="product_hidden" value="{{$value->productID}}" />--}}
{{--                    <button type="submit" class="btn btn-fefault cart">--}}
{{--                    <i class="fa fa-shopping-cart"></i>--}}
{{--                        Add to cart--}}
{{--                    </button>--}}
{{--			</span>--}}
{{--           </form>--}}
            <form action="{{URL::to('/save-cart')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$value->productID}}" class="cart_product_id_{{$value->productID}}">

                <input type="hidden" value="{{$value->productName}}" class="cart_product_name_{{$value->productID}}">

                <input type="hidden" value="{{$value->ImageUrl}}" class="cart_product_image_{{$value->productID}}">

                <input type="hidden" value="{{$value->Quantity}}" class="cart_product_quantity_{{$value->productID}}">

                <input type="hidden" value="{{$value->Price}}" class="cart_product_price_{{$value->productID}}">

                <span>
									<span>{{number_format($value->Price,0,',','.').'VNĐ'}}</span>

									<label>Quantity:</label>
									<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->productID}}"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$value->productID}}" />
								</span>
                <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$value->productID}}" name="add-to-cart">Add to cart</button>
            </form>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Color:</b> {{$value->Color}}</p>
            <p><b>Size:</b> {{$value->Size}}</p>
            <p><b>Origin:</b> {{$value->Origin}}</p>
            <p><b>Total goods in stock:</b> {{$value->Quantity}}</p>
            <p><b>Brand:</b> {{$value->brandName}}</p>
            <p><b>Category:</b> {{$value->categoryName}}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Product Description</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Product details</a></li>
            <li ><a href="#reviews" data-toggle="tab">Reviews</a></li>
            <li ><a href="#reviews" data-toggle="tab">Comment Facebook</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
             <p><b>Introduction:</b> {!! $value->Intro !!}</p>
             <p><b>Featured:</b> {!! $value->Featured !!}</p>
        </div>

        <div class="tab-pane fade" id="companyprofile" >
            <p><b>Color:</b> {{$value->Color}}</p>
            <p><b>Price:</b>{{number_format($value->Price).'VND'}} </p>
            <p><b>Size:</b> {{$value->Size}}</p>
            <p><b>Origin:</b> {{$value->Origin}}</p>
            <p><b>Total goods in stock:</b> {{$value->Quantity}}</p>
            <p><b>Brand:</b> {{$value->brandName}}</p>
            <p><b>Category:</b> {{$value->categoryName}}</p>
        </div>
        <div class="tab-pane fade " id="reviews" >
            <div class="col-sm-12">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=351796620476464&autoLogAppEvents=1" nonce="DK7FT6Jj"></script>
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="100"></div>
            </div>
        </div>

    </div>
</div><!--/category-tab-->
@endforeach
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Recommended products</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($relate as $key => $value)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/uploads/product/'.$value->ImageUrl)}}" alt="" />
                                <h2>{{number_format($value->Price).' '.'VND'}}</h2>
                                <p>{{$value->productName}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->
@endsection
