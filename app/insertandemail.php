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


$to      = $_SESSION['email'];
$subject = "Booking Confirmation";
$message ="<html><body>";

$message .="<table class=\"body-wrap\">\n";

$message .="	<tr>\n";
$message .="		<td></td>\n";
$message .="		<td class=\"container\" width=\"600\">\n";
$message .="			<div class=\"content\">\n";
$message .="				<table class=\"main\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
$message .="					<tr>\n";
$message .="						<td class=\"content-wrap aligncenter\">\n";
$message .="							<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
$message .="								<tr>\n";
$message .="									<td class=\"content-block\">\n";
$message .="										<h1>Room Booked!</h1>\n";
$message .="									</td>\n";
$message .="								</tr>\n";
$message .="								<tr>\n";
$message .="									<td class=\"content-block\">\n";
$message .="										<h2>Thanks for giving us opportunity to serve you.</h2>\n";
$message .="									</td>\n";
$message .="								</tr>\n";
$message .="								<tr>\n";
$message .="									<td class=\"content-block\">\n";
$message .="										<table class=\"invoice\">\n";
$message .="											<tr>\n";
$message .="												<td>Dear ".$_SESSION['firstname']." ".$_SESSION['lastname']."<br><br><b>Booking ID #".$_SESSION['booking_id']."</b><br><b>".$_SESSION['total_night']."</b> night stay(s) from <b>".$_SESSION['checkin_date']."</b> to <b>".$_SESSION['checkout_date']."</b><br>No. of Guest :<b> ".$_SESSION['adults']."</b> Adult(s) & <b>".$_SESSION['childrens']."</b> Child(s)<br><br><b>Contact Detail</b><br>".$_SESSION['addressline1'].", ".$_SESSION['addressline2']."<br>".$_SESSION['postcode']." ".$_SESSION['city'].", <br>".$_SESSION['state'].", ".$_SESSION['country']."<br>Phone <b>".$_SESSION['phone']."</b><br>Email <b>".$_SESSION['email']."</b><br><br><br></td>\n";
$message .="											</tr>\n";
$message .="											<tr>\n";
$message .="												<td>\n";
$message .="													<table class=\"invoice-items\" cellpadding=\"0\" cellspacing=\"0\">\n";

$count = 0;
foreach ($_SESSION['room_id'] as &$value0  ) {
$message .="														<tr>\n";
$message .="															<td style=\"width:200px;\"><b>".$_SESSION['roomqty'][$count]." ".$_SESSION['roomname'][$count]."</b></td>\n";
$message .="															<td  style=\"width:200px;\"> <b>RM".$_SESSION['ind_rate'][$count]."</b></td>\n";
$message .="														</tr>\n";
$count = $count+1;
} ;

$message .="														<tr>\n";
$message .="															<td style=\"width:200px;\">Total</td>\n";
$message .="															<td  style=\"width:200px;\"> <b>RM".$_SESSION['total_amount']."</b></td>\n";
$message .="														</tr>\n";
$message .="														<tr>\n";
$message .="															<td style=\"width:200px;\">15% Deposit Due</td>\n";
$message .="															<td  style=\"width:200px;\"><b>RM".$_SESSION['deposit']."</b></td>\n";
$message .="														</tr>\n";;
$message .="														\n";
$message .="													</table>\n";

$message .="													<br><b>";
$message .="                     <form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">\n";
$message .="					<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n";
$message .="					<input type=\"hidden\" name=\"hosted_button_id\" value=\"3FWZ42DLC5BJ2\">\n";
$message .="					<input type=\"hidden\" name=\"lc\" value=\"MY\">\n";
$message .="					<input type=\"hidden\" name=\"item_name\" value=\"15% Hotel Deposit for Booking ID #".$_SESSION['booking_id']."; \">\n";
$message .="					<input type=\"hidden\" name=\"amount\" value=\"".$_SESSION['deposit']."\">\n";
$message .="					<input type=\"hidden\" name=\"currency_code\" value=\"MYR\">\n";
$message .="					<input type=\"hidden\" name=\"button_subtype\" value=\"services\">\n";
$message .="					<input type=\"hidden\" name=\"no_note\" value=\"0\">\n";
$message .="					<input type=\"hidden\" name=\"bn\" value=\"PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest\">\n";
$message .="					<input type=\"hidden\" name=\"custom\" value=\"".$_SESSION['booking_id']."\">\n";
$message .="					<br><button class=\"button small \" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\" style=\"background-color:#2ecc70;border:0px solid #18ab29; display:inline-block; color:#ffffff; font-size:15px; padding:5px 5px;\">Pay Deposit Via Paypal Here</button>\n";
$message .="					</form>";
$message .="															\n";
$message .="												</td>\n";
$message .="											</tr>\n";
$message .="										</table>\n";
$message .="									</td>\n";
$message .="								</tr>\n";
$message .="								<tr>\n";
$message .="								</tr>\n";
$message .="								<tr>\n";
$message .="									<td>\n";
$message .="										<br><br>PDPM IIITDM Jabalpur\n";
$message .="									</td>\n";
$message .="								</tr>\n";
$message .="							</table>\n";
$message .="						</td>\n";
$message .="					</tr>\n";
$message .="				</table>\n";
$message .="				<div class=\"footer\">\n";
$message .="					<table width=\"100%\">\n";
$message .="						<tr>\n";
$message .="							<td><br>Questions? Email <a href=\"mailto:\">info@hostel.com.my or Call Us at 0000000</a></td>\n";
$message .="						</tr>\n";
$message .="					</table>\n";
$message .="				</div></div>\n";
$message .="		</td>\n";
$message .="		<td></td>\n";
$message .="	</tr>\n";
$message .="</table>";

$message .="</body></html>";
echo "<script>alert($message);</script>";
$headers  ='From: freak.rhn@gmail.com';
mail($to, $subject, $message, $headers);	
echo "HELLO";
if(mail($to, $subject, $message, $headers)){
	echo"Mail sent";
}
else{
	echo"Mail couldn't be sent";
}
//header("location: reservationcomplete.php");
?>