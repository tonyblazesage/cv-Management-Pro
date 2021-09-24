<?php
include('config.php');

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
$dn2 = mysqli_num_rows(mysqli_query($con,'select id from experience_detail'));
$id = $dn2+1;

if(mysqli_query($con,'insert into experience_detail(id, reg_email, profession, qualification, acquired_date, job_title, company_name, location, start, end, description, skills, years_of_practice, additional, postdate) values ('.$id.', "'.$_SESSION['email'].'", "'.$profession.'", "'.$qualification.'", "'.$acquired_date.'", "'.$job_title.'", "'.$company_name.'", "'.$location.'", "'.$start.'", "'.$end.'", "'.$description.'", "'.$skills.'", "'.$years_of_practice.'", "'.$additional.'", "'.time().'")'))
{
$form = false;
$req = mysqli_query($con,'select email,id from user_account where email="'.$_SESSION['email'].'"');
				$dn = mysqli_fetch_array($req);
    	$_SESSION['userid'] = $dn['id'];
        // Page on which the user will be 
        // redirected 
        header ('location: profile.php'); 

}
else
{
$form = true;
$message = 'Please fill all fields try again.';
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
  <title>Experience:CV-Pro</title>
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
<div class="" style="padding:15px;">
    <?php include('navbar.php'); ?>
    <br>
</div>
<br>


<!--collapse experience group-->

<div class="col-sm-7  form1">
    <h3 class="text-center">Experience Details</h3>
    <form class=" g-4" action="experience.php" method="post" id="buyerForm">
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
                        <input type="text" class="form-control" id="profession" placeholder="Eg: Software Developer" name="profession" >
                    </div>
                    <section id="wrapper">
                    <div id="buyerForm" class="row">
                        <div class="col-md-8 form-group">
                            <label for="jobtitle" class="form-label">Qualification: </label>
                            <input type="text" class="form-control" id="qualification" placeholder="Eg: Association of Chartered Certified Accountants (ACCA)" name="qualification" >
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="startdate" class="form-label">Date: </label>
                            <input class="form-control" type="date" id="acquired_date" name="acquired_date">
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
                            <input type="text" class="form-control" id="jobtitle" placeholder="Eg: Software Developer" name="job_title">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="employ" class="form-label">Employer/Company: </label>
                            <input type="text" class="form-control" id="employ" name="company_name">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="country" class="form-label">Country: </label>
                            <input type="text" class="form-control" id="country" placeholder="Eg:London, UK" name="location">
                        </div>
                        <div class="col-6 form-group">
                            <label for="startdate" class="form-label">Start Date: </label>
                            <input class="form-control" type="date" id="startdate" name="start">
                        </div>
                            <div class="col-6 form-group">
                                <label for="enddate" class="form-label">End Date: </label>
                                <input class="form-control" type="date" id="enddate" name="end">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="respond" class="form-label">Responsibilities:</label>
                                <textarea class="form-control" rows="5" id="respond" name="description"></textarea>
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
                                <input type="text" class="form-control" id="skills" placeholder="Eg: Adobe Photoshop" name="skills">
                            </div>
                            <div class="col-md-4 form-group">
                                    <label for="level" class="form-label">Years of experience</label>
                                    <select name="years_of_practice" class="form-control">
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
                        <textarea class="form-control" rows="5" id="respond" name="additional"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
    <button type="submit" name="submit" class="btn btn-primary ml-auto mr-4" >Next <i class='fa fa-angle-right'></i></button>
    </div>
</form>
        
</div>

</body>

</html>
<?php
}
?>