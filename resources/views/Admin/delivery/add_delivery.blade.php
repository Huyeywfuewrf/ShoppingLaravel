@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create  transfer
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
                        <form >
                            @csrf
                            <div class="form-group">
{{--                                @if (count($errors) > 0)--}}
{{--                                    <div class = "alert alert-danger">--}}
{{--                                        <ul>--}}
{{--                                            @foreach ($errors->all() as $error)--}}
{{--                                                <li>{{ $error }}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <label for="inputSuccess">Choose The City</label>
                                <select id="city"  name="city" class="form-control input-sm m-bot15 choose city">
                                    <option value="">--------Select City-------</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label  for="inputSuccess">Choose The District</label>
                                <select id="province" name="provice" class="form-control input-sm m-bot15 province choose ">
                                    <option value="">--------Select District-------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess">Choose The Wards</label>
                                <select id="wards" name="wards" class="form-control input-sm m-bot15  wards">
                                    <option value="">--------Select Wards-------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fee Ship</label>
                                <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <button type="button" name="add_delivery" class="btn btn-info add_delivery">Add delivery</button>
                        </form>
                    </div>
                    <br>
                    <div id="load_delivery">

                    </div>
                </div>
            </section>
        </div>
@endsection
