@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->
      @foreach($cate_post_name as $key => $b)
        <h2 class="title text-center">{{$b->cate_post_name}}</h2>
        @endforeach

            <div class="product-image-wrapper">
                @foreach($post as $key => $p)
                <div class="single-products" style="margin: 10px 0;">
                    <div class="text-center">

                            <img style="float:left; width: 30%; padding: 5px; height: 150px;" src="{{URL::to('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_title}}" />
                            <h4 style="color: #000000;padding: 5px;"><b>{{$p->post_title}}</b></h4>
                            <p >{!!$p->post_desc!!}</p>


                    </div>
                    <div class="text-right"> <a href="{{url('/bai-viet/'.$p->post_id)}}"  class="btn btn-danger btn-sm" >View Post</a></div>
                </div>
                <div class="clearfix"></div>
                @endforeach
            </div>
    </div>
@endsection

