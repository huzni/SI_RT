<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Sistem Informasi RT</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-reset.css') }}
    <!--external css-->
    {{ HTML::style('assets/assets/font-awesome/css/font-awesome.css') }}
    <!-- Custom styles for this template -->
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('assets/css/style-responsive.css') }}

    {{ HTML::style('assets/css/toastr.min.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="lock-screen" onload="startTime()">

    <div class="lock-wrapper">
        <div class="lock-box text-center">
        <img src="{{ URL::asset('assets/img/follower-avatar.jpg') }}" alt="lock avatar"/>
            <h1>SI</h1>
            <span class="locked">Sistem Informasi RT</span>
            {{ Form::open(array('url' => 'login', 'class' => 'form-inline', 'role' => 'form')) }}
                <div class="form-group col-lg-12">
                    <input required type="text" autofocus name="username" placeholder="Username" class="form-control">
                    <br><br>
                    <input required type="password" name="password" placeholder="Password" id="exampleInputPassword2" class="form-control lock-input">
                    <button class="btn btn-lock" type="submit">
                        <i class="icon-arrow-right"></i>
                    </button>
                </div>
            </form>
            {{ Form::close() }}
        </div>
        <!-- <div id="time"></div> -->
    </div>

    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/toastr.min.js') }}

    <script type="text/javascript">
        window.onload = function(){
            @if (Session::has('successMessage'))
                toastr["success"]("{{ Session::get('successMessage') }}", "Success!")
            @elseif (Session::has('errorMessage'))
                toastr["error"]("{{ Session::get('errorMessage') }}", "Error!")
            @endif

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        };
    </script>
</body>

</html>