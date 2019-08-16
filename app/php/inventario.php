<?php  
  include ('connection/dbconnection.php');
  // Create connection
  $dbconn = OpenCon();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script>
    $(document).ready(function(){
     
     function load_unseen_notification(view = '')
     {
      $.ajax({
       url:"get-notification.php",
       method:"POST",
       data:{view:view},
       dataType:"json",
       success:function(data)
       {
        $('.dropdown-menu').html(data.notification);
        if(data.unseen_notification > 0)
        {
         $('.count').html(data.unseen_notification);
        }
       }
      });
     }
     
     load_unseen_notification();

     $(document).on('click', '#alertsDropdown', function(){
      $('.count').html('');
      load_unseen_notification('yes');
     });
     
     setInterval(function(){ 
      load_unseen_notification();; 
     }, 5000);
     
    });
  </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inventario</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="../index.php">Redes 3</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0 dropleft">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toglge" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-lg fa-fw fa-lg"></i>
          <span class="badge badge-danger count "style="font-size:11px;"></span>
        </a>
        <ul class="dropdown-menu"></ul>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

   <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
    <!--  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="html/login.html">Login</a>
          <a class="dropdown-item" href="html/register.html">Register</a>
          <a class="dropdown-item" href="html/forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="html/404.html">404 Page</a>
          <a class="dropdown-item" href="html/blank.html">Blank Page</a>
        </div>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="html/charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="html/tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
        </li>-->
        <li class="nav-item active">
        <a class="nav-link" href="inventario.php">
          <i class="fas fa-fw fa-clipboard-check"></i>
          <span>Inventario</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="registros.php">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>Bitácora</span></a>
        </li>
            <li class="nav-item">
            <a class="nav-link" href="interfaz.php">
              <i class="fas fa-fw fa-database"></i>
              <span>Interfaces</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="netflow.php">
              <i class="fas fa-fw fa-network-wired"></i>
              <span>Netflow</span></a>
            </li>         
    </ul>

        <div id="content-wrapper">

          <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Inventario</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>hostname</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Product Identifier</th>
                    <th>Version Identifier</th>
                    <th>Serial Number</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Hostname</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Product Identifier</th>
                    <th>Version Identifier</th>
                    <th>Serial Number</th>
                  </tr>
                </tfoot>
                <?php
                  $sql = "SELECT hostname, nombre, descripcion, pid, vid, ns from Inventario";
                  $count=1;
                  $result = mysqli_query($dbconn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) { 
                ?>
                <tbody>
                  <td>
                    <?php echo $row['hostname']; ?>
                  </td>
                  <td>
                    <?php echo $row['nombre']; ?>
                  </td>
                  <td>
                    <?php echo $row['descripcion']; ?>
                  </td>
                  <td>
                    <?php echo $row['pid']; ?>
                  </td>
                  <td>
                    <?php echo $row['vid']; ?>
                  </td>
                  <td>
                    <?php echo $row['ns']; ?>
                  </td>                       
                </tbody>
                <?php
                    $count++;
                  }
                } 
                else{
                    echo "<b>Sin datos</b>";
                  }
                ?>
              </table>
            </div>
          </div>
        <?php
        $sqll = "select lastUpdate from Inventario order by lastUpdate desc limit 1;";
        $result = mysqli_query($dbconn, $sqll);
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="card-footer small text-muted">Última modificación: <b><?php echo date('l jS \of F Y h:i:s A',strtotime($row['lastUpdate'])); ?></b>
        </div>
        </div>
        <?php }
        ?>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
