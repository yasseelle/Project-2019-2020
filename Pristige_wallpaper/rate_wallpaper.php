<?php
require 'dbh.php';
$wallpaperid= $_POST['wallpaperid'];
$increment = 1;
$sql = "UPDATE wallpaper SET wallpaper_down_num = wallpaper_down_num+ ? WHERE wallpaper_link LIKE ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("is",$increment,$wallpaperid);
$stmt->execute();
if($stmt->execute())
{
    echo "1 Heart = Much Love ";
}