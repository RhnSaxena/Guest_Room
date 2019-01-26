<?php

session_start();

$_SESSION['firstname'] = $_POST["firstname"];
$_SESSION['lastname'] = $_POST["lastname"];
$_SESSION['email'] = $_POST["email"];
$_SESSION['phone'] = $_POST["phone"];
$_SESSION['addressline1'] = $_POST["addressline1"];

$_SESSION['postcode'] = $_POST["postcode"];
$_SESSION['city'] = $_POST["city"];
$_SESSION['state'] = $_POST["state"];
$_SESSION['country'] = $_POST["country"];
$_SESSION['childrens']=0;
if(isset($_POST["addressline2"]))
{
$_SESSION['addressline2'] = $_POST["addressline2"];
}else{

$_SESSION['addressline2'] = "";
}
if(isset($_POST["specialrequirements"]))
{
$_SESSION['special_requirement'] = $_POST["specialrequirements"];
}else{

$_SESSION['special_requirement'] = "";
}

include './auth.php';
mysqli_query($connection,"INSERT INTO booking (booking_id, total_adult, total_children, checkin_date, checkout_date, special_requirement, payment_status, total_amount, deposit, first_name, last_name, email, telephone_no, add_line1, add_line2, city, state, postcode, country) 
VALUES (NULL, '".$_SESSION['adults']."' , '".$_SESSION['childrens']."', '".$_SESSION['checkin_db']."', '".$_SESSION['checkout_db']."', '".$_SESSION['special_requirement']."', 'pending', '".$_SESSION['total_amount']."', '".$_SESSION['deposit']."', '".$_SESSION['firstname']."', '".$_SESSION['lastname']."', '".$_SESSION['email']."', '".$_SESSION['phone']."', '".$_SESSION['addressline1']."', '".$_SESSION['addressline2']."', '".$_SESSION['city']."', '".$_SESSION['state']."', '".$_SESSION['postcode']."', '".$_SESSION['country']."')");
echo mysqli_error($connection);
$_SESSION['booking_id'] = mysqli_insert_id($connection);
$count = 0;
foreach ($_SESSION['room_id'] as &$value0  ) {

mysqli_query($connection,"INSERT INTO `roombook` (`booking_id`, `room_id`, `totalroombook`, `id`) VALUES ('".$_SESSION['booking_id']."', '".$value0."', '".$_SESSION['roomqty'][$count]."', NULL);");
$count = $count+1;
} ;


$email= $_SESSION['email'];
$subject = "Booking Request Recieved";
$message ="We have Recieved your request. You will soon recieve an email on confirmation.";

	  $from="info@grabix.in";
	  $auth="163524ADKoNwvp3f05958dc0c";
	   $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://control.msg91.com/api/sendmail.php?body=$message&subject=$subject&to=$email&from=$from&authkey=$auth",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
   
   echo"Mail couldn't be sent";
} else {
 echo"Mail sent";
}
	
header("location: reservationcomplete.php");
?>