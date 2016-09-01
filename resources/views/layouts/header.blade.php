<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Lamp')</title>

  <!-- Bootstrap -->
  <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  @if (in_array('icheck', $widgets))
  <!-- iCheck -->
  <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  @endif

  @if (in_array('datatable', $widgets))
  <!-- Datatables -->
  <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  @endif

  @if (in_array('select2', $widgets))
  <!-- Select2 -->
  <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  @endif

  @if (in_array('fullcalendar', $widgets))
  <!-- FullCalendar -->
  <link href="/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
  <link href="/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
  @endif

  @if (in_array('pnotify', $widgets))
  <!-- PNotify -->
  <link href="/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
  <link href="/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
  @endif
  @if (in_array('daterangepicker', $widgets))
  <link rel="stylesheet" href="/vendors/bootstrap-daterangepicker/daterangepicker.css">
  @endif

  @yield('css-import')

  <!-- jVectorMap -->
  <link href="/vendors/gentelella/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
  <!-- Custom Theme Style -->
  <link href="/vendors/gentelella/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href={{ url('gentelella/index') }} class="site_title"><i class="fa fa-paw"></i> <span>@yield('brand', 'Lamp')</span></a>
          </div>
          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="/vendors/gentelella/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>欢迎你，</span>
              <h2>{{ Auth::user()['name'] }}</h2>
              @if (isset($user))
              <h2>{{ $user->$name }}</h2>
              @endif
            </div>
          </div>
          <!-- /menu profile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              @if (isset($user))
              <h2>{{ $user->$role }}</h2>
              @else
              <h3>运营人员</h3>
              @endif
              <ul class="nav side-menu">
                @foreach ($menus as $menu)
                <li><a><i class="{{ $menu['icon'] }}"></i> {{ $menu['display_name'] }} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    @foreach ($menu['children'] as $child)
                    <li><a href={{ url($menu['name'] . '/' . $child['name']) }}>{{ $child['display_name'] }}</a></li>
                    @endforeach
                  </ul>
                </li>
                @endforeach
              </ul>
            </div>
            <hr/>
            <div class="menu_section">
              <ul class="nav side-menu" style="display:none;">
                <li><a href={{ url('gentelella/index') }}>Gentelella</a></li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="/vendors/gentelella/images/img.jpg" alt="">{{ Auth::user()['name'] }}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>设置</span>
                    </a>
                  </li>
                  <li><a href={{ url('/auth/logout') }}><i class="fa fa-sign-out pull-right"></i> 退出</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="/vendors/gentelella/images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="/vendors/gentelella/images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="/vendors/gentelella/images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="/vendors/gentelella/images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
