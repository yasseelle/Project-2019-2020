<?php

$T = array(6,3,2,5);

echo implode('*',$T);
echo '<br/>';
$v=array_slice($T,1,3);
echo implode('*',$v);
echo '<br/>';

$T2=array('blue','orange','vert','noir','maron','gris');

echo implode('*',array_splice($T2,3));

echo '<br/>';

echo implode('-',array_splice($T2,-2,1));

echo '<br/>';

echo implode('-',array_splice($T2,1,count($T2),'vert'));

echo '<br/>';

$T3=array(6,8,9,10,5,7);
$T4=array(6,9,5);
$T5=array(9,5,7);
$T6=array(6,12,6,4,8,12);
echo implode('-',array_diff($T3,$T4,$T5));
echo '<br/>';

echo implode('-',array_unique($T6));




?>