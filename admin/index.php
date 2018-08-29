
<!DOCTYPE html>
<html>
	<head>
	<title>Log in</title>
		<link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">
		<script src="../include/js/jquery.js"></script>
		<script src="../include/bootstrap/js/bootstrap.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
	</head>

	 <body>

		<div class="row">
		  <div class="col-md-8 col-md-offset-2"><h3 align="center">Sadman General Hospital</h3></div>
		</div>

		<div class="container" style="margin-top:40px">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong> Log in to continue</strong>
						</div>
							<div class="panel-body">

								<form role="form" action="../login.php" method="POST">
									<fieldset>

									<div class="row">
										<div class="col-sm-12 col-md-10  col-md-offset-1 ">
											<div class="form-group">
												<div class="input-group col-md-12">
													<h4>Username</h4>
													<input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
												</div>
											</div>
											<div class="form-group">
												<div class="input-group col-md-12 ">
													<h4>Password</h4>
													<input class="form-control" placeholder="* * * * * * *" name="password" type="password" required>
												</div>
											</div>
											<div class="form-group">
												<input type="submit" class="btn btn-primary" value="Log in" name="login">
											</div>
										</div>
									</div>
									</fieldset>
							</form>
					</div>

                </div>
			</div>
		</div>
	</div>



	 </body>

</html>