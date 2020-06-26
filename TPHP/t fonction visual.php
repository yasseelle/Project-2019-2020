<?php 
$nombre = 65;

echo base_convert($nombre,10,2);
echo'<br/>';
echo base_convert($nombre,10,16);
echo'<br/>';


echo "date <br/>";

echo '<h2>'.date('d-m-Y').'</h2>';
echo'<br/>';
echo '<h3>'.date('h:i:s').'</h3>';
echo'<br/>';
echo '<h4>'.date('i').'</h4>';
?>