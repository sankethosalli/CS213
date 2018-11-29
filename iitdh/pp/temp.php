<?php
$n="Sultaan@iitdh.ac.in";



$l=strlen("$n");
$nem="@iitdh.ac.in";
$bool=0;


for ($x =($l-1); $x >=($l-12)  ; $x--) {

	    static $count=0;
static $f=11;	    
	    if($nem[$f]==$n[$x]){ $count++;  $f--; }


} 

if($count==12){$bool=1;}




?>


