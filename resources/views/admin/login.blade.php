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

    <!-- Custom Fonts -->
    <link href={!! url('admin/bower_components/font-awesome/css/font-awesome.min.css') !!} rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="col-md-12">
                  @include('admin.blocks.error')
                </div>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="POST">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                <a href="{!! url('register') !!}" class="btn btn-lg btn-default btn-block">Register</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src={!! url('admin/bower_components/jquery/dist/jquery.min.js') !!}></script>

    <!-- Bootstrap Core JavaScript -->
    <script src={!! url('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src={!! url('admin/bower_components/metisMenu/dist/metisMenu.min.js') !!}></script>

    <!-- Custom Theme JavaScript -->
    <script src={!! url('admin/dist/js/sb-admin-2.js') !!}></script>

</body>

</html>
