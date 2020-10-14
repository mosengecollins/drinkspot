<html>
<head>
<!--

<link href="listCommand.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css"><meta http-equiv="refresh" content="5">
-->


</head>

<body>


<?php

print("<h1> drinkspot </h1>");


print ("<h2> choose the table you serve </h2>");


//$get = $_GET;

//print ('get');
//print_r($get);


//$idUser = $_GET['idUser'];






if ($idUser > 0)
   ;
else
{
   $post = $_POST;
//   print_r($post);
   $idUser = $_POST['idUser'];

}

//if (!isset($_GET['id'])
 
//$waiter = "service2";

//echo "idUser $idUser";



$tableName = 'table_numbers';

//echo $tableName;

//echo "begin";

include_once("connect.php");
include_once("config.php");

$tableName = $_POST["tableName"];


//echo "tableName $tableName";


//include("selectUpdatetablenr.php");

include_once('selectUpdatetablenr.php');




//include_once("insertCommand.php");


?>
