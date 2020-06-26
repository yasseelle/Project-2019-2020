<?php
$ligne=1;
$fp=fopen("Personne.csv","r");
while($data=fgetcsv($fp,1000,",")){
    $num=count($data);
    print'<br><strong>'.$ligne.': </strong>';
    $ligne++;
    for($i=0;$i<$num;$i++)
    {
        print $data[$i].' ';
    }
}

?>
 