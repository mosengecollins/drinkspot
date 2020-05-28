<?php

echo "begin<br />";


$name = $_GET['name'];
$password1 = $_GET['password'];


echo "name $name password $password1<br>";_



// Connect to a MySQL database using driver invocation 
$dsn = 'mysql:dbname=drinking_spot;host=127.0.0.1';
$user = 'drinking_spot';
$password = 'password1';

/*
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

echo "connection successful";

*/





//include_once("connect.php");

/*
$tableName = 'login';



$sqlAll = " select * from " . $tableName where name ;


echo "sqlall = $sqlAll";
*/

/*
//$sth = $dbh->prepare("SHOW COLUMNS FROM student");
//$sth = $dbh->prepare("select id, firstName, lastName FROM student");
$sth = $dbh->prepare($sqlall);

$sth->execute();

$result = $sth->fetch(PDO::FETCH_ASSOC);
while ($result)
{
   print ("PDO::FETCH_ASSOC: ");

echo "<br />end";
*/
?>



<?php
<form action="process.php" method="post">
<select name="item">

<input name="quantity" type="text" />


?>
