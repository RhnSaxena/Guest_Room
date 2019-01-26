<?php
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
$message .="												<td>Dear ".$_SESSION['firstname']." ".$_SESSION['lastname']."<br><br><b>Booking ID #".$_SESSION['booking_id']."</b><br><b>".$_SESSION['total_night']."</b> night stay(s) from <b>".$_SESSION['checkin_date']."</b> to <b>".$_SESSION['checkout_date']."</b><br>No. of Guest :<b> ".$_SESSION['adults']."</b><br><br><b>Contact Detail</b><br>".$_SESSION['addressline1'].", ".$_SESSION['addressline2']."<br>".$_SESSION['postcode']." ".$_SESSION['city'].", <br>".$_SESSION['state'].", ".$_SESSION['country']."<br>Phone <b>".$_SESSION['phone']."</b><br>Email <b>".$_SESSION['email']."</b><br><br><br></td>\n";
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
$message .="														\n";
$message .="													</table>\n";

$message .="													<br><b>";
$message .="					<br>Notes & Policy:</b>\n";

$message .="															<br>\n";
$message .="															<b>1. Please pay on check in.</b><br>\n";
$message .="															2. The hotel management has right to cancelled the booking\n";
$message .="															<br>\n";
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
$message .="										<br><br>PDPM IIITDMJ Jabalpur\n";
$message .="									</td>\n";
$message .="								</tr>\n";
$message .="							</table>\n";
$message .="						</td>\n";
$message .="					</tr>\n";
$message .="				</table>\n";
$message .="				<div class=\"footer\">\n";
$message .="					<table width=\"100%\">\n";
$message .="						<tr>\n";
$message .="							<td><br>Questions? Email <a href=\"mailto:\">info@hotel.com.my or Call Us at 0000000</a></td>\n";
$message .="						</tr>\n";
$message .="					</table>\n";
$message .="				</div></div>\n";
$message .="		</td>\n";
$message .="		<td></td>\n";
$message .="	</tr>\n";
$message .="</table>";

$message .="</body></html>";
$headers  ='From: admin@abc.com';

mail($to, $subject, $message, $headers);

header("location: reservationcomplete.php");
echo $message;
echo "<br><br>";
echo $headers;
?>
