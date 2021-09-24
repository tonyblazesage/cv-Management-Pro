<?php
include('config.php');
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
<style>
    .print{
        margin:auto;
    }
</style>
<body>

<?php
if(isset($_SESSION['email'])){
 //define userid
$req = mysqli_query($con,'select email,id from user_account where email="'.$_SESSION['email'].'"');
$dn = mysqli_fetch_array($req);
$_SESSION['userid'] = $dn['id'];
$_GET['userid']=$_SESSION['userid'];
}?>

<?php
if(isset($_GET['userid']))
{
	$id = intval($_GET['userid']);
	$dn = mysqli_query($con, 'SELECT * FROM user_account where id="'.$_SESSION['userid'].'"');
	$ed = mysqli_query($con,'SELECT * FROM education_detail where user_email="'.$_SESSION['email'].'"');
	$ex = mysqli_query($con,'SELECT * FROM experience_detail where reg_email="'.$_SESSION['email'].'"');
	if(mysqli_num_rows($dn)>0)
	{
		$dnn = mysqli_fetch_array($dn);

?>
<!--Nav bar-->
<div class="jumbotron" style="padding:15px;">
    <?php include('navbar.php'); ?>
    <br>
    <div class="brand text-center">
      <h2> <?php echo htmlentities($dnn['firstname']); ?>'s CV Profile </h2> 
    </div>
</div>

<!--Body-->
<div class="col-md-12">
<div class="container form1">
	<div class="container">
	<!---personal details-->
	<div class="card profile">
	    <div class="card-header">
	        <h5 >Personal Details</h5>
	   </div>
	    <div class="card-body">
	         <p>
		        <b>Name: </b> 
		        <?php echo htmlentities($dnn['firstname'], ENT_QUOTES, 'UTF-8'); ?> 
		        <?php echo htmlentities($dnn['lastname'], ENT_QUOTES, 'UTF-8'); ?>
	        </p>
	        <p>
	        	<b>Email: </b><?php echo htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8'); ?>
	    	</p>
	        <p>
	        	<b>Contact: </b><?php echo htmlentities($dnn['contact_number'], ENT_QUOTES, 'UTF-8'); ?>
	        </p>
	        <p>
	        	<b>Date of Birth: </b><?php echo htmlentities($dnn['date_of_birth'], ENT_QUOTES, 'UTF-8'); ?>
	        </p>
	        <p>
	        	<?php if($dnn['linkedin']!=''){?>
				<b>LinkedIn: </b> 
				<?php echo htmlentities($dnn['linkedin'], ENT_QUOTES, 'UTF-8');}else{
				echo '<style="display:none;">';}?>
			</p>
	        <p>
	        	<?php if($dnn['website']!=''){?>
				<b>Website/Portfolio: </b> 
				<?php echo htmlentities($dnn['website'], ENT_QUOTES, 'UTF-8');}else{
				echo '<style="display:none;">';}?>	
			</p>
	    </div>
	    <a href="edit_user.php" class="btn btn-primary ml-auto mr-4 mb-2">Edit</a>
	</div>

		<!---education details-->
	<?php
	  if(mysqli_num_rows($ed)>0){
		$edd = mysqli_fetch_array($ed);
	?>
	  	<div class="card profile">
	        <h5 class="card-header">Educational Background</h5> 
	    <div class="card-body">
	    	<p>
	        	<b>Number of GCSE passed: </b>
	        	<?php if($edd['gcse']!=''){ echo htmlentities($edd['gcse'], ENT_QUOTES, 'UTF-8');
	        	 	}else{
					echo " ";}?>
	        </p>
		    <p class="row">
				<span class="col-md-8">
					<b>Degree: </b>
		        	<?php echo htmlentities($edd['field'], ENT_QUOTES, 'UTF-8'); ?> 
		        	(<?php echo htmlentities($edd['degree_name'], ENT_QUOTES, 'UTF-8'); ?>)
				</span>
				<span class="col-md-4"> <b>From:</b>
					<?php echo htmlentities($edd['start_date'], ENT_QUOTES, 'UTF-8');?> <b>  to  </b> <?php echo htmlentities($edd['end_date'], ENT_QUOTES, 'UTF-8'); ?>
				</span>
		    </p>
		    <p>
		        <b>College/University: </b>
		        <?php echo htmlentities($edd['institution_name'], ENT_QUOTES, 'UTF-8'); ?>
			</p> 
	        <p>
	        	<b>Location: </b>
	        	<?php echo htmlentities($edd['state'], ENT_QUOTES, 'UTF-8');?>, 
	        	<?php echo htmlentities($edd['country'], ENT_QUOTES, 'UTF-8'); ?>
	        </p>
	    </div>
	    <a href="edit_educ.php" class="btn btn-primary ml-auto mr-4 mb-2">Edit</a>
	  </div>
	<?php
	  }
		else
		{
			echo ' <div class="container">
            	  	<div class="card profile">
            	  	    <h5 class="card-header">Educational Background</h5>
            	    <div class="card-body">
            	  	    <p class="mt-4">You have not entered any detail.</p>
            	  	    <a href="edit_educ.php" class="btn btn-primary mr-4 mb-2" style="float:right">Edit</a>
            	  	</div>
            	  	</div>
            	  	</div>';
		}
	?>
<!---experience details-->
	<?php
	  if(mysqli_num_rows($ex)>0){
		$exx = mysqli_fetch_array($ex);
	?>
	  	<div class="card profile">
	        <h5 class="card-header">Professional Background</h5> 
	    	<div class="card-body">
		    	<div>
			    	<p>
			        	<b>Profession: </b>
			        	<?php echo htmlentities($exx['profession'], ENT_QUOTES, 'UTF-8');?>
			        </p>
			        <p class="row">
				        <span class="col-md-8">
				        	<?php if($exx['qualification']!=''){?>
				        	<b>Qualifications: </b>
							<?php echo htmlentities($exx['qualification'], ENT_QUOTES, 'UTF-8');}else{
							echo '<style="display:none;">';}?>		
						</span>
				        <span class="col-md-4">
				        	<?php if($exx['acquired_date']!=''){?>
				        	<b>Level: </b>
							<?php echo htmlentities($exx['acquired_date'], ENT_QUOTES, 'UTF-8');}else{
							echo '<style="display:none;">';}?>	
						</span>
					</p>
				</div>

		        <div>
		         	<p><b><hr>Working Experience<hr></b></p>
			         	<div>
				        <p>
				        	<b>Job Title: </b>
				        	<?php echo htmlentities($exx['job_title'], ENT_QUOTES, 'UTF-8'); ?> 
				        </p>

				        <p class="row">
					        <span class="col-md-8">
					        	<b>Organization: </b>
								<?php echo htmlentities($exx['company_name'], ENT_QUOTES, 'UTF-8'); ?>
							</span>
					        <span class="col-md-4">
					        	<b>From </b>
								<?php echo htmlentities($exx['start'], ENT_QUOTES, 'UTF-8');?> <b> to </b> <?php echo htmlentities($exx['end'], ENT_QUOTES, 'UTF-8'); ?>
							</span>
						</p>
						<p>
							<b> Description: </b>
				            <?php echo htmlentities($exx['description'], ENT_QUOTES, 'UTF-8');?>
						</p>
					</div>
				</div>

				<div>
		         	<p><b><hr>Skills<hr></b></p>
		         	<p class="row">
		         		<span class="col-md-8">
		         			<b>Skill: </b>
							<?php echo htmlentities($exx['skills'], ENT_QUOTES, 'UTF-8'); ?>
						</span>
						<span class="col-md-4">
							<b>Level: </b>
							<?php echo htmlentities($exx['years_of_practice'], ENT_QUOTES, 'UTF-8');?>
						</span>
		        	</p>
			        <p>
			        	<?php if($exx['additional']!=''){?>
			        	<b>Additional: </b>
						<?php echo htmlentities($exx['additional'], ENT_QUOTES, 'UTF-8');}else{
						echo '<style="display:none;">';}?>		
					</p>
		       </div>
			</div>
			<a href="edit_exp.php" class="btn btn-primary ml-auto mr-4 mb-2">Edit</a>
		</div>

	<?php
	  }
		else
		{
			echo '<div class="container">
            	  	<div class="card profile">
            	  	    <h5 class="card-header">Professional Background</h5>
            	    <div class="card-body">
            	  	    <p class="mt-4">You have not entered any detail.</p>
            	  	<a href="edit_exp.php" class="btn btn-primary mr-4 mb-2" style="float:right">Edit</a>
            	  	</div>
            	  	</div>
            	  	</div>';
		}
	?>
	<a class="btn btn-primary mr-auto " style="margin:30px 50px;" href="printformat.php">Click to get Printable format</a>
	</div>
	
</div>
</div>
</div>
<?php
		
	}
	else
	{
		echo 'This user doesn\'t exist.';
	}
}
else
{
	echo 'The ID of this user is not defined.';
}
?>


</body>
</html>
