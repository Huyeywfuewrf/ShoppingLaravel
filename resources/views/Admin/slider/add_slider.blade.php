@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Slider
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
                    <form role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name slide</label>
                            <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Slide">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Describe slider</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="slider_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Display</label>
                            <select name="slider_status" class="form-control input-sm m-bot15">
                                <option value="0">Display</option>
                                <option value="1">Hile</option>

                            </select>
                        </div>

                        <button type="submit" name="add_slider" class="btn btn-info">Add slider</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection
