<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="Vu Quoc Tuan">
    <title>Admin - Khoa Phạm</title>

    <!-- Bootstrap Core CSS -->
    <link href={!! url('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!} rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href={!! url('admin/bower_components/metisMenu/dist/metisMenu.min.css') !!} rel="stylesheet">

    <!-- Custom CSS -->
    <link href={!! url('admin/dist/css/sb-admin-2.css') !!} rel="stylesheet">

    <!-- Custom Admin -->
    <link href={!! url('admin/css/cus_admin.css') !!} rel="stylesheet">

    <!-- Custom Fonts -->
    <link href={!! url('admin/bower_components/font-awesome/css/font-awesome.min.css') !!} rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href={!! url('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') !!} rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href={!! url('admin/bower_components/datatables-responsive/css/dataTables.responsive.css') !!} rel="stylesheet">

    <!-- CK Editor && CK Finder -->
    <script type="text/javascript" src={!! url('admin/js/ckeditor/ckeditor.js') !!}></script>
    <script type="text/javascript" src={!! url('admin/js/ckfinder/ckfinder.js') !!}></script>
    <script type="text/javascript">
      var baseURL = "{!! url('/') !!}";
    </script>
    <script type="text/javascript" src={!! url('admin/js/func_ckfinder.js') !!}></script>
    <!-- End CK Editor && CK Finder -->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Area - Hoàng Tú</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {!! Auth::user()->username !!}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!! url('logout') !!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.cate.getList') !!}">List Category</a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('admin.cate.getAdd') !!}">Add Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.product.getList') !!}">List Product</a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('admin.product.getAdd') !!}">Add Product</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.user.getList') !!}">List User</a>
                                </li>
                                <li>
                                    <a href="{!! URL::route('admin.user.getAdd') !!}">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Order<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::route('admin.order.getList') !!}">List Order</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- flash message -->
        <div class="col-sm-10 col-sm-offset-2" style="padding-top: 10px">
          @if(Session::has('flash_message'))
            <div class="alert alert-{!! Session::get('flash_level') !!}">
              {!! Session::get('flash_message') !!}
            </div>
          @endif
        </div>

        <!-- Page Content -->
        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src={!! url('admin/bower_components/jquery/dist/jquery.min.js') !!}></script>

    <!-- Bootstrap Core JavaScript -->
    <script src={!! url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}></script>

    <!-- My Script -->
    <script src={!! url('admin/js/myscript.js') !!}></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src={!! url('admin/bower_components/metisMenu/dist/metisMenu.min.js') !!}></script>

    <!-- Custom Theme JavaScript -->
    <script src={!! url('admin/dist/js/sb-admin-2.js') !!}></script>

    <!-- DataTables JavaScript -->
    <script src={!! url('admin/bower_components/DataTables/media/js/jquery.dataTables.min.js') !!}></script>
    <script src={!! url('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
