<?php
require 'dbh.php';

$stmt = $con->prepare("SELECT wallpaper_link from wallpaper ORDER BY wallpaper_down_num DESC");
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