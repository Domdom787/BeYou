<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BeYou | Arete - Login</title>

  <!-- Favicon -->  
  <link rel="icon" href="img/beyou_2.png" type="image/png" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- App style -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">

<?php
  if(isset($_POST["login_btn"])) {
    include("../app/model/inc/m_login.inc.php");
  }
?>


<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>BeYou</b>Arete</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">      

      <form method="POST" id="login-form">

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="entity" id="entity" placeholder="Entity Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-fingerprint"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login_btn">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <p class="mb-1">        
        <table class="table table-sm table-striped table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>User type</th>
              <th>Test Entity</th>              
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Staff user</td>
              <td>1234</td>
            </tr>
            <tr>
              <td>TL user</td>
              <td>5678</td>
            </tr>
            <tr>
             <td>BeYou User user</td>
              <td>56789</td>
            </tr>
          </tbody>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

</body>
</html>
  