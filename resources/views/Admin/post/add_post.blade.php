@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add  Post
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
                        <form role="form" action="{{URL::to('/save-post')}}" method="post"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name  Post</label>
                                <input value="{{old('post_title')}}" type="text" class="form-control"  onkeyup="ChangeToSlug();" name="post_title" id="slug" placeholder="Enter Category">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1"> Post Slug</label>--}}
{{--                                <textarea style="resize: none" rows="1" id="convert_slug" class="form-control" name="post_slug"  placeholder="Enter brand description"> </textarea>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Article Summary</label>
                                <textarea style="resize: none" rows="3" id="ckeditor1" class="form-control" name="post_desc"  placeholder="Enter brand description"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Article Content</label>
                                <textarea style="resize: none" rows="3" id="ckeditor2" class="form-control" name="post_content"  placeholder="Enter brand description"> </textarea>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Meta Key word</label>--}}
{{--                                <textarea style="resize: none" rows="1" id="exampleInputPassword1" class="form-control" name="post_meta_keyword"  placeholder="Enter brand description"> </textarea>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Meta Content</label>--}}
{{--                                <textarea style="resize: none" rows="1" id="exampleInputPassword1" class="form-control" name="post_meta_desc"  placeholder="Enter brand description"> </textarea>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Post</label>
                                <input type="file" class="form-control" name="post_image" id="exampleInputEmail1" accept="image/*" >
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Category Post</label>
                                <select name="cate_post_id" class="form-control input-sm m-bot15">
                                    @foreach($cate_post as $key => $cate_post)
                                        <option value="{{$cate_post->cate_post_id}}">{{$cate_post->cate_post_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Display</label>
                                <select name="post_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hide</option>
                                    <option value="1">Display</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Add Post</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
@endsection
