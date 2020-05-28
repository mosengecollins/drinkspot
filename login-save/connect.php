
<?php



/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=drinking_spot;host=127.0.0.1';
$user = 'drinking_spot';
$password = 'password1';


try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

echo "connection successful";


?>
