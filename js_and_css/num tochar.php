<?php
function numberTowords($num)
{

$ones = array(

	0 =>"ZERO",
	1 => "une", 
	2 => "deux", 
	3 => "troi", 
	4 => "quatre", 
	5 => "cinq", 
	6 => "six", 
	7 => "sept", 
	8 => "huit", 
	9 => "neuf",
	10 => "dix", 
	11 => "onze", 
	12 => "douze", 
	13 => "douze", 
	14 => "quatorze", 
	15 => "quinze", 
	16 => "seize", 
	17 => "dix-sept", 
	18 => "dix-huit", 
	19 => "dix-neuf",
"014" => "FOURTEEN"
);
$tens = array( 
0 => "ZERO",
1 => "DIX",
2 => "vingt",
3 => "trente", 
4 => "quarante", 
5 => "cinquante", 
6 => "soixante", 
7 => "soixante-dix", 
8 => "quatre-vingts", 
9 => "quatre-vingt-dix" 
); 
$hundreds = array( 
	"cent", 
	"mille", 
	"Million", 
	"Billion", 
	"Trillion", 
	"Quadrillion" 
); /*limit t quadrillion */
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
	
while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
if($i < 20){ 
/* echo "getting:".$i; */
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
}
} 
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}
extract($_POST);
if(isset($convert))
{
echo "<p align='center' style='color:black'>".numberTowords("$num")."</p>";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Convert Number to Words in PHP</title>
		<style type="text/css">
			#bd
			{
				background: green;
			}
		</style>
	</head>
	<body id="bd">
		<form method="post">
			<table border="0" align="center">
				<tr>
				<td>Enter Your Numbers : </td>
				<Td><input type="text" name="num" value="<?php if(isset($num)){echo $num;}?>"/></Td>
				</tr>
				<tr>
				<td colspan="2" align="center">
				<input type="submit" value="Convert Number to Words" name="convert" align="center" />
				</td>
				</tr>
			</table>
        </form> 

	</body>
</html>