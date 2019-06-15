<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta charset="ISO-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="HanuSir Admin Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
<base href="{{URL::asset('/')}}" target="_blank">
<link rel="stylesheet" href="{{url(('vendors/bootstrap/dist/css/bootstrap.min.css'))}}">
    <link rel="stylesheet" href="{{url(('vendors/font-awesome/css/font-awesome.min.css'))}}">
    <link rel="stylesheet" href="{{url(('vendors/themify-icons/css/themify-icons.css'))}}">
    <link rel="stylesheet" href="{{url(('vendors/flag-icon-css/css/flag-icon.min.css'))}}">
    <link rel="stylesheet" href="{{url(('vendors/selectFX/css/cs-skin-elastic.css'))}}">
    <link rel="stylesheet" href="{{url(('vendors/jqvmap/dist/jqvmap.min.css'))}}">
    <link rel="stylesheet" href="{{url(('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css'))}}">
    <link rel="stylesheet" href="{{url(('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'))}}">

    <link rel="stylesheet" href="{{url(('assets/css/style.css'))}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

		<script src="{{url(('js/jquery.js'))}}" type="text/javascript" charset="utf-8"></script>
		<script src="{{url(('vendors/popper.js/dist/umd/popper.min.js'))}}"></script>
		<script type="text/javascript" src="{{url(('vendors/bootstrap/dist/js/bootstrap.min.js'))}}"></script>
    <style type="text/css" media="screen">
            @media (min-width: 768px) {
              .modal-xl {
                width: 90%;
               max-width:1200px;
              }
            }
            .opt-margin {
                margin-left: 10px;
                margin-top: 10px;
                border-radius: .25rem;
            }

					
    </style>
</head>
<body>
<!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/" target="_self"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="/" target="_self"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/" target="_self"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Manage Sheets</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Manage Subjects</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="/viewSubject" target="_self">View Subjects</a></li>
                            <!-- <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li> -->
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-table"></i>Manage Chapters</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/viewChapter" target="_self">View Chapters</a></li>
                            <!-- <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li> -->
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Manage Questions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="/viewQuestions" target="_self">View All Questions</a></li>
                            <!-- <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li> -->
                        </ul>
                    </li>

                    <h3 class="menu-title">Manage Test Series</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Manage Test Questions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="/viewTestQuestions" target="_self">View All Test Questions</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <div class="dropdown for-message">

                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <!--<a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a> -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            @yield('breadcrumb')
        </div>


        <div class="content mt-3">

            @yield('viewSubject')
            @yield('viewChapter')
            @yield('viewQuestion')
@yield('viewTestQuestions')

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->






<!-- Script Files -->

		<script src="{{url(('vendors/jquery/dist/jquery.min.js'))}}"></script>
    <script src="{{url(('assets/js/main.js'))}}"></script>
    <script src="{{url(('vendors/datatables.net/js/jquery.dataTables.min.js'))}}"></script>
    <script src="{{url(('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js'))}}"></script>
    <script src="{{url(('vendors/datatables.net-buttons/js/dataTables.buttons.min.js'))}}"></script>
    <script src="{{url(('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'))}}"></script>
    <!-- <script src="{{url(('vendors/jszip/dist/jszip.min.js'))}}"></script>
    <script src="{{url(('vendors/pdfmake/build/pdfmake.min.js'))}}"></script>
    <script src="{{url(('vendors/pdfmake/build/vfs_fonts.js'))}}"></script> -->
    <script src="{{url(('vendors/datatables.net-buttons/js/buttons.html5.min.js'))}}"></script>
    <script src="{{url(('vendors/datatables.net-buttons/js/buttons.print.min.js'))}}"></script>
    <script src="{{url(('vendors/datatables.net-buttons/js/buttons.colVis.min.js'))}}"></script>
    <script src="{{url(('assets/js/init-scripts/data-table/datatables-init.js'))}}"></script>
    @yield('jquery')

    <!-- <script src="{{url(('vendors/chart.js/dist/Chart.bundle.min.js'))}}"></script>
    <script src="{{url(('assets/js/dashboard.js'))}}"></script>
    <script src="{{url(('assets/js/widgets.js'))}}"></script>
    <script src="{{url(('vendors/jqvmap/dist/jquery.vmap.min.js'))}}"></script>
    <script src="{{url(('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'))}}"></script>
    <script src="{{url(('vendors/jqvmap/dist/maps/jquery.vmap.world.js'))}}"></script> -->
    <!-- <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script> -->
<!-- Script Files -->
</body>
</html>
