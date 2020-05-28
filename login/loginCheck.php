<?php

$id = $_POST["id"];


echo "id $id";

print ("<form action='checkPassword.php' method='post' >");

print ("put your password : "); 
print ("<input type='password' name='password' placeholder='put your password' />");
print ("<input type='hidden' name='id' value=$id />");
print ("<input type='submit' value='check' />");
print ("</form>");



?>









