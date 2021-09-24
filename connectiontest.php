<?php 
//Database connection (localhost,username,password,databasename)

$conn = mysqli_connect("localhost","id16564570_devops","t<0ggPBjfWXTcgLt","id16564570_cv_management");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
// Print connection successful if no error
{
echo "Connection Successful </br>";
}
?>