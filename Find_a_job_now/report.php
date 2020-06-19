<?php
require 'dbh.php';
$job_reportedid= $_POST['REPORT'];
$job_id['id'];
$stmt = $con->prepare("UPDATE work set REPORT=REPORT+1 WHERE ID=$job_id");
if($stmt->execute())
{
    echo "Thanks for your report";
}
else
{
    "there is a problem try agi, later";
}
