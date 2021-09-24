<?php
//This page let users register
include('config.php');

if(isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['contact_number'], $_POST['date_of_birth'], $_POST['gender'], $_POST['city'], $_POST['country'], $_POST['postcode'], $_POST['linkedin'], $_POST['website']) and $_POST['email']!='')
{
if(get_magic_quotes_gpc())
{
$_POST['firstname'] = stripslashes($_POST['firstname']);
$_POST['lastname'] = stripslashes($_POST['lastname']);
$_POST['email'] = stripslashes($_POST['email']);
$_POST['password'] = stripslashes($_POST['password']);
$_POST['contact_number'] = stripslashes($_POST['contact_number']);
$_POST['date_of_birth'] = stripslashes($_POST['date_of_birth']);
$_POST['gender'] = stripslashes($_POST['gender']);
$_POST['city'] = stripslashes($_POST['city']);
$_POST['country'] = stripslashes($_POST['country']);
$_POST['postcode'] = stripslashes($_POST['postcode']);
$_POST['linkedin'] = stripslashes($_POST['linkedin']);
$_POST['website'] = stripslashes($_POST['website']);
}

if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
{
$firstname = mysqli_real_escape_string($con,$_POST['firstname']);
$lastname = mysqli_real_escape_string($con,$_POST['lastname']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,sha1($_POST['password']));
$contact_number = mysqli_real_escape_string($con,$_POST['contact_number']);
$date_of_birth = mysqli_real_escape_string($con,$_POST['date_of_birth']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$city = mysqli_real_escape_string($con,$_POST['city']);
$country = mysqli_real_escape_string($con,$_POST['country']);
$postcode = mysqli_real_escape_string($con,$_POST['postcode']);
$linkedin = mysqli_real_escape_string($con,$_POST['linkedin']);
$website = mysqli_real_escape_string($con,$_POST['website']);
$dn = mysqli_num_rows(mysqli_query($con,'select id from user_account where email="'.$email.'"'));
if($dn==0)
{
$dn2 = mysqli_num_rows(mysqli_query($con,'select id from user_account'));
$id = $dn2+1;
if(mysqli_query($con,'insert into user_account(id, firstname, lastname, email, password, contact_number, date_of_birth, gender, city, country, postcode, linkedin, website, registration_date) values ('.$id.', "'.$firstname.'", "'.$lastname.'", "'.$email.'", "'.$password.'", "'.$contact_number.'", "'.$date_of_birth.'", "'.$gender.'", "'.$city.'", "'.$country.'", "'.$postcode.'", "'.$linkedin.'", "'.$website.'", "'.time().'")'))
{
$form = false;
	$_SESSION['email'] = $_POST['email'];
					$_SESSION['userid'] = $dn['id'];
					if(isset($_POST['memorize']) and $_POST['memorize']=='yes')
					{
						$one_year = time()+(60*60*24*365);
						setcookie('email', $_POST['email'], $one_year);
						setcookie('password', sha1($password), $one_year);
					}

        header ('location: education.php'); 

}
else
{
$form = true;
$message = 'An error occurred during the registration process, please try again.';
}
}
else
{
$form = true;
$message = 'This email already exists.';
}
}
else
{
$form = true;
$message = 'The email you typed is not valid.';
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
  <title>Register:CV-Pro</title>
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

<body >

<div class="jumbotron" style="padding:15px;">
    <nav class="navbar navbar-expand-sm">
      <!-- Brand/logo -->
        <a class="navbar-brand" href="index.php"><img src="images/CVpro_Logo.png" class="img-fluid" width='60' alt="" title=""></a>
      
      <!-- Links -->
      <ul class="navbar-nav ml-auto list-group-horizontal">
        <li class="nav-item">
          <a class="nav-link active" href="#">Register</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="sign-in.php">Sign in</a>
        </li>
      </ul>
    </nav>
    <br>

    <div class="brand text-center">
      <h1>CV-Pro</h1>
      <p>Get Hired</p> 
    </div>
</div>

  <!--Header -->
  <header>
  </header>


  <!-- form group-->
  <div class="col-sm-7  form1">
      <h3 class="text-center mt-3">Personal Details</h3>
    <div class="card" style="padding: 20px;">
    <form class="row g-4  " action="register.php" method="post">
      <div class="col-md-6 form-group">
        <label for="firstName" class="form-label">First Name*</label>
        <input type="name" class="form-control" id="firstName" name="firstname" required>
      </div>
      <div class="col-md-6 form-group">
        <label for="LastName" class="form-label">Last Name</label>
        <input type="name" class="form-control" id="LastName" name="lastname">
      </div>
      <div class="col-md-6 form-group">
        <label for="email" class="form-label">Email*</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="col-md-6 form-group">
        <label for="password" class="form-label">Password*</label>
        <section class="pwdeye input-group" id="pwdeye" type="text">
        <input type="password" class=" form-control" placeholder="Enter password" id="password" name="password" data-toggle="password" required>
                <div class="input-group-prepend" onclick="myFunction()">
                <span type="button" class="btn btn-secondary"> <i id="pwdi" class="fa fa-eye-slash"></i> </span>
                </div>
                </section>
      </div>
      <div class="col-md-6 form-group">
        <label for="contact_number" class="form-label">Phone number</label>
        <input class="form-control" type="text" id="contact_number" name="contact_number">
      </div>
      <div class="col-md-3 form-group">
        <label for="date_of_birth" class="form-label">Date of birth</label>
        <input class="form-control" type="date" id="date_of_birth" name="date_of_birth">
      </div>
      <div class="col-md-3 form-group">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-control" id="gender" name="gender">
            <option value="">Select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="col-md-6 form-group">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city">
      </div>
      <div class="col-md-4 form-group">
        <label for="inputCountry" class="form-label">country</label>
        <input type="text" class="form-control" id="inputCountry" name="country" >
      </div>
      <div class="col-md-2 form-group">
        <label for="inputZip" class="form-label">Post Code</label>
        <input type="text" class="form-control" id="inputZip" name="postcode">
      </div>
      <div class="col-md-6 form-group">
        <label for="linkedIn" class="form-label">LinkedIn</label>
        <input type="text" class="form-control" id="linkedIn" name="linkedin">
      </div>
      <div class="col-md-6 form-group">
        <label for="website" class="form-label">website</label>
        <input type="text" class="form-control" id="website" name="website">
      </div>
       <button type="submit" name="submit" class="btn btn-primary ml-auto mr-4">Next <i class='fa fa-angle-right'></i></button>
    </form>
    </div>
  </div>


 <script src="javascript/control.js"></script>

</body>

</html>
<?php
}
?>