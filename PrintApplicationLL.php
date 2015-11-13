<html>
<head>
	<link rel="stylesheet" type="text/css" href="./styles/bootstrap.min.css">
	<title>PrintLLApplication</title>
</head>
<body>
	<!--Navbar is not required-->
	<?php
		$appl = $_GET['app_id'];
		$dbc = mysqli_connect('127.0.0.1','root','manash1234@5','rto')
		or die('error connecting database');
		
		$query = "SELECT * FROM person WHERE appl_id = '$appl'";
		
		$result = mysqli_query($dbc,$query)
		or die('Error querying database');
		
		$row = mysqli_fetch_array($result);
		
		mysqli_close($dbc);	
	if($row['f_name'] != NULL)
	{		
	?>
	
	<!--Use this space to add your php code for form making-->
	<div class="container jumbotron">
		<div align="center">
			<h2>RTO Citizen Portal</h2>
		</div>
	</div>
	<div class="container" align="right">
		<span class="glyphicon glyphicon-print"><a href="javascript:window.print()">PrintPage</a></span>
	</div>
	<br>
	<div class="container">	
		<table class="table table-bordered table-hover table-stripped">
			<thead>
				<tr>
					<th>Online Learning License Application</th>
					<th>
					<img src="<?php echo 'images/'.$row['id1_name']?>" class="img-responsive" alt="Photo" height="150" width="150">
					</th>
				</tr>	
			</thead>
			<tbody>
				<tr>
					<td>Application Number : <?php echo $row['appl_id'] ?></td>
				</tr>
				<tr>
					<td>First Name : <?php echo $row['f_name'] ?></td>
					<td>Last Name : <?php echo $row['l_name'] ?></td>
				</tr>
				<tr>
					<td>Address : <?php echo $row['address_1'].', '.$row['address_2'] ?></td>
					<td>Date of Birth : <?php echo $row['appl_id'] ?></td>
				</tr> 
				<tr>
					<td>Address Proof Type : <?php echo $row['id_1'] ?></td>
					<td>DOB Proof Type : <?php echo $row['id_2'] ?></td>
				</tr>
				<tr>
					<td>Phone number : <?php echo $row['ph_num'] ?></td>
					<td>Application Status : <?php if($row['status']) echo "license obtained"; else echo "LL application submitted";?></td>
				</tr>
				
			</tbody>
		</table>
	</div>

	<!--If you cannot handle using table, use this

	<div class="container">
		<div class="col-sm-6">
			<br/>Application Number :
			<br/>First Name :
			<br/>Address :
			<br/>Address proof type :
		</div>
		<div class="col-sm-6">
			<br/>
			<br/>Last Name :
			<br/>District :
			<br/>DOB :
			<br/>DOB proof type :
		</div>
	</div>-->

	<div class="container" align="center">
		<h3>
			<div class="col-sm-6">
				Signature of Applicant
			</div>
			<div class="col-sm-6">
				Signature of Officer-In-Charge
			</div>
		</h3>
	</div>
	<br>
	
	<div align="right" id="bottom-bar">
		<style type="text/css">
				#bottom-bar {
				    bottom: 0;
				    left: 0;
				    position: fixed;
				    right: 0;
				    text-align: right;
				}
		</style>
		<i>*print this page and submit it to the nearest RTO office for evaluation and issue of License</i>
	</div>
	<?php
	}
	else
		echo "invalid app id";
	?>

	<script src='./scripts/jquery-2.1.4.min.js'></script>
	<script src='./scripts/bootstrap.min.js'></script>
</body>
</html>