<?php  
	include ('php/connection/dbconnection.php');
	// Create connection
	$dbconn = OpenCon();
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Redes 3 Equipo Bergas</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Navbar Search -->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button class="btn btn-primary" type="button">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</form>

		<!-- Navbar -->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown no-arrow mx-1">
				<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-bell fa-fw"></i>
					<span class="badge badge-danger">9+</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			<li class="nav-item dropdown no-arrow mx-1">
				<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-envelope fa-fw"></i>
					<span class="badge badge-danger">7</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user-circle fa-fw"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#">Settings</a>
					<a class="dropdown-item" href="#">Activity Log</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
				</div>
			</li>
		</ul>

	</nav>

	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="sidebar navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="index.html">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="nav-item dropdown">
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
													<i class="fa fa-fw fa-broadcast-tower"></i>
												</div>
												<?php
												$sqll = "SELECT  count(*) from Dispositivo";
												$result = mysqli_query($dbconn, $sqll);
												while($row = mysqli_fetch_assoc($result)){
												?>
												<div class="mr-5"><b>Dispositivos totales contabilizados:</b> <h2><?php echo $row['count(*)']; ?></h2> 
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
										<div class="card text-white bg-warning o-hidden h-100">
											<div class="card-body">
												<div class="card-body-icon">
													<i class="fa fa-fw fa-list"></i>
												</div>
												<div class="mr-5"><?php echo $row['revenue'];?>  Revenue</div>
											</div>
											
									<a class="card-footer text-white clearfix small z-1" href="#">
										<span class="float-left">View Details</span>
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
											<i class="fa fa-fw fa-shopping-cart"></i>
										</div>
										<div class="mr-5">123 New Orders!</div>
									</div>
									<a class="card-footer text-white clearfix small z-1" href="#">
										<span class="float-left">View Details</span>
										<span class="float-right">
											<i class="fa fa-angle-right"></i>
										</span>
									</a>
								</div>
							</div>
							<div class="col-xl-3 col-sm-6 mb-3">
								<div class="card text-white bg-danger o-hidden h-100">
									<div class="card-body">
										<div class="card-body-icon">
											<i class="fa fa-fw fa-support"></i>
										</div>
										<div class="mr-5">13 New Tickets!</div>
									</div>
									<a class="card-footer text-white clearfix small z-1" href="#">
										<span class="float-left">View Details</span>
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
							echo "0 results";
						}
						$number_formated= "[".implode(",",$number)."]";
						?>
						<script type="text/javascript">
							window.dataf= "<?php echo $number_formated; ?>"
						</script>
						<!-- Area Chart Example-->
						<div class="card mb-3">
							<div class="card-header">
								<i class="fa fa-area-chart"></i> Sales Chart</div>
								<div class="card-body">
									<canvas id="myAreaChart" width="100%" height="30"></canvas>
								</div>
								<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
							</div>
							<!-- Example DataTables Card-->
							<div class="card mb-3">
								<div class="card-header">
									<i class="fa fa-table" id="DevInf"></i> Información de Dispositivos</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th>Dispositivo</th>
														<th>Modelo</th>
														<th>Sistema Operativo</th>
														<th>Número de Serie</th>
														<th>Fabricante</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Dispositivo</th>
														<th>Modelo</th>
														<th>Sistema Operativo</th>
														<th>Número de Serie</th>
														<th>Fabricante</th>
													</tr>
												</tfoot>
												<?php
													$sql = "SELECT nombre, modelo, sistemaOperativo, numeroSerie, fabricante from Dispositivo";
													$count=1;
													$result = mysqli_query($dbconn, $sql);
													if (mysqli_num_rows($result) > 0) {
													// output data of each row
													while($row = mysqli_fetch_assoc($result)) { 
												?>
										<tbody>
											<tr>
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
								echo '0 results';
							}
							?>
						</table>
					</div>
				</div>
				<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
			</div>
		</div>
		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->
		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>Copyright © Your Website 2018</small>
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
	</div>
</body>
</html>