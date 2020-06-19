<?php
require 'dbh.php';
$id=$_POST['id'];
$stmt = $con->prepare("DELETE  FROM work WHERE ID=$id");
if($stmt->execute())
{
    echo "Thank you ^-^";
}
else
{
    echo "Error ^-^";
}