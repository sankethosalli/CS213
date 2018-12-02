<?php


$id = $_GET['id'];


include 'settings.php';

  $conc = mysqli_connect("$domainname","$drootname","$dpassword");




$zx = "create database ipd";



if($conc->query($zx)){$_SESSION['c'] = 1 ;
echo "<br>database ipd created successfully<br>";}



$uo = "use ipdr";

mysqli_query($conc,$uo);

$data = "select *  from request1729 where slno = $id";





$result =  mysqli_query($conc,$data);


$rowmat = mysqli_fetch_assoc($result);


$uu =$rowmat['uname'];

$up = $rowmat['upassword'];

$nam = $rowmat['name'];

$ema = $rowmat['email'];

$uo = "use ipd";
mysqli_query($conc,$uo);


$tab="create table $uu(slno bigint,name varchar(120), email varchar(120), companyno bigint, phone bigint,webpage varchar(120))";
$ac = mysqli_query($conc,$tab);


$gen = "grant all privileges on ipd.$uu to '$uu'@'localhost' identified by '$up'";
$ab =  mysqli_query($conc,$gen);


if($ab && $ac)

{
  $uo = "use ipdr";
  mysqli_query($conc,$uo);


$update = "update request1729 set status = 'accepted' where slno = $id";


if(mysqli_query($conc,$update)){


  // echo "<br>status updated successfully";

  echo "made & status updated successfully";

}
////////////////////////////////////////////////////////////////////////////////
  $nsi = (rand()*rand())*(rand());

  $uo = "use ipd";
  mysqli_query($conc,$uo);


  $inwryt = "insert into $uu values('$nsi','$nam','$ema','','','')";

  mysqli_query($conc,$inwryt);



}


header("Location: http://localhost//iitdh/pp/adminv.php");







 ?>
