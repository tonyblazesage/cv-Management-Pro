<?php
include('config.php');
$oemail = '';
			if(isset($_POST['email'], $_POST['password']))
			{
				if(get_magic_quotes_gpc())
				{
					$oemail = stripslashes($_POST['email']);
					$email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
					$password = stripslashes($_POST['password']);
				}
				else
				{
					$email = mysqli_real_escape_string($con, $_POST['email']);
					$password = $_POST['password'];
				}
				$req = mysqli_query($con,'select password,id from user_account where email="'.$email.'"');
				$dn = mysqli_fetch_array($req);
				if($dn['password']==sha1($password) and mysqli_num_rows($req)>0)
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
				header('location: profile.php');
				}
				else
				{
					$form = true;
					$message = 'The username or password you entered are not good.';
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
				<?php
			}
		?> 
			<!DOCTYPE html>
			<html lang="en">
			<head>
			  <title>Sign in:CV-Pro</title>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="css/style.css">
			  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
			  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
			</head>

				<div>

					<div class="jumbotron" style="padding:15px;">
					    <nav class="navbar navbar-expand-sm">
					      <!-- Brand/logo -->
					        <a class="navbar-brand" href="#"><img src="images/CVpro_Logo.png" class="img-fluid" width='60' alt="" title=""></a>
					      
					      <!-- Links -->
					      <ul class="navbar-nav ml-auto list-group-horizontal">
					        <li class="nav-item">
					          <a href="register.php" class="nav-link" href="register.php">Register</a>
					        </li>
					        <li class="nav-item ">
					          <a class="nav-link active" href="#">Sign in</a>
					        </li>
					      </ul>
					    </nav>
					    <br>

					    <div class="brand text-center">
					      <h1>CV-Pro</h1>
					      <p>Get Hired</p> 
					    </div>
					</div>
				  

				    <div class="" id="form1">
				        <div class="col-md-5 form1">
				            <form action="sign-in.php" method="post">
				            <h3>Sign in</h3>
				          <div class="form-group">
				            <label for="email">Email address:</label>
				            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
				          </div>
				          <div class="form-group" >
				            <label for="pwd">Password:</label>
				            <section class="pwdeye input-group" id="pwdeye" type="text">
				                <input type="password" name="password" class="formpwd form-control" placeholder="Enter password" id="password" data-toggle="password" required>
				                <div class="input-group-prepend" onclick="myFunction()">
				                <span type="button" class="btn btn-secondary"> <i id="pwdi" class="fa fa-eye-slash"></i> </span>
				                </div>
				            </section>
				          </div>
				          <div class="form-group form-check">
				            <label class="form-check-label">
				              <input class="form-check-input" type="checkbox" name="memorize"> Remember me
				            </label>
				          </div>
				          <button type="submit" class="btn btn-primary">Submit</button>
				          <p style="clear:right; text-align: center;" >if you are new, please <a href="register.php">click here</a> to register</p>
				        </form>
				        </div>
				    </div>
				</div>    

<!-- bootstrap js -->
  <script src="javascript/control.js"></script>

</body>
</html>
