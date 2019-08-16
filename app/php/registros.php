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
<script type="text/javascript">
            window.onload = function () {
                var dataLength = 0;
                var data = [];
                $.getJSON("chart_data.php", function (result) {
                    dataLength = result.length;
                    for (var i = 0; i < dataLength; i++) {
                        data.push({
                            x: parseInt(i),
                            y: parseInt(result[i].valory)
                        });
                    }
                    ;
                    chart.render();
                });
                var chart = new CanvasJS.Chart("chart", {
                    title: {
                        text: "Temperatura"
                    },
                    axisX: {
                        title: "Registro",
                    },
                    axisY: {
                        title: "°C",
                    },
                    data: [{type: "line", dataPoints: data}],
                });
            }
        </script>
        <script type="text/javascript">
            window.onload = function () {
                var dataLength = 0;
                var data = [];
                $.getJSON("chart_data2.php", function (result) {
                    dataLength = result.length;
                    for (var i = 0; i < dataLength; i++) {
                        data.push({
                            label: parseInt(result[i].valorx),
                            y: parseInt(result[i].valory)
                        });
                    }
                    ;
                    chart.render();
                });
                var chart = new CanvasJS.Chart("chart2", {
                    title: {
                        text: "Uso de CPU"
                    },
                    axisX: {
                        title: "ID Dispositivo",
                    },
                    axisY: {
                        title: "Porcentaje de uso",
                    },
                    data: [{type: "line", dataPoints: data}],
                });
            }
        </script>
        <script type="text/javascript" src="../js/canvasjs.min.js"></script>
        <script type="text/javascript" src="../js/jquery-2.2.3.min.js"></script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Redes 3 Equipo Bergas</title>

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
        <li class="nav-item">
        <a class="nav-link" href="inventario.php">
          <i class="fas fa-fw fa-clipboard-check"></i>
          <span>Inventario</span></a>
        </li>
        <li class="nav-item active ">
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
           

            <!-- Icon Cards-->
            
            
              <!-- Example DataTables Card-->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table" id="DevInf"></i>Registros de dispositivos</div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Dispositivo</th>
                            <th>Fecha y hora</th>
                            <th>Temperatura</th>
                            <th>Uso de CPU</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Dispositivo</th>
                            <th>Fecha y hora</th>
                            <th>Temperatura</th>
                            <th>Uso de CPU</th>
                          </tr>
                        </tfoot>
                        <?php
                          $sql = "SELECT Dispositivo_idDispositivo, fechaHora, temperatura, usoCPU from Registro order by fechaHora DESC limit 20";
                          $count=1;
                          $result = mysqli_query($dbconn, $sql);
                          if (mysqli_num_rows($result) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($result)) { 
                        ?>
                    <tbody>
                      <tr>
                        <td>
                          <?php echo $row['Dispositivo_idDispositivo']; ?>
                        </td>
                        <td>
                          <?php echo $row['fechaHora']; ?>
                        </td>
                        <td>
                          <?php echo $row['temperatura']; ?>°C
                        </td>
                        <td>
                          <?php echo $row['usoCPU']; ?>%
                        </td>
                      </tr>
                    </tbody>
                    <?php
                    $count++;
                  }
                } 
                else {
                echo "<b>Sin datos</b>";
              }
              ?>
            </table>
          </div>
        </div>
        <?php
        $sqll = "select lastUpdate from Dispositivo order by lastUpdate desc limit 1;";
        $result = mysqli_query($dbconn, $sqll);
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="card-footer small text-muted">Última modificación: <b><?php echo date('l jS \of F Y h:i:s A',strtotime($row['lastUpdate'])); ?></b>
        </div>
      </div>
        <?php }
        ?>
    </div>
    <!-- /.container-fluid-->
    
    <!-- /.content-wrapper-->
    <div id="chart">
        </div>
        <br><br><br>
        <div id="chart2">
        </div>
        <br><br><br>
    
    <!-- Bootstrap core JavaScript-->
 
  </div>
</body>
</html>