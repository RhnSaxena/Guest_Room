<?php
session_start();
?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/gif/png" href="img/images.png">
<title>Guest Room Booking</title>
<meta name="reservation for hostel room" >
<meta name="IIITDMJ" content="www.iiitdmj.ac.in">
<meta name="copyright" content="PDPM IIITDMJ, inc. Copyright (c) 2018">
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="icon/css/fontello.css">
<link rel="stylesheet" href="icon/css/animation.css"><!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="jquery.backstretch.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
<meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large"><meta class="foundation-mq-medium"><meta class="foundation-mq-small"><style></style><meta class="foundation-mq-topbar"></head>
<body class="fontbody" >

<div style=";
  right: 0;
  left: 0;background-color: #000000;
background-image: url(img/black.png);">
<div class="container-fluid" style="text-align: center; color: white;">

<a href="index.php"><img src="img/slogo.png" width=70px height=50px></a>PDPM IIITDMJ GUEST HOUSE BOOKING PORTAL

</div>
</div>

<div class="row foo" style="margin:30px auto 30px auto;" >
<div class="large-12 columns">
		<div class="large-3 columns centerdiv">
			<a href="sessiondestroy.php" class="button round blackblur fontslabo" >1</a>
			<p class="fontgrey">Please select Date</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="unsetroomchosen.php" class="button round blackblur fontslabo" >2</a>
			<p class="fontgrey">Select Room</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="guestform.php" class="button round  blackblur fontslabo" >3</a>
			<p class="fontgrey">Guest Details</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round fontslabo" style="background-color:#2ecc71;">4</a>
			<p class="fontgrey">Reservation Complete</p>
		</div>
</div>

</div>
</div>
 
<div class="row">
	<div class="large-4 columns blackblur fontcolor" style="margin-left:-10px; padding:10px;">
	
		<div class="large-12 columns " >
		<p><b>Your Reservation</b></p><hr class="line">
				<form name="guestdetails" action="unsetroomchosen.php" method="post" >
				<div class="row">
					<div class="large-12 columns">
						<div class="row">
						
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Check In
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkin_date'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Check Out
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkout_date'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Guests
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['adults'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall" >Night Stay(s)
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['total_night'];?>
								</span>				
							
							</div>
						</div>
						<div class="row"><hr>
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgreysmall" >Room Selected
								</span>
							</div>
							
							<div class="large-4 columns" style="max-width:100%;">
								<span class="fontgreysmall">Qty
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-6 columns" style="max-width:100%;">
								<span class="" ><?php 
								
													foreach ($_SESSION['roomname'] as &$value0 ) {
													echo $value0;
													print "<br>";
													} ;

												?>
												
								</span>
							</div>
							
							<div class="large-4 columns" style="max-width:100%;">
								<span class="">
								<?php foreach ($_SESSION['roomqty'] as &$value1 ) {
													echo $value1;
													print "<br>";
													} ;
												
												?>
								</span>				
							
							</div>
						</div>
						
					</div>	
				</div><br>
				<div class="row">					
						<div class="large-12 columns" style="max-width:100%;">
							<p class="fontgrey borderstyle" style="text-align:center;">Deposit in Cash on Check In Date<br>
							<br><span class="fontgrey" style="text-align:center;">Total</span><br>
							<span class="fontslabo" style="font-size:32px; text-align:center;">INR <?php echo $_SESSION['total_amount'];?></span></p>
							
						</div>
						
						<div class="large-12 columns" style="max-width:100%;">
							
							
						</div>
				</div>
						

				
				  <div class="row">
					<div class="large-12 columns" >
						<button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%;">Edit Reservation</button>
					</div>
				  </div>
				</form>
		</div>
	


	</div>
	<div class="large-8 columns blackblur fontcolor" style="padding:10px">
	
		<div class="large-12 columns" >
		<p><b>Booking Complete</b></p><hr class="line">
		<p>Details of your reservation have just been submitted to the admin. An confirmation email will be sent to you after verification. We look forward to see you soon. In the
		meantime, if you have any questions, feel free to contact at dsaoffice@iiitdmj.ac.in.</p>
		<p>
		<i class="icon-phone" style="font-size:24px"></i> <span class="i-name fontgrey">Phone</span><span class="i-code">&emsp;TO BE UPDATED </span><br>
        <i class="icon-fax" style="font-size:24px"></i> <span class="i-name fontgrey">Fax</span><span class="i-code"> &emsp;&emsp;TO BE UPDATED</span><br>
        <i class="icon-mail-alt"style="font-size:24px"> </i> <span class="i-name fontgrey">Email</span><span class="i-code">&emsp; info@iiitdmj.ac.in</span>
		</p><hr>


			</div>
		</div>
		</div>
	


	</div>


</div>

<script>
</script>
<?php
include 'footer.php';
?>
</body></html>