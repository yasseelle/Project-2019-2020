<?php

$T = array('fiére','content','courageux','gai');
print_r($T);
echo '<br/>';
echo $T[2];
echo '<br/>';
if(in_array('gaie',$T))
{
    echo'exist';

}
else
{
    echo"dosn't exist";
}
echo '<br/>';
echo array_search('content',$T);
echo '<br/>';
$cp = array_count_values($T);
print_r($T);
echo '<br/>';
echo $cp['content'];
echo '<br/>';
print_r ($cp);
echo '<br/>';
echo count($T);
echo '<br/>';
for ($i=0; $i < count($T); $i++) {

  
    echo 'la valeur de lindice'.'{'.$i.'} et '.$T[$i]." <br/> " ;
    asort($T);
}
echo '<br/>';
foreach ($T as $cle => $value) {
    
    echo "=>"." ".$value." " ;
    
}


?>