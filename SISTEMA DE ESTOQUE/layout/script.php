<?php
$url = 'http://localhost/menus/'; 

$head = '<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-language" content="pt-br" /> 
  <title>Estoque | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="' . $url . 'bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="' . $url . 'dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="' . $url . 'dist/css/skins/_all-skins.min.css">

  <!-- Date Picker -->
  <link rel="stylesheet" href="' . $url . 'plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="' . $url . 'plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="' . $url . 'plugins/datatables/dataTables.bootstrap.css">
  
  
  
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="' . $url . 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="https://apis.google.com/js/platform.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>





 


</head> 
<body class="skin-blue sidebar-collapse" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">';

$header = '<header class="main-header">

    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="' . $url . '' . $foto . '" class="user-image" alt="User Image">
              <span class="hidden-xs">' . $username . '</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="' . $url . '' . $foto . '" class="img-circle" alt="User Image">

                <p>
                  ' . $username . ' 
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="' . $url . 'usuarios/profile.php"" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="' . $url . 'destroy.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul> 
          </li>
        </ul>
      </div>
    </nav>
  </header>';



$javascript = '
 
  </div>
<!-- jQuery 2.2.3 -->
<script src="https://code.jquery.com/jquery-2.2.3.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge(\'uibutton\', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="' . $url . 'bootstrap/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="' . $url . 'plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="' . $url . 'plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="' . $url . 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="' . $url . 'plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="' . $url . 'plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE Conexao -->
<script src="' . $url . 'dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="' . $url . 'dist/js/demo.js"></script>
<script src="' . $url . 'plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="' . $url . 'plugins/bootbox.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
</html>
';


