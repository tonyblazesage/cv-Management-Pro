<?php
include('config.php');
if(isset($_SESSION['email']))
{
if(isset($_POST['profession'], $_POST['qualification'], $_POST['acquired_date'], $_POST['job_title'], $_POST['company_name'], $_POST['location'], $_POST['start'], $_POST['end'], $_POST['description'], $_POST['skills'], $_POST['years_of_practice'], $_POST['additional']))
{
if(get_magic_quotes_gpc())
{
$_POST['profession'] = stripslashes($_POST['profession']);
$_POST['qualification'] = stripslashes($_POST['qualification']);
$_POST['acquired_date'] = stripslashes($_POST['acquired_date']);
$_POST['job_title'] = stripslashes($_POST['job_title']);
$_POST['company_name'] = stripslashes($_POST['company_name']);
$_POST['location'] = stripslashes($_POST['location']);
$_POST['start'] = stripslashes($_POST['start']);
$_POST['end'] = stripslashes($_POST['end']);
$_POST['description'] = stripslashes($_POST['description']);
$_POST['skills'] = stripslashes($_POST['skills']);
$_POST['years_of_practice'] = stripslashes($_POST['years_of_practice']);
$_POST['additional'] = stripslashes($_POST['additional']);
}

$profession= mysqli_real_escape_string($con,$_POST['profession']);
$qualification = mysqli_real_escape_string($con,$_POST['qualification']);
$acquired_date = mysqli_real_escape_string($con,$_POST['acquired_date']);
$job_title = mysqli_real_escape_string($con,$_POST['job_title']);
$company_name = mysqli_real_escape_string($con,$_POST['company_name']);
$location = mysqli_real_escape_string($con,$_POST['location']);
$start = mysqli_real_escape_string($con,$_POST['start']);
$end = mysqli_real_escape_string($con,$_POST['end']);
$description = mysqli_real_escape_string($con,$_POST['description']);
$skills = mysqli_real_escape_string($con,$_POST['skills']);
$years_of_practice = mysqli_real_escape_string($con,$_POST['years_of_practice']);
$additional = mysqli_real_escape_string($con,$_POST['additional']);

if(mysqli_query($con,'update experience_detail set reg_email="'.$_SESSION['email'].'", profession="'.$profession.'", qualification="'.$qualification.'", acquired_date="'.$acquired_date.'", job_title="'.$job_title.'", company_name="'.$company_name.'", location="'.$location.'", start="'.$start.'", end="'.$end.'", description="'.$description.'", skills="'.$skills.'", years_of_practice="'.$years_of_practice.'", additional="'.$additional.'" where id="'.mysqli_real_escape_string($con, $_SESSION['userid']).'"'))
{										
//important

                header ('location: profile.php'); 
			}
			else
			{
				$form = true;
				$message = 'Please fill all fields and try again.';
			}
		}
	else
	{
	$form = true;
	}
	if($form)
	{
	if(isset($message))
	{
	echo '<div class="message bg-warning">'.$message.'</div>';
	}

	if(isset(
		$_POST['profession'], $_POST['qualification'], $_POST['acquired_date'], $_POST['job_title'], $_POST['company_name'], $_POST['location'], $_POST['start'], $_POST['end'], $_POST['description'], $_POST['skills'], $_POST['years_of_practice'], $_POST['additional']
	))
	{
		$profession = htmlentities($_POST['profession'], ENT_QUOTES, 'UTF-8');
		$qualification = htmlentities($_POST['qualification'], ENT_QUOTES, 'UTF-8');
		$acquired_date = htmlentities($_POST['acquired_date'], ENT_QUOTES, 'UTF-8');
		$job_title = htmlentities($_POST['job_title'], ENT_QUOTES, 'UTF-8');
		$company_name = htmlentities($_POST['company_name'], ENT_QUOTES, 'UTF-8');
		$location = htmlentities($_POST['location'], ENT_QUOTES, 'UTF-8');
		$start = htmlentities($_POST['start'], ENT_QUOTES, 'UTF-8');
		$end = htmlentities($_POST['end'], ENT_QUOTES, 'UTF-8');
		$description = htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8');
		$skills = htmlentities($_POST['skills'], ENT_QUOTES, 'UTF-8');
		$years_of_practice = htmlentities($_POST['years_of_practice'], ENT_QUOTES, 'UTF-8');
		$additional = htmlentities($_POST['additional'], ENT_QUOTES, 'UTF-8');
	}
	else
	{
		$dn2 = mysqli_fetch_array(mysqli_query($con,'select * from experience_detail where reg_email="'.$_SESSION['email'].'"'));
											//no update
		$profession = htmlentities($dn2['profession'], ENT_QUOTES, 'UTF-8');
		$qualification = htmlentities($dn2['qualification'], ENT_QUOTES, 'UTF-8');
		$acquired_date = htmlentities($dn2['acquired_date'], ENT_QUOTES, 'UTF-8');
		$job_title = htmlentities($dn2['job_title'], ENT_QUOTES, 'UTF-8');
		$company_name = htmlentities($dn2['company_name'], ENT_QUOTES, 'UTF-8');
		$location = htmlentities($dn2['location'], ENT_QUOTES, 'UTF-8');
		$start = htmlentities($dn2['start'], ENT_QUOTES, 'UTF-8');
		$end = htmlentities($dn2['end'], ENT_QUOTES, 'UTF-8');
		$description = htmlentities($dn2['description'], ENT_QUOTES, 'UTF-8');
		$skills = htmlentities($dn2['skills'], ENT_QUOTES, 'UTF-8');
		$years_of_practice = htmlentities($dn2['years_of_practice'], ENT_QUOTES, 'UTF-8');
		$additional = htmlentities($dn2['additional'], ENT_QUOTES, 'UTF-8');
	}
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Edit_Experience Details:CV-Pro</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<!--body-->

	<body>

<!--Nav bar-->
<!--Nav bar-->
<div class="" style="padding:15px;">
    <?php include('navbar.php'); ?>
    <br>
</div>
<br>

<!--collapse experience group-->

<div class="col-sm-7  form1">
    <h3 class="text-center">Experience Details</h3>
    <form class=" g-4" action="edit_exp.php" method="post" id="buyerForm">
    <div id="accordion">
        <div class="card">
                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    <div class="card-header"> 
                    Professional Summary
                     </div>
                </a>
            <div id="collapseOne" class="collapse show" data-parent="#accordion" m-3>
                <div class="card-body">
                    <div class=" form-group">
                        <label for="jobtitle" class="form-label">Profession: </label>
                        <input type="text" class="form-control" id="profession" placeholder="Eg: Software Developer" name="profession" value="<?php echo $profession; ?>" >
                    </div>
                    <section id="wrapper">
                    <div id="buyerForm" class="row">
                        <div class="col-md-8 form-group">
                            <label for="jobtitle" class="form-label">Qualification: </label>
                            <input type="text" class="form-control" id="qualification" placeholder="Eg: Association of Chartered Certified Accountants (ACCA)" name="qualification" value="<?php echo $qualification; ?>" >
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="startdate" class="form-label">Date: </label>
                            <input class="form-control" type="date" id="acquired_date" name="acquired_date" value="<?php echo $acquired_date; ?>" >
                        </div>
                    </div>
                    </section>
                    <div class="mt-4">
                        <a type="submit" id="testButton" class="btn"><i class='fa fa-plus-square'></i> Add </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                <div class="card-header">Work Experience</div>
                </a>
            
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body" id="wrapper">
                    <div class="container p-3 row" >
                        <div class="col-md-6 form-group">
                            <label for="jobtitle" class="form-label">Job title: </label>
                            <input type="text" class="form-control" id="jobtitle" placeholder="Eg: Software Developer" name="job_title" value="<?php echo $job_title; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="employ" class="form-label">Employer/Company: </label>
                            <input type="text" class="form-control" id="employ" name="company_name" value="<?php echo $company_name; ?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="country" class="form-label">Country: </label>
                            <input type="text" class="form-control" id="country" placeholder="Eg:London, UK" name="location" value="<?php echo $location; ?>">
                        </div>
                        <div class="col-6 form-group">
                            <label for="startdate" class="form-label">Start Date: </label>
                            <input class="form-control" type="date" id="startdate" name="start" value="<?php echo $start; ?>">
                        </div>
                            <div class="col-6 form-group">
                                <label for="enddate" class="form-label">End Date: </label>
                                <input class="form-control" type="date" id="enddate" name="end" value="<?php echo $end; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="respond" class="form-label">Responsibilities:</label>
                                <textarea class="form-control" rows="5" id="respond" name="description" value="<?php echo $description; ?>"><?php echo $description; ?></textarea>
                            </div>
                            <div class="mt-4">
                                <a  id="testButton" class="btn"><i class='fa fa-plus-square'></i> Add </a>
                            </div>
                        </div>       
                    </div>
                </div>
            </div>
            <div class="card">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                <div class="card-header">
                        Skills
                </div>
                </a>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <section  id="wrapper">
                            <div id="buyerForm" class="row">
                            <div class="col-md-8 form-group">
                                <label for="skill" class="form-label">Skills* </label>
                                <input type="text" class="form-control" id="skills" placeholder="Eg: Adobe Photoshop" name="skills" value="<?php echo $skills; ?>">
                            </div>
                            <div class="col-md-4 form-group">
                                    <label for="level" class="form-label">Years of experience</label>
                                    <select name="years_of_practice" class="form-control">
                                    	<option value="<?php echo $years_of_practice; ?>"><?php echo $years_of_practice; ?></option>
                                        <option>Select</option>
                                        <option value="< 1 year">< 1 year</option>
                                        <option value="1-2 years">1-2 years</option>
                                        <option value="2-3 years">2-3 years</option>
                                        <option value="3-4 years">3-4 years</option>
                                        <option value="4-5 years">4-5 years</option>
                                        <option value="> 5 years">> 5 years</option>
                                      </select>
                            </div>
                            </div>
                        </section>
                        <div class="mt-4">
                            <a type="submit" id="testButton" class="btn"><i class='fa fa-plus-square'></i> Add </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                <div class="card-header">
                    Additional Information
                    </div>
                </a>
            <div id="collapseFour" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <div class="col-md-12 form-group">
                        <label for="addition" class="form-label">Eg. Certificates, Licences or Hobbies... </label>
                        <textarea class="form-control" rows="5" id="respond" name="additional" value="<?php echo $additional; ?>" ><?php echo $additional; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
    <button type="submit" name="submit" class="btn btn-primary ml-auto mr-4" >Update <i class='fa fa-angle-right'></i></button>
    </div>
</form>
</div>        

</body>


	</html>

	<?php
}
}
else
{
?>
<?php include 'sign-in.php';?>
<?php
}