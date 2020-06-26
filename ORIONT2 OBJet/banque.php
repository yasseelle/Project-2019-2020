<?php

class compt
{
    public $c =3000;
    public function ajout($a)
    {
        $this->c+=$a;
    }
    public function affciher()
    {
        echo '</br>';
        echo "sold est :".$this->c;
        echo '</br>';
    }

}
class sous_compt extends compt
{
   public $num_compt=22;
   
    
    public function affciher()
    {
        
        echo $this->num_compt;
        echo '</br>';
        echo $this->c;
        echo '</br>';
    }
    

}

$c1=new compt;
$c1->ajout(200);
$c1->affciher();
$sc1=new sous_compt;
$sc1->affciher();

?>