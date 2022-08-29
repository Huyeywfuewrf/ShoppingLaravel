
<!DOCTYPE html>
<head>
    <title> Register Auth </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('public/Backend/css/bootstrap.min.css')}}" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('public/Backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/Backend/css/style-responsive.css')}}" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('public/Backend/css/font.css')}}" type="text/css"/>
    <link href="{{asset('public/Backend/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="{{asset('public/Backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
    <div class="w3layouts-main">
        <h2>Sign up Now</h2>
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }

        ?>
        <form action="{{URL::to('/register')}}" method="post">
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{csrf_field()}}
            <input type="text" class="ggg" name="admin_name" value="{{old('admin_name')}}" placeholder="Name" required="">
                    <input type="text" class="ggg" name="admin_email" placeholder="Enter email" required="">
                    <input type="password" class="ggg" name="admin_password" placeholder="Enter password" required="">
            <input type="text" class="ggg" name="Phone" value="{{old('Phone')}}" placeholder="Enter phone" required="">
            <span><input type="checkbox" />Remember Me</span>
            <h6><a href="#">Forgot Password?</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Sign up" name="login">
        </form>
        <a href="{{url('/register-auth')}}">Sign up for Auth | </a>
        <a href="{{url('/login-auth')}}">Sign in for Auth</a>
    </div>
</div>
<script src="{{asset('public/Backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/Backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/Backend/js/scripts.js')}}"></script>
<script src="{{asset('public/Backend/js/jquery.slimscroll.js')}}"></script>
<script src="j{{asset('public/Backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('public/Backend/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('public/Backend/js/jquery.scrollTo.js')}}"></script>
</body>

</html>

