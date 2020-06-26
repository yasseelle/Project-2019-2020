<?php 

echo"cours chaine de ceractaire";

printf("<br/>");
$a=6;
$b=3.66;
printf("Double de %d et : %d <br/>",$a,2*$a);
printf("%d","il etait une fois <br/>");
printf("le double de %f et %f <br/>",$b,2*$b);
printf("binaire de  65 est : %b <br/>",65);
printf(" loctale de 33 est : %o <br/>",33);
printf(" l hexadecimale  de  3666 est %X <br/>",3666);
echo"ASCII et php des chains caractere <br/>";
echo ord('B');
printf("<br/>");
echo chr(65);
echo '<br/>';
$c='CADC';
$d="bonjour le solie ";
for($i=0; $i<4; $i++) 
{ 
 echo chr(($i+1)*6);

   
}
echo '<br/>';
echo strlen($c);
echo '<br/>';
echo str_word_count($d);
echo '<br/>';
$e="yasseelle8@gmai.com";
echo '<br/>';
echo strpos($e,'g');
echo '<br/>';
$f="si j'aillobge le pas \n j'arriverais a l'heure \n chaque jours  \n";
echo '<br/>';
$h="j'ai mange une pomme sucré";
echo '<br/>';
echo $h;
echo mb_convert_encoding($h,'ISO-8859-1','UTF-8');
echo substr($k,3);
echo strlen($j);
echo '<br/>';
trim($j);
echo strlen($j);
?>
