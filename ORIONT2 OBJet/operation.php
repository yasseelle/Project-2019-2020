<?php
class compt {

public $sold=0;
 
function __construct ($c)
{
$this->sold =$c;
}
function ajout($a)
{
$this->sold+=$a;
}
function retrait($a)
{
$this->sold-=$a;
}
function afficher()
{
    echo 'votre sold et '.$this->sold;
}


}

$mc = new compt();
$a = $_POST('aa');
$b= $_POST('rr');
$mc->ajout($a);
$mc->retrait($b);
$mc->afficher();
/*if(isset($_POST))
{
    echo $_POST['aa'];
    echo $_POST['rr'];
}
else
{
    echo 'not ok';
}*/



?>