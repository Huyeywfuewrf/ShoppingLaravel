@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Category Product
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }

                ?>
                <div class="panel-body">
                   @foreach($edit_category_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->categoryID)}}" method="get">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Category</label>
                                <input type="text" value="{{ $edit_value->categoryName}}" class="form-control" name="categoryName" id="exampleInputEmail1" placeholder="Enter Category">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category description</label>
                                <textarea style="resize: none" rows="5" class="form-control" name="categoryDescription" id="exampleInputPassword1" >{{ $edit_value->categoryDescription}} </textarea>
                            </div>
                            <button type="submit" name="update_category_product" class="btn btn-info">Update</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
@endsection
