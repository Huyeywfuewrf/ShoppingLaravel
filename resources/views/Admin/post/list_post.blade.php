@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List  Product
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }

                ?>
                <table class="table table-striped b-t b-light  " >
                    <thead >
                    <tr >
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        <th>Post Title</th>
                        <th>Image</th>
                        <th>Slug</th>
                        <th>Post description</th>
                        <th>Article keywords</th>
                        <th>Article Category</th>
                        <th>Status</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($all_post as $key => $post)
                        <tr >
                            <td>
                                <a onclick="return confirm('Are you sure to update?')" href="{{URL::to('/edit-post/'.$post->post_id)}}" class="active styling-edit" >
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-post/'.$post->post_id)}}" class="active styling-edit" >
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                            <td>{{ $post->post_title }}</td>
                            <td><img src="public/uploads/post/{{ $post->post_image }}" height="100" width="100" > </td>
                            <td>{{ $post->post_slug }}</td>
                            <td>{!! $post->post_desc !!}</td>
                            <td>{{ $post->post_meta_keyword }}</td>
                            <td>{{ $post->cate_post_id }}</td>
                            <td>
                                @if($post->post_status == 1)
                                    <span class="label label-success">Display</span>
                                @else
                                    <span class="label label-danger">Hile</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {!! $all_post->links() !!}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
