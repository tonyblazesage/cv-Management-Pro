<?php
include('config.php');
	if(isset($_SESSION['email']))
	{

if(isset($_POST['degree_name'], $_POST['field'], $_POST['institution_name'], $_POST['state'], $_POST['country'], $_POST['start_date'], $_POST['end_date'], $_POST['gcse'], $_POST['languages'], $_POST['language_level']))
{
if(get_magic_quotes_gpc())
{
$_POST['degree_name'] = stripslashes($_POST['degree_name']);
$_POST['field'] = stripslashes($_POST['field']);
$_POST['institution_name'] = stripslashes($_POST['institution_name']);
$_POST['state'] = stripslashes($_POST['state']);
$_POST['country'] = stripslashes($_POST['country']);
$_POST['start_date'] = stripslashes($_POST['start_date']);
$_POST['end_date'] = stripslashes($_POST['end_date']);
$_POST['gcse'] = stripslashes($_POST['gcse']);
$_POST['languages'] = stripslashes($_POST['languages']);
$_POST['language_level'] = stripslashes($_POST['language_level']);
}


$degree_name = mysqli_real_escape_string($con,$_POST['degree_name']);
$field = mysqli_real_escape_string($con,$_POST['field']);
$institution_name = mysqli_real_escape_string($con,$_POST['institution_name']);
$state = mysqli_real_escape_string($con,$_POST['state']);
$country = mysqli_real_escape_string($con,$_POST['country']);
$start_date = mysqli_real_escape_string($con,$_POST['start_date']);
$end_date = mysqli_real_escape_string($con,$_POST['end_date']);
$gcse = mysqli_real_escape_string($con,$_POST['gcse']);
$languages = mysqli_real_escape_string($con,$_POST['languages']);
$language_level = mysqli_real_escape_string($con,$_POST['language_level']);
$dn2 = mysqli_num_rows(mysqli_query($con,'select id from education_detail'));
$id = $dn2+1;
if(mysqli_query($con,'insert into education_detail(id, user_email, degree_name, field, institution_name, state, country, start_date, end_date, gcse, languages, language_level, postdate) values ('.$id.', "'.$_SESSION['email'].'", "'.$degree_name.'", "'.$field.'", "'.$institution_name.'", "'.$state.'", "'.$country.'", "'.$start_date.'", "'.$end_date.'", "'.$gcse.'", "'.$languages.'", "'.$language_level.'", "'.time().'")'))
{
$form = false;
$req = mysqli_query($con,'select email,id from user_account where email="'.$_SESSION['email'].'"');
				$dn = mysqli_fetch_array($req);
    	$_SESSION['userid'] = $dn['id'];
        // Page on which the user will be 
        // redirected 
        header ('location: experience.php'); 
        
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
<head>
  <title>Education:CV-Pro</title>
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

<<!--Nav bar-->
<div class="" style="padding:15px;">
    <?php include('navbar.php'); ?>
    <br>
</div>
<br>


<!--collapse experience group-->

<div class="col-sm-7  form1">
    <h3 class="text-center">Education Details</h3>
    <form class=" g-4" action="education.php" method="post" id="buyerForm">
        <div id="accordion">
        <div class="card">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseOne">
                <div class="card-header">Education History</div>
            </a>
            
            <div id="collapseOne" class="collapse  show" data-parent="#accordion">
                <div class="card-body">
                    <div class=" form-inline form-group container p-3">
                            <label for="gcse" class="form-label mr-sm-2">Number of GCSE Passed: </label>
                            <input type="text" class="form-control col-md-5" id="gcse" name="gcse">
                        </div>
                    <div class="container p-3 row" id="wrapper" >
                            <div class="col-md-6 form-group">
                                <label for="degree_name" class="form-label">Level of Education</label>
                                <select name="degree_name" class="form-control">
                                    <option value="">Select an Option</option>
                                    <option value="None">None</option>
                                    <option value="PhD">PhD</option>
                                    <option value="Masters">Masters</option>
                                    <option value="Bachelors">Bachelors</option>
                                    <option value="A-level or Equivalent">A-level or Equivalent</option>
                                    <option value="GCSE or Equivalent">GCSE or Equivalent</option>
                                    <option value="Diploma of Higher Education">Diploma of Higher Education</option>
                                    <option value="Certificate of Higher Education">Certificate of Higher Education</option>
                                    <option value="Others">Others</option>
                                  </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="field" class="form-label">Field of Study </label>
                                <input type="text" class="form-control" id="field" name="field">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="school" class="form-label">University or College </label>
                                <input type="text" class="form-control" id="school" placeholder="Eg: Kingston University" name="institution_name" >
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="country" class="form-label">Country: </label>
                                <input type="text" class="form-control" id="country" placeholder="Eg:UK" name="country">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="state" class="form-label">State/City: </label>
                                <input type="text" class="form-control" id="state" placeholder="Eg: London " name="state">
                            </div>
                            <div class="col-6 form-group">
                                <label for="startdate" class="form-label">Start Date: </label>
                                <input class="form-control" type="date" id="start_date" name="start_date">
                            </div>
                            <div class="col-6 form-group">
                                <label for="enddate" class="form-label">End Date: </label>
                                <input class="form-control" type="date" id="end_date" name="end_date">
                            </div>
                            <div class="mt-4">
                                <a  id="testButton" class="btn"><i class='fa fa-plus-square'></i> Add </a>
                            </div>
                    </div>       
                </div>
            </div>
        </div>
                <div class="card" style="display:none;">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                <div class="card-header">
                    Languages
                    </div>
                </a>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                        <section class="row" id="wrapper">
                        <div class="col-md-8 form-group">
                                <label for="lang" class="form-label">Language: </label>
                                <input type="text" class="form-control" id="lang" placeholder="Eg: French" name="languages">
                        </div>
                        <div class="col-md-4 form-group">
                                <label for="lvl" class="form-label">Level</label>
                                <select name="language_level" class="form-control">
                                    <option value="">Select Level</option>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Fluent">Fluent</option>
                                    <option value="Expert">Expert</option>
                                  </select>
                        </div>
                        </section>
                        <div class="mt-4">
                            <a type="submit" id="testButton" class="btn"><i class='fa fa-plus-square'></i> Add </a>
                        </div>
                     </div>
            </div>
        </div>
 </div>
   <div class="container mt-4">
    <button type="submit" name="submit" class="btn btn-primary ml-auto mr-4" >Next <i class='fa fa-angle-right'></i></button>
    </div>
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
?>
