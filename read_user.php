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
<body>


<?php
if(isset($_GET['id']))
{
    $id=intval($_GET['id']);
	$dn = mysqli_query($con, 'SELECT * FROM user_account WHERE id="'.$_GET['id'].'" ');
	$ed = mysqli_query($con,'SELECT * FROM education_detail  ');
	$ex = mysqli_query($con,'SELECT * FROM experience_detail ');
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
<br>
<!--Body-->
<div class="col-md-12">
<div class="container form1">
	<div class="container">
	<!---personal details-->
	<div class="card profile">
	        <h5 class="card-header">Personal Details</h5> 
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
	</div>
</div>
		<!---education details-->
	<?php
	  if(mysqli_num_rows($ed)>0){
		$edd = mysqli_fetch_array($ed);
	?>
	<div class="container">
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
	        	<?php echo htmlentities($edd['state'], ENT_QUOTES, 'UTF-8'); ?>, 
	        	<?php echo htmlentities($edd['country'], ENT_QUOTES, 'UTF-8'); ?>
	        </p>
	    </div>
	  </div>
	<?php
	  }
		else
		{
			echo 'You have not entered any detail.';
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
		</div>

	<?php
	  }
		else
		{
			echo 'You have not entered any detail.';
		}
	?>
	</div>
	<button class="btn btn-primary ml-auto" style="margin:30px 100px;" onclick="window.print()">Print</button>
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
