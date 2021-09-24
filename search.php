<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
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
<?php
$query1 = $_GET['a'];
$query2 = $_GET['b'];
$query3 = $_GET['c'];
$query4 = $_GET['d'];
$query5 = $_GET['e'];
$query6 = $_GET['f'];
$query7 = $_GET['g'];


	$sql = "Select * FROM education_detail JOIN experience_detail  ON user_email=reg_email
            	        JOIN user_account  ON email=reg_email
            	        WHERE profession LIKE '%".$query1."%' AND degree_name  LIKE '%".$query2."%' AND field  LIKE '%".$query3."%' AND gcse LIKE '%".$query4."%' AND qualification LIKE '%".$query5."%' AND skills LIKE '%".$query6."%' AND job_title LIKE '%".$query7."%'";
	$result = mysqli_query($con, $sql);
	$num_rows = mysqli_num_rows($result);
				
?>
				<p class="result-info container"><strong><?php echo $num_rows; ?></strong> Results Found</p>
				<?php
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)){
						
							$id = $row['id'];
							$email = $row['email'];
							$firstname = $row['firstname'];
							$lastname = $row['lastname'];
							$profession = $row['profession'];
							$degree_name = $row['degree_name'];
							$field = $row['field'];
							$gcse = $row['gcse'];
							$job_title = $row['job_title'];
							$skills = $row['skills'];
							$qualification = $row['qualification'];
							
							?>
							



				
<div class="container card">
<a class="results" href="read_user.php?id=<?php echo' '. $id .'' ?>">
	<div class="col-md-10"> 
		<?php echo '
		<p> <b>Name: </b> ' . $firstname. ' ' . $lastname. ' </p>
		<p> <b>Profession: </b> ' . $profession. '</p>
		<p> <b>Number of GCSE passed: </b> ' . $gcse. '</p>
		<p> <b>Degree: </b> ' . $field. ' (' . $degree_name. ')</p>
		<p> <b>Experience: </b> ' . $job_title. '</p>
		<p> <b>Skills: </b> ' . $skills. '</p>
		<p> <b>Qualifications: </b> ' . $qualification. '</p>
		'?>

								
</div>
</a>
<?php
		
	}
				    
}
else {
    ?>
	<div class="col-md-10"><?php echo 'no results found';?></div>					
	<?php
}
?> 
</div>
</body>
</html>


