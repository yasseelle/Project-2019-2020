<?php
require 'dbh.php';
$categoryname=$_POST['categoryname'];
$category = "%$categoryname%";
if($category == "%all%")
{
    $stmt = $con->prepare("SELECT wallpaper_link from wallpaper ORDER BY RAND()");
    $stmt->execute();
    $stmt->bind_result($wallpaper_link);
    $Photos= array();
    while($stmt->fetch())
    {
        $temp = array();
        $temp['wallpaper_link']=$wallpaper_link;
     
        array_push($Photos,$temp);
    }
    echo json_encode($Photos, JSON_UNESCAPED_UNICODE);
}
else
{

$sql="SELECT wallpaper_link from wallpaper WHERE wallpaper_link LIKE ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s",$category);
$stmt->execute();
$stmt->bind_result($wallpaper_link);
$Photos= array();
while($stmt->fetch())
{
    $temp = array();
    $temp['wallpaper_link']=$wallpaper_link;
 
    array_push($Photos,$temp);
}
echo json_encode($Photos, JSON_UNESCAPED_UNICODE);
}