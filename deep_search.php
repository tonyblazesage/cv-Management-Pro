<?php
include('config.php');
	if(isset($_SESSION['email'])){
		 //define userid
		$req = mysqli_query($con,'select email,id from user_account where email="'.$_SESSION['email'].'"');
		$dn = mysqli_fetch_array($req);
		$_SESSION['userid'] = $dn['id'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <title><?php echo htmlentities($_SESSION['email']); ?>:CV-Pro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<!--Nav bar-->
<div class="jumbotron" style="padding:15px;">
    <?php include('navbar.php'); ?>
    <br>
    <div class="brand text-center">
					      <h1>CV-Pro</h1>
					      <p>Get Hired</p> 
					    </div>
</div>

				<div class="search col-md-6 form1">
					<h3 class="text-center">Search</h3>
					<form action="search.php" method="GET">
						<div class="form-group">
    						<label for="job">Job Title/Profession:</label>
							<input type="text" class="form-control job" name="a" value='' placeholder="e.g Nurse" autocomplete="on" />
						</div>
						<div class="form-group">
    						<label for="edulvl">Education Level:</label>
							<input type="text" class="form-control edulvl" name="b" value='' placeholder="e.g Masters or PhD" autocomplete="on" />
						</div>
						<div class="form-group">
    						<label for="field">Field of Study:</label>
							<input type="text" class="form-control field" name="c" value='' placeholder="Nursing" autocomplete="on" />
						</div>
						<div class="form-group">
    						<label for="gcse">Min GCSE passses:</label>
							<input type="text" class="form-control gcse" name="d" value='' placeholder="e.g 1" autocomplete="on" />
						</div>
						<div class="form-group">
    						<label for="qual">Qualification: </label>
							<input type="text" class="form-control qual" name="e" value='' placeholder="e.g Association of Chartered Certified Accountants (ACCA)" autocomplete="on" />
						</div>
						<div class="form-group">
    						<label for="skill">Skill: </label>
							<input type="text" class="form-control skill" name="f" value='' placeholder="e.g Photography." autocomplete="on" />
						</div>
						<div class="form-group">
    						<label for="jobtitle">Job Experience: </label>
							<input type="text" class="form-control jobtitle" name="g" value='' placeholder="e.g Receptionist" autocomplete="on" />
						</div>
						<div class="container mt-4">
					    	<button type="submit" name="submit" class="btn btn-primary ml-auto mr-4" >Search <i class='fa fa-angle-right'></i></button>
					    </div>
					</form>
				</div>





</body>
</html>