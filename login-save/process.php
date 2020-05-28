<html><body>
<?php
$quantity = $_POST['quantity'];
$item = $_POST['item'];
$price = $_POST['price'];


$total= $price * $quantity;

echo "You ordered ". $quantity . " " . $item . " " . $total . " <br />";



echo $total . "Beers" .  " " . "<br />";

echo "Thank you for ordering from Drinking Spot!";


?>
</body></html>

