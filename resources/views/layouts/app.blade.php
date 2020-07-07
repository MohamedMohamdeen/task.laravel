<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('css/fontastic.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
     <!-- Summernote CSS-->
    <link rel="stylesheet" href="{{asset('vendor/summernote/summernote-bs4.css')}}">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
   
    <!-- DataTables CSS-->
    <link rel="stylesheet" href="{{asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">

    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.default.premium.css')}}" id="theme-stylesheet')}}">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
<body>
    <div id="app">
          @if (Auth::check())
                              <!-- Side Navbar -->
                <nav class="side-navbar">
                  <div class="side-navbar-wrapper">
                    <!-- Sidebar Header    -->
                    <div class="sidenav-header d-flex align-items-center justify-content-center">
                      <!-- User Info-->
                      <div class="sidenav-header-inner text-center"><a href=""><img src="{{asset( Auth::user()->avatar) }}" alt="person" class="img-fluid rounded-circle"></a>
                        <h2 class="h5">{{ Auth::user()->name }}</h2><span>Web Developer</span>
                      </div>
                      <!-- Small Brand information, appears on minimized sidebar-->
                      <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
                    </div>
                    <!-- Sidebar Navigation Menus-->
                    <div class="main-menu">
                      <h5 class="sidenav-heading">Main</h5>
                      <ul id="side-main-menu" class="side-menu list-unstyled">                  
                        <li><a href="{{route('home')}}"> <i class="icon-home"></i>Home                             </a></li>

                        @if(Auth::user()->hasRole('super_admin'))
                         <li><a href="#formsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>roles </a>
                          <ul id="formsDropdown" class="collapse list-unstyled ">
                            <li><a href="{{route('Roles')}}">roles</a></li>
                            <li><a href="{{route('Roles.create')}}">addroles</a></li>
                          </ul>
                        </li>
                        <li><a href="#tablesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-grid"></i>Tickets </a>
                          <ul id="tablesDropdown" class="collapse list-unstyled ">
                            <li><a href="{{route('tickets.create')}}">AddTicket</a></li>
                            <li><a href="{{route('tickets')}}">Tickets</a></li>
                          </ul>
                        </li>
                        @else
                        <li><a href="{{route('Tickets_user',['user'=>Auth::user()->id])}}">yourTickets</a></li>
                        <li><a href="{{route('profile',['id'=>Auth::user()->id])}}">profile</a></li>
                        @endif
                        @if(Auth::user()->hasRole('super_admin'))
                        <li><a href="#componentsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-page"></i>Users </a>
                          <ul id="componentsDropdown" class="collapse list-unstyled ">
                             <li><a href="{{route('users')}}">Users</a></li>
                            <li><a href="{{route('users.create')}}">AddUser</a></li>
                          </ul>
                        </li>
                        @endif
                      </ul>
                    </div>
                </nav>

         <div class="page">
                  <!-- navbar-->
          <header class="header">
            <nav class="navbar">
              <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                  <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                      <div class="brand-text d-none d-md-inline-block"><span>Bootstrap </span><strong class="text-primary">Dashboard</strong></div></a></div>
                  <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Log out-->
                    <li class="nav-item"><a href="{{ route('logout')}}"  onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="nav-link logout " > <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
                  </ul>
                </div>
              </div>
            </nav>
            </header>
         @yield('content')
     </div>
      @else

      @yield('content')

       @endif
    </div>
    <!-- logout-form-->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <!-- JavaScript files-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/charts-home.js')}}"></script>
     @if (Auth::check())
    <!-- Notifications-->
    <script src="{{asset('vendor/messenger-hubspot/build/js/messenger.min.js')}}">   </script>
    <script src="{{asset('vendor/messenger-hubspot/build/js/messenger-theme-flat.js')}}">       </script>
     @endif
    <script src="{{asset('js/home-premium.js')}}"> </script>
     <!-- Summernote-->
    <script src="{{asset('vendor/summernote/summernote-bs4.min.js')}}"></script>
     <!-- Summernote init-->
    <script src="{{asset('js/forms-texteditor.js')}}"></script>
    <!-- Data Tables-->
    <script src="{{asset('vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/tables-datatable.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset('js/front.js')}}"></script>
</body>
</html>
