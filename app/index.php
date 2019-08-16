<?php  
	include ('php/connection/dbconnection.php');
	// Create connection
	$dbconn = OpenCon();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script type="text/javascript">
            window.onload = function () {
                var dataLength = 0;
                var data = [];
                $.getJSON("php/chartnetflow.php", function (result) {
                    dataLength = result.length;
                    for (var i = 0; i < dataLength; i++) {
                        data.push({
                            //x: parseInt(result[i].valorx),
                            y: parseInt(result[i].valory), label: result[i].valorx
                        });
                    }
                    ;
                    chart.render();
                });
                var chart = new CanvasJS.Chart("chart", {
                    title: {
                        text: "Consumo de Datos"
                    },
                    axisX: {
                        title: "Direcciones IP",
                    },
                    axisY: {
                        title: "Paquetes",
                    },
                    data: [{type: "line", dataPoints: data}],
                });
            }
        </script>
        <script type="text/javascript" src="js/canvasjs.min.js"></script>
        <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
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

	<title>Banda Malandra! - WebApp</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="index.php">Redes 3</a>

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
			<li class="nav-item active">
				<a class="nav-link" href="index.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>
		<!--	<li class="nav-item dropdown">
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
				<a class="nav-link" href="php/inventario.php">
					<i class="fas fa-fw fa-clipboard-check"></i>
					<span>Inventario</span></a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="php/registros.php">
					<i class="fas fa-fw fa-chart-bar"></i>
					<span>Bitácora</span></a>
				</li>
		        <li class="nav-item">
		        <a class="nav-link" href="php/interfaz.php">
		          <i class="fas fa-fw fa-database"></i>
		          <span>Interfaces</span></a>
		        </li>
		        <li class="nav-item">
		        <a class="nav-link" href="php/netflow.php">
		          <i class="fas fa-fw fa-network-wired"></i>
		          <span>Netflow</span></a>
		        </li>  				
		</ul>

				<div id="content-wrapper">

					<div class="container-fluid">

						<!-- Breadcrumbs-->
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="#">Dashboard</a>
							</li>
							<li class="breadcrumb-item active">Overview</li>
						</ol>

						<!-- Icon Cards-->
								<div class="row">

									<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-primary o-hidden h-100">
											<div class="card-body">
												<div class="card-body-icon">
													<i class="fa fa-fw fa-clipboard-check"></i>
												</div>
												<?php
												$sqll = "SELECT  count(*) from Dispositivo";
												$result = mysqli_query($dbconn, $sqll);
												while($row = mysqli_fetch_assoc($result)){
												?>
												<div class="mr-5"><b>Dispositivos totales contabilizados </b> <h2><?php echo $row['count(*)']; ?></h2> 
												</div>
												<?php }
												?>
											</div>
											<a class="card-footer text-white clearfix small z-1" href="#DevInf">
												<span class="float-left">Ver Detalles</span>
												<span class="float-right">
													<i class="fa fa-angle-right"></i>
												</span>
											</a>
										</div>
									</div>
									<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-info o-hidden h-100">
											<div class="card-body">
												<div class="card-body-icon">
													<i class="fa fa-fw fa-list"></i>
												</div>
												<?php
												$sqll = "SELECT  count(*) from Inventario";
												$result = mysqli_query($dbconn, $sqll);
												while($row = mysqli_fetch_assoc($result)){
												?>												
												<div class="mr-5"><b>Entradas en inventario </b> <h2><?php echo $row['count(*)'];?></h2>
												</div>
												<?php }
												?>										
											</div>
											
									<a class="card-footer text-white clearfix small z-1" href="php/inventario.php">
										<span class="float-left">Ver Detalles</span>
										<span class="float-right">
											<i class="fa fa-angle-right"></i>
										</span>
									</a>
								</div>
							</div>
							<div class="col-xl-3 col-sm-6 mb-3">
								<div class="card text-white bg-success o-hidden h-100">
									<div class="card-body">
										<div class="card-body-icon">
											<i class="fa fa-fw fa-network-wired"></i>
										</div>
										<?php
										$sqll = "SELECT  count(*) from Netflow";
										$result = mysqli_query($dbconn, $sqll);
										while($row = mysqli_fetch_assoc($result)){
										?>	
										<div class="mr-5"><b>Registros Netflow </b> <h2><?php echo $row['count(*)'];?></h2>
										</div>
										<?php }
										?>				
									</div>
									<a class="card-footer text-white clearfix small z-1" href="php/netflow.php">
										<span class="float-left">Ver Detalles</span>
										<span class="float-right">
											<i class="fa fa-angle-right"></i>
										</span>
									</a>
								</div>
							</div>
							<div class="col-xl-3 col-sm-6 mb-3">
								<div class="card text-white bg-dark o-hidden h-100">
									<div class="card-body">
										<div class="card-body-icon">
											<i class="fa fa-fw fa-chart-bar"></i>
										</div>
										<?php
										$sqll = "SELECT  count(*) from Registro";
										$result = mysqli_query($dbconn, $sqll);
										while($row = mysqli_fetch_assoc($result)){
										?>	
										<div class="mr-5"><b>Total de Registros</b><h2><?php echo $row['count(*)'];?></h2>
										</div>
										<?php }
										?>
									</div>
									<a class="card-footer text-white clearfix small z-1" href="php/registros.php">
										<span class="float-left">Ver Detalles</span>
										<span class="float-right">
											<i class="fa fa-angle-right"></i>
										</span>
									</a>
								</div>
							</div>
						</div>
						<?php
						$sqlll = "SELECT nombre, modelo, sistemaOperativo, numeroSerie, fabricante from Dispositivo";
						if (mysqli_query($dbconn, $sqlll))
						{
							echo "";
						}
						else
						{
							echo "Error: " . $sqlll . "<br>" . mysqli_error($dbconn);
						}
						$result = mysqli_query($dbconn, $sqlll);
						$number=array();
						if (mysqli_num_rows($result) > 0)
						{
							// output data of each row
							while($row = mysqli_fetch_assoc($result))
							{
								$number[]=$row['sales'];
							}
						}
						else
						{
							echo "<b>Sin datos Grafica</b>";
						}
						$number_formated= "[".implode(",",$number)."]";
						//echo json_encode($number);
						?>
						<script type="text/javascript">
							window.dataf= "<?php echo $number_formated; ?>"
						</script>
						<!-- Area Chart Example
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-area-chart"></i>Consumo de Datos</div>
								<div class="card-body">
									<canvas id="myAreaChart" width="100%" height="30"></canvas>
								</div>
								<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
							</div>-->
							<!-- Example DataTables Card-->
							<div class="card mb-3">
								<div class="card-header">
									<i class="fa fa-table" id="DevInf"></i> Información de Dispositivos</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th>ID</th>
														<th>Dispositivo</th>
														<th>Modelo</th>
														<th>Sistema Operativo</th>
														<th>Número de Serie</th>
														<th>Fabricante</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>ID</th>
														<th>Dispositivo</th>
														<th>Modelo</th>
														<th>Sistema Operativo</th>
														<th>Número de Serie</th>
														<th>Fabricante</th>
													</tr>
												</tfoot>
												<?php
													$sql = "SELECT idDispositivo ,nombre, modelo, sistemaOperativo, numeroSerie, fabricante from Dispositivo";
													$count=1;
													$result = mysqli_query($dbconn, $sql);
													if (mysqli_num_rows($result) > 0) {
													// output data of each row
													while($row = mysqli_fetch_assoc($result)) { 
												?>
										<tbody>
											<tr>
												<td>
													<?php echo $row['idDispositivo']; ?>
												</td>
												<td>
													<?php echo $row['nombre']; ?>
												</td>
												<td>
													<?php echo $row['modelo']; ?>
												</td>
												<td>
													<?php echo $row['sistemaOperativo']; ?>
												</td>
												<td>
													<?php echo $row['numeroSerie']; ?>
												</td>
												<td>
													<?php echo $row['fabricante']; ?>
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
		<!--<p><button onclick="showNotification('peligro', 'hola')">Show a Notification</button></p> -->
		</div>
		    <div id="chart">
        </div>
		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->
		<footer class="page-footer">
			<div class="container">
				<div class="text-center">
					<small>Copyright © Your Website <?php echo date('Y') ?></small>
				</div>
			</div>
		</footer>
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
		<!-- Logout Modal-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<a class="btn btn-primary" href="html/login.html">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
		<!-- Page level plugin JavaScript-->
		<script src="vendor/chart.js/Chart.min.js"></script>
		<script src="vendor/datatables/jquery.dataTables.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin.min.js"></script>
		<!-- Custom scripts for this page-->
		<script src="js/sb-admin-datatables.min.js"></script>
		<script src="js/sb-admin-charts.min.js"></script>
		<script src="js/notification.js"></script>
	</div>
</body>
</html>