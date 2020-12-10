<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.incl_top')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-book"></i> <span>PERPUSTAKAAN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('build/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth()->user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('layouts.sidebar_menu')

            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        @include('layouts/top_navigation')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
         @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        {{-- <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer> --}}
        <!-- /footer content -->
      </div>
    </div>

    @include('layouts.incl_bot')
    @include('sweetalert::alert')
	
  </body>
</html>
