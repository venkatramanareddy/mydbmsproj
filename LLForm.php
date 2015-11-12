<!DOCTYPE html>
<html>
    <head>
    	<title>LL form</title>
        <link rel = "stylesheet" type="text/css" href ="./styles/bootstrap.min.css" />
    </head>
    <body>
        <!-- (Modal part)This is for displaying message after pressing submit button -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModal-label">Confirm Submission</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you wish to submit this form?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" name = "submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <!--This section contains navbar of the website-->

        <!-- Some header details-->
        <header>
            <div class="jumbotron container">
                <h2 align="center">Application for Learning Licence</h 2>
            </div>
        </header>
		
		<!--this is a php script-->
		<?php
			$output_form = false;
			$f_name = '';
			$l_name = '';
			$dob_date = '';
			$dob_month = '';
			$dob_year = '';
			$address_1 = '';
			$address_2 = '';
			$ll_district = '';
			$ph_num = '';
			$e_mail = '';
			$id1_type = '';
			$id2_type = '';
			if(isset($_POST['submit']))
			{
				$f_name = $_POST['f_name'];
				$l_name = $_POST['l_name'];
				$dob_date = $_POST['dob_date'];
				$dob_month = $_POST['dob_month'];
				$dob_year = $_POST['dob_year'];
				$address_1 = $_POST['address_1'];
				$address_2 = $_POST['address_2'];
				$ll_district = $_POST['ll_district'];
				$ph_num = $_POST['ph_num'];
				$e_mail = $_POST['e_mail'];
				$id1_type = $_POST['id1_type'];
				$id2_type = $_POST['id2_type'];
				$id1_name = $_FILES['dob_proof']['name'];
				$id2_name = $_FILES['address_proof']['name'];
				$self_pic = $_FILES['self_pic']['name'];
				if(empty($f_name)||empty($l_name)||empty($dob_date)||empty($dob_month)||empty($dob_year)||empty($address_1)||empty($address_2)||empty($ll_district)||empty($id1_type)||empty($id2_type)||empty($ph_num)||empty($e_mail)||empty($id1_name)||empty($id2_name)||empty($self_pic))
				{
					$output_form = true;
				}
				else
				{
					$appl = time();
					$target = 'images/' . $id1_name;
					move_uploaded_file($_FILES['dob_proof']['tmp_name'],$target);
					$target = 'images/' . $id2_name;
					move_uploaded_file($_FILES['address_proof']['tmp_name'],$target);
					$target = 'images/' . $self_pic;
					move_uploaded_file($_FILES['self_pic']['tmp_name'],$target);
					
					$dbc = mysqli_connect('127.0.0.1','root','manash1234@5','rto')
					or die('error connecting db');
					
					$query = "INSERT INTO person(appl_id, f_name, l_name, dob_date, dob_month, dob_year, address_1, address_2, city, ph_num, e_mail, id_1, id_2, id1_name, id2_name, self_pic) 
					          VALUES('$appl','$f_name','$l_name','$dob_date','$dob_month','$dob_year','$address_1','$address_2','$ll_district','$ph_num','$e_mail','$id1_type','$id2_type','$id1_name','$id2_name','$self_pic')";
					
					$query1 = "INSERT INTO ll(app_id, ll_num) VALUES('$appl','$appl')";
					
					$result = mysqli_query($dbc,$query)
					or die('error querying db');
					
					$result = mysqli_query($dbc,$query1)
					or die('error querying db');
					
					mysqli_close($dbc);
				}
			}
			else
			{
				$output_form = true;
			}
         if($output_form)
         {
         ?>			 
        <!--This is the container for the main form-->
        <div class="container">
            <form role="form" class="form-horizontal" enctype = "multipart/form-data" method = "post" action = "<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="container">
					<input type = "hidden" name = "MAX_FILE_SIZE" value = "32768000"></br>
                    <!--For First and Last name-->
                    <div class="form-group">
                        <label for="FName" class="col-sm-4 control-label">First Name:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="f_name" value = "<?php echo $f_name ?>" "id="f_name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LName" class="col-sm-4 control-label">Last Name:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="l_name" value = "<?php echo $l_name ?>" id="l_name"/>
                        </div>
                    </div>
                    <!--For date of birth-->
                    <div class="form-group">
                        <label for="DOB" class="col-sm-4 control-label">Date of Birth:</label>
                        <div class="col-sm-4">
                            <div class="col-sm-4"><input type="date" class="form-control" name="dob_date" value = "<?php echo $dob_date ?>" id="name" placeholder="Date"/>
                            </div>
                            <div class="col-sm-4"><input type="month" class="form-control col-sm-3" name="dob_month" value = "<?php echo $dob_month ?>" id="name" placeholder="Month"/>
                            </div>
                            <div class="col-sm-4"><input type="year" class="form-control col-sm-3" name="dob_year" value = "<?php echo $dob_year ?>" id="dob_year" placeholder="year"/></div>
                        </div>
                    </div>
                    <!--For address line 1 and 2-->
                    <div class="form-group">
                        <label for="Addr1" class="col-sm-4 control-label">Address line 1:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="address_1" value = "<?php echo $address_1 ?>" id="name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Addr2" class="col-sm-4 control-label">Address line 2:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="address_2" value = "<?php echo $address_2 ?>" id="name"/>
                        </div>
                    </div>
                    <!-- Drop down for district -->
                    <div class="form-group">
                        <label for="District" class="col-sm-4 control-label">District</label>
                        <div class="col-sm-4">
                            <select name="ll_district" id="input" class="form-control">
                                <!--All options for districts-->
                                <option value ="1">Bangalore Urban</option>
                                <option value ="2">Bangalore Rural</option>
                            </select>
                        </div>
                    </div>
                    <!--for phone no-->
                    <div class="form-group">
                        <label for="Phoneno" class="col-sm-4 control-label">Phone number:</label>
                        <div class="col-sm-4">
                            <input type="tel" class="form-control" name="ph_num" value = "<?php echo $ph_num ?>" id="name"/>
                        </div>
                    </div>
                    <!--For E-mail-->
                    <div class="form-group">
                        <label for="Email" class="col-sm-4 control-label">Email id:</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="e_mail" value = "<?php echo $e_mail ?>" id="name"/>
                        </div>
                    </div>
                    <!--For address proof selection-->
                    <div class="form-group">
                        <label for="ID1type" class="col-sm-4 control-label">Document attached for Address proof:</label>
                        <div class="radio col-sm-4">
                            <label>
                                <input type="radio" name="ID1type" id="input1" value="Aadhar" checked="checked">
                                Aadhar Card
                            </label><br/>
                            <label>
                                <input type="radio" name="ID1type" id="input2" value="Voter ID">
                                Voter ID Card
                            </label><br/>
                            <label>
                                <input type="radio" name="ID1type" id="input3" value="Ration Card">
                                Ration Card
                            </label><br/>
                            <label>
                                <input type="radio" name="ID1type" id="input4" value="PAN Card">
                                PAN Card
                            </label>
                        </div>    
                    </div>
                    <!--For address proof attachment-->
                    <div class="form-group">
                        <label for="ID1" class="col-sm-4 control-label">Address proof attachment:</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="address_proof" id="name"/>
                        </div>
                    </div>
                    <!--For DOB proof selection-->
                    <div class="form-group">
                        <label for="ID2type" class="col-sm-4 control-label">Document attached for Birth Proof:</label>
                        <div class="radio col-sm-4">
                            <label>
                                <input type="radio" name="ID2type" id="input1" value="Birth Certificate" checked="checked">
                                Birth Certificate
                            </label><br/>
                            <label>
                                <input type="radio" name="ID2type" id="input2" value="Voter ID">
                                Voter ID Card
                            </label><br/>
                            <label>
                                <input type="radio" name="ID2type" id="input3" value="SSLC Marks Card">
                                SSLC Marks Card
                            </label><br/>
                            <label>
                                <input type="radio" name="ID2type" id="input4" value="PAN Card">
                                PAN Card
                            </label>
                        </div>    
                    </div>
                    <!--For DOB proof attachment-->
                    <div class="form-group">
                        <label for="ID2" class="col-sm-4 control-label">Date of Birth proof attachment:</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="dob_proof" id="name"/>
                        </div>
                    </div>
					
					
					<div class="form-group">
                        <label for="ID2" class="col-sm-4 control-label">Upload your photo:</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="self_pic" id="name"/>
                        </div>
                    </div>
                    <!--This is for displaying captcha(just attach your captcha code here)-->
					
                    
                </div>
            </form>
            
            <br />

            <!-- Button to display modal -->
            <div class="row">
                <button type="button" class="col-md-offset-3 col-md-6 btn btn-success" data-toggle="modal" data-target="#myModal">Confirm</button>
            </div>
        </div>
		<?php
		 }
		 ?>


        <!-- links to jquery -->
        <script src="./scripts/jquery-2.1.4.min.js"></script>
        <script src="./scripts/bootstrap.min.js"></script>
    </body>
</html>