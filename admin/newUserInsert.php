insert




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




//$tableName = 'login';

//$sql = " select * from " . $tableName . " where name = '" .  $name1 . "' and password1 = '" . $password1 . "'";

$sql = "insert into login (name, passwort) values( '?', '?')";


echo "sql $sql";

$statement = $dbh->prepare($sql);

echo "after prepre sql $sql";



$statement->execute(array['user2', 'user2']);

echo "after execute sql $sql";



/*
header('location:"newUser.php"');

*/


/*
$sth->execute();
echo "<br>aftter execute sql $sql";

//header('location:"newUser.php"');
*/



?>
