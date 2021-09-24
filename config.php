<?php
/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the forum can
work correctly.
******************************************************/

//We log to the DataBase

//$conn = mysqli_connect("dbhost","dbuser","dbpassword","dbname");

$con = mysqli_connect('localhost', 'id16564570_devops', 't<0ggPBjfWXTcgLt','id16564570_cv_management');
//mysqli_select_db('dbname');

//Username of the Administrator
$admin=array('k1234567@kingston.ac.uk','steph@gmail.com');

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home Page
$url_home = 'index.php';

//Design Name
$design = 'default';


/******************************************************
----------------------Initialization-------------------
******************************************************/
include('init.php');
?>