@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Category Post
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
                        <form role="form" action="{{URL::to('/update-category-post/'.$category_post->cate_post_id)}}" method="get">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Category Post</label>
                                <input type="text" class="form-control" onkeyup="ChangeToSlug();" name="cate_post_name" id="slug" value="{{$category_post->cate_post_name}}" placeholder="Enter Category">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category Post Description</label>
                                <textarea style="resize: none" rows="5" class="form-control" name="cate_post_desc" id="exampleInputPassword1" value="{{$category_post->cate_post_desc}}" placeholder="Enter brand description">
                                   {{$category_post->cate_post_desc}}
                                </textarea>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Category Post Slug</label>--}}
{{--                                <textarea style="resize: none" rows="5" id="convert_slug" class="form-control" name="cate_post_slug"  placeholder="Slug"> {{$category_post->cate_post_slug}}</textarea>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Display</label>
                                <select name="cate_post_status" class="form-control input-sm m-bot15">
                                    @if($category_post->cate_post_status == 0)
                                    <option selected value="0">Hide</option>
                                    <option value="1">Display</option>
                                    @else
                                    <option value="1">Display</option>
                                    <option selected value="0">Hide</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" name="update_category_post" class="btn btn-info">Update Post Category</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
@endsection
