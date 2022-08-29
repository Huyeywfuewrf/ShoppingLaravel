@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->

        @foreach($cate_post_name as $key => $b)
            <h2  class="title text-center">{{$b->post_title}}</h2>
        @endforeach

        <div  class="product-image-wrapper">
            @foreach($post as $key => $p)
                <div class="single-products" style="margin: 10px ;">
                    <div >

{{--                        <img style="float:left; width: 30%; padding: 5px; height: 150px;" src="{{URL::to('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_title}}" />--}}
{{--                        <h4 style="color: #000000;padding: 5px;"><b>{{$p->post_title}}</b></h4>--}}
{{--                        <p >{!!$p->post_desc!!}</p>--}}
                       {!! $p->post_content !!}

                    </div>
{{--                    <div class="text-right"> <a href="{{url('/bai-vie/'.$p->post_id)}}"  class="btn btn-danger btn-sm" >View Post</a></div>--}}
                </div>
                <h2 class="title text-center">Related Posts</h2>
                   <style>
                       ul.post_relate li {
                            list-style-type: disc;
                           font-size: 16px;
                           padding: 6px;
                       }
                       ul.post_relate li a {
                           color: #000000;
                       }
                       ul.post_relate li a:hover {
                           color: #ff0000;
                       }
                   </style>
                <ul class="post_relate">
                    <li>
                        @foreach($related as $key => $r)
                        <a  href="{{url('/bai-viet/'.$r->post_id)}}">{{$r->post_title}}</a>
                        @endforeach
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection

