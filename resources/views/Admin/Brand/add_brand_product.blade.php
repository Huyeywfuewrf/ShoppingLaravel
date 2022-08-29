@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create Brand Product
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
                        <form role="form" action="{{URL::to('/save-brand-product')}}" method="get">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Brand</label>
                                <input type="text" class="form-control" name="brandName" id="exampleInputEmail1" placeholder="Enter Category">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Brand Description</label>
                                <textarea style="resize: none" rows="5" class="form-control" name="brandDescription" id="exampleInputPassword1" placeholder="Enter brand description"> </textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Display</label>
                                <select name="brandStatus" class="form-control input-sm m-bot15">
                                    <option value="0">Hide</option>
                                    <option value="1">Dísplay</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Add Brand</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
@endsection
