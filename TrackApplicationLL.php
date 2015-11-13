<html>
<head>
	<link rel="stylesheet" type="text/css" href="./styles/bootstrap.min.css">
	<title>Track LL Application</title>
</head>
<body>
	<!--This section is for navbar-->

	<!--This section is for tracking-->

	<div class="col-sm-4 col-sm-offset-4">
	
	<form action="PrintApplicationLL.php" method="GET" role="form">
		<legend>Track LL Application</legend>
	
		<div class="form-group">
			<label for="">Application id :</label>
			<input type="text" name="app_id" class="form-control" id="" placeholder="Application Id">
		</div>
		
		<div class="form-group">
			<label for="">Year of Birth :</label>
			<input type="text" name="dob_year" class="form-control" id="" placeholder="First Name">
		</div>

		<button type="submit" class="btn btn-primary">Get details</button>
	</form>

	</div>
	
	<script src='./scripts/jquery-2.1.4.min.js'></script>
	<script src='./scripts/bootstrap.min.js'></script>
</body>
</html>