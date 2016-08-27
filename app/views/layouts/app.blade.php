<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Informasi RT - @yield('title')</title>
  <!-- Bootstrap core CSS -->
  {{ HTML::style('assets/css/bootstrap.min.css') }}
  {{ HTML::style('assets/css/bootstrap-reset.css') }}

  <!--external css-->
  {{ HTML::style('assets/assets/font-awesome/css/font-awesome.css') }}
  {{ HTML::style('assets/assets/data-tables/DT_bootstrap.css') }}

  <!-- Custom styles for this template -->
  {{ HTML::style('assets/css/style.css') }}
  {{ HTML::style('assets/css/style-responsive.css') }}

  {{ HTML::style('assets/css/toastr.min.css') }}

  @yield('head')

</head>
<body>

  <section id="container" class="">
    <!--header start-->
    <header class="header white-bg">
      <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
      </div>
      <!--logo start-->
      <a href="{{ route('admin.dashboard') }}" class="logo" ><span>SISTEM INFORMASI RT 24 MRICAN</span></a>
      <!--logo end-->

      <div class="top-nav ">
        <ul class="nav pull-right top-menu">
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">                       
              <i class="icon-user"></i> 
              <span class="username">Admin</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <li>
                <a data-toggle="modal" href="#modalUser" >
                  <i class="icon-user"></i> 
                  Edit User
                </a>
              </li>

              <li><a href="{{ route('auth.logout') }}"><i class="icon-off"></i> Log Out</a></li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
      </div>
    </header>
    <!--header end-->

    @yield('sidebar')

    @yield('content')


    <footer class="site-footer">
      <div class="text-center">
        2015 &copy; 
        <a href="#" class="go-top">
          <i class="icon-angle-up"></i>
        </a>
      </div>
    </footer>
    <!--footer end-->
  </section>

  <!-- js placed at the end of the document so the pages load faster -->
  {{ HTML::script('assets/js/jquery-1.8.3.min.js') }}
  {{ HTML::script('assets/js/bootstrap.min.js') }}
  {{ HTML::script('assets/js/jquery.dcjqaccordion.2.7.js') }}

  {{ HTML::script('assets/js/jquery.scrollTo.min.js') }}
  {{ HTML::script('assets/js/jquery.nicescroll.js') }}
  {{ HTML::script('assets/assets/data-tables/jquery.dataTables.js') }}
  {{ HTML::script('assets/assets/data-tables/DT_bootstrap.js') }}
  {{ HTML::script('assets/js/respond.min.js') }}


  <!--common script for all pages-->
  {{ HTML::script('assets/js/common-scripts.js') }}

  <!--script for this page only-->
  {{ HTML::script('assets/js/editable-table.js') }}
  {{ HTML::script('assets/js/bootbox.min.js') }}

  {{ HTML::script('assets/js/toastr.min.js') }}

  <!-- END JAVASCRIPTS -->
  <script>
    jQuery(document).ready(function() {
      EditableTable.init();
    });

    window.onload = function(){
        @if (Session::has('successMessage'))
            toastr["success"]("{{ Session::get('successMessage') }}", "Success!")
        @elseif (Session::has('infoMessage'))
            toastr["info"]("{{ Session::get('infoMessage') }}", "Information!")
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

    function pesanTunggu() {
        toastr.options.timeOut = 0;
        toastr.options.extendedTimeOut = 0;
        toastr.info('<i class="fa fa-spinner fa-spin"></i><br>Sedang Memproses..');
        toastr.options.timeOut = 5000;
        toastr.options.extendedTimeOut = 1000;
    }

  </script>

  @yield('js')

</body>
</html>
