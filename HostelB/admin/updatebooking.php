<?php
session_start();
include './auth.php';
$re = mysqli_query($connection,"select * from user where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' " );
echo mysqli_error($connection);
if(mysqli_num_rows($re) > 0)
{

} 
else
{

session_destroy();
header("location: index.htm");
}

	$sql2 = "UPDATE booking
	SET payment_status='".$_POST['paymentstatus']."'
	WHERE booking_id=".$_POST['bookingid'].";" ;
	$sql3 = "UPDATE roombook
	SET room_id='".$_POST['room_id']."'
	WHERE booking_id=".$_POST['bookingid'].";" ;
	$result2 = mysqli_query($connection,$sql2);
	$result3 = mysqli_query($connection,$sql3);


	if($_POST['paymentstatus']=="confirmed"){
		$stat="accepted";
	}
	else{
		$stat="rejected";
	}

	$email= $_POST['email'];
	$subject = "Booking Request Status";
	$message ='Your request for regarding guest room booking has been '.$stat.'. For further information contact the DSA office dsaoffice@iiitdmj.ac.in';

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




	
	header("Refresh: 3;url=detail.php?booking=".$_POST['bookingid']."");
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "\n";
echo "    <!-- Bootstrap core CSS -->\n";
echo "    <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">\n";
echo "    <!-- Custom styles for this template -->\n";
echo "    <link href=\"css/dashboard.css\" rel=\"stylesheet\">\n";
echo "	<link href=\"css/style.css\" rel=\"stylesheet\">\n";
echo "	<link rel=\"stylesheet\" href=\"css/fontello.css\">\n";
echo "    <link rel=\"stylesheet\" href=\"css/animation.css\"><!--[if IE 7]><link rel=\"stylesheet\" href=\"css/fontello-ie7.css\"><![endif]-->\n";
echo "    \n";
echo "<body>\n";
echo "<div class=\"container\">\n";
echo "	<div class=\"row\">\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-6 \">\n";
echo "		<h4> Success. Please wait few seconds for redirection...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
echo "		\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "	</div>\n";
echo "</div>\n";
echo "\n";
echo "\n";
echo "</body></html>";

?>