

<?php

echo "begin<br />";


$name1 = $_GET['name'];
$password1 = $_GET['password'];


echo "name $name1 password $password1<br>";






$dsn = 'mysql:dbname=drinking_spot;host=127.0.0.1';

$user = 'drinking_spot';
$password = 'password1';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

echo "connection successful";




$tableName = 'login';

$sql = " select * from " . $tableName . " where name = '" .  $name1 . "' and password1 = '" . $password1 . "'";

//$sql = " select * from login where name = 'customer1' and password1 = 'customer1'";

//$sql = " select * from login";

echo "sql $sql";

$sth = $dbh->prepare($sql);

$sth->execute();
echo "<br>aftter execute sql $sql";

//$result = $sth->fetchPDO::FETCH_ASSOC);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

echo "<br>aftter fetch sql $sql";


print_r($result);



echo "<br>sql $sql";

//$number_of_rows = $result->fetchColumn(); 
$row_count = $sth->rowCount();
//$row_count = $dbh->rowCount();
echo "<br>number rows $row_count<br>";

/*

echo "<br>result $result";

while ($result)
{

   foreach($result as $key=>$value) {
      print ($key);
      print ($value);

   } 
}

*/
//exit()

if ($row_count < 1 )
   //echo "<br><1" ;
   header('location:login.php');
else
   //echo "<br>>0"; 
   header('location:new_day.php');







?>



