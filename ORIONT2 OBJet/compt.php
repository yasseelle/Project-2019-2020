<?php

class Mcompt 
{

public $sold=0;

function ajout ($a)
{
   $this->sold+=$a;
}
function retrait ($a)
{
   $this->sold-=$a;
}

}
$mc =new Mcompt(;
$mc -> sold=300;
//echo ' mon sold et '.$mc->sold;
$mc ->ajout(300);
echo ' mon sold et '.$mc->this->sold;


?>