@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of orders
            </div>
            <div class="row w3-res-tb">



            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>STT</th>
                        <th>Code orders</th>
                        <th>Order date</th>
                        <th>Order status</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($oder as $key => $ord)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td><i>{{$i}}</i></label></td>
                            <td>{{ $ord->order_code }}</td>
                            <td>{{ $ord->created_at }}</td>
                            <td>@if($ord->order_status==1)
                                    New orders
                                @else
                                    Done processing
                                @endif
                            </td>


                            <td>
                                <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-eye text-success text-active"></i></a>

                                <a onclick="return confirm('Are you sure you want to delete this order?')" href="{{URL::to('/delete-order/'.$ord->oder_code)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>

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
                            {{--                            {!!$oder->links()!!}--}}
                        </ul>
                    </div>
                </div>
            </footer>

        </div>
    </div>
@endsection
