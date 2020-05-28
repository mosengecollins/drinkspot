
<?php

//echo "begin";

//include_once("config.php");
include_once("connect.php");




$password = $_POST['password'];
$idUser = $_POST['id'];
$tableName = 'login';


echo "password $password";


//$stmt = $conn->prepare('select * from ' .  $tableName . 'where id = $id and paswword1 = $password');
//$query = "select * from login where id=1 and password1 = 'service1'";
//$query = "select * from login where id=$id and password1 = '$password'";
$query = "select * from login where id=$idUser and password1 = ?";
$stmt = $conn->prepare($query);


$stmt->execute([$password]);

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($arr)
{
   print_r($arr);
//   header(Location:'../commands/');
//   header(Location:'http://www.google.com');
//   header('Location: http://www.google.com/');
//   header('Location: ../commands/index.php?id=$id');
   header('Location: ../commands/index.php?idUser='.$idUser);
}
else
   print ('false login');

?>
