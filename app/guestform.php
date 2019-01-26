<?php
session_start();

	include './auth.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!isset($_SESSION['room_id'])){
						
						$_SESSION['room_id'] = array();
						
						$_SESSION['roomname'] = array();
						
						$_SESSION['roomqty'] = array();
						$_SESSION['ind_rate'] = array();
						$_SESSION['total_amount'] = 0;
						$_SESSION['deposit'] = 0;
						}
	
				$result = mysqli_query($connection,"select * from room");
					if(mysqli_num_rows($result) > 0){
	
				
						$count = 0;
						
						while($row = mysqli_fetch_array($result)){
						
							if (isset($_POST["qtyroom".$row['room_id'].""])   && !empty($_POST["qtyroom".$row['room_id'].""]) )
							{
								$_SESSION['room_id'][$count] = $_POST["selectedroom".$row['room_id'].""];
								$_SESSION['roomqty'][$count] = $_POST["qtyroom".$row['room_id'].""];
								$_SESSION['roomname'][$count] = $_POST["room_name".$row['room_id'].""];
								
								$_SESSION['ind_rate'][$count] = $row['rate']  * $_POST["qtyroom".$row['room_id'].""];
								$_SESSION['total_amount'] =  ( $row['rate']  * $_POST["qtyroom".$row['room_id'].""] * $_SESSION['total_night'] );
								if($_SESSION['total_amount'] == 0){
									$_SESSION['total_amount'] = ($row['rate']  * $_POST["qtyroom".$row['room_id'].""]);
								}
								$_SESSION['deposit'] = 0;
								$count = $count + 1;
							}
						}
											
				
					}
	}else{
		header("location:index.php");
	}
	


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
<link rel="stylesheet" href="build/css/intlTelInput.css">
<!--link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="icon/css/fontello.css">
<link rel="stylesheet" href="icon/css/animation.css"><!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script-->
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>

<meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large"><meta class="foundation-mq-medium"><meta class="foundation-mq-small"><style></style><meta class="foundation-mq-topbar"></head>
<body class="fontbody">
<div style=";
  right: 0;
  left: 0;background-color: #000000;
background-image: url(img/black.png);">
<div class="container-fluid" style="text-align: center; color: white;">

<a href="index.php"><img src="img/slogo.png" width=70px height=50px></a>PDPM IIITDMJ GUEST HOUSE BOOKING PORTAL

</div>
</div>
<div class="row foo" style="margin:30px auto 30px auto;">
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
			<a href="#" class="button round fontslabo" style="background-color:#2ecc71;">3</a>
			<p class="fontgrey">Booking Details</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round blackblur fontslabo" >4</a>
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
								<span class="fontgreysmall">No. of Guests
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
							<p class="fontgrey borderstyle" style="text-align:center;">Deposit in cash on check in<br>
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

	<div class="large-8 columns blackblur fontcolor" style="padding-top:10px;">
		<p><b>Student's Details</b><hr class="line"></p>
		<form action="insertandemail.php" method="post"  onSubmit="return validateForm(this);">
		  <div class="row">

			<div class="large-6 columns">
			  <label class="fontcolor">First Name*
				<input name="firstname" id="firstname" type="text" value="<?php if(isset($_SESSION['firstname']) && !empty($_SESSION['firstname'])){echo  $_SESSION['firstname'];}?>" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="First Name" />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Last Name*
				<input name="lastname" id="lastname" type="text" value="<?php if(isset($_SESSION['lastname']) && !empty($_SESSION['lastname'])){echo  $_SESSION['lastname'];}?>" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="Last Name" />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Institute Email Address*
				<input name="email" id="email" placeholder="201xxxx@iiitdmj.ac.in" type="email" value="<?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])){echo  $_SESSION['email'];}?>"  pattern="[a-zA-Z0-9]+@iiitdmj.ac.in" placeholder="" />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="" style="color:white !important;">Students' Contact Number*
				<input name="phone" type="text" id="phone" value="<?php if(isset($_SESSION['phone']) && !empty($_SESSION['phone'])){echo  $_SESSION['phone'];}?>" pattern= "[^a-zA-Z]+" Title="Only numbers are allowed"  placeholder="Students' Contact Number" minlenth="13" maxlength="13"/>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Student's Address*
				<input name="addressline1" id="addressline1" type="text" value="<?php if(isset($_SESSION['addressline1']) && !empty($_SESSION['addressline1'])){echo  $_SESSION['addressline1'];}?>"   placeholder="Room No. xxx Hall of Residence x"/>
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Student's Roll Number*
				<input name="addressline2" id="addressline2" type="text" value="<?php if(isset($_SESSION['addressline2']) && !empty($_SESSION['addressline2'])){echo  $_SESSION['addressline2'];}?>"  placeholder="Student's Roll Number"/ maxlength="7" />
			  </label>
			</div>
		  </div>
		  <p><b>Guest Details</b><hr class="line"></p>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Guest's Full Name*
				<input name="state" id="state" type="text" value="<?php if(isset($_SESSION['state']) && !empty($_SESSION['state'])){echo  $_SESSION['state'];}?>" pattern= "[a-zA-Z\s]+" Title="Special characters such as ( ) * & ^ % $ & etc are not allowed"  placeholder="Guest's Name"/ />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Guest's Contact Number*
				<input name="city" type="text" id="city" value="<?php if(isset($_SESSION['city']) && !empty($_SESSION['city'])){echo  $_SESSION['city'];}?>" pattern= "[^a-zA-Z]+" Title="Only numbers are allowed"  maxlength="13" placeholder="Guest's Contact Number"  minlenth="13" / />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Guest's Full Address*
				<input name="postcode" id="postcode" type="text"  value="<?php if(isset($_SESSION['postcode']) && !empty($_SESSION['postcode'])){echo  $_SESSION['postcode'];}?>"  Title="Special characters such as ( ) * & ^ % $ & etc are not allowed><;"  placeholder="Guest's Full Address"/ />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Country*
				<select name="country" id="country" type="text" placeholder=""   required>
						<?php
						if(isset($_SESSION['country']) && !empty($_SESSION['country'])){
						echo "<option value=\"".$_SESSION['country']."\" selected=\"true\">".$_SESSION['country']."</option>";
						}else
						{
						echo "<option value=\"\" selected=\"true\">Country</option>";
						}
						
						?>
						
						<option value="Bangladesh">Bangladesh</option>
						<option value="Canada">Canada</option>
						<option value="China">China</option>
						<option value="India" selected="selected">India</option>
						<option value="Japan">Japan</option>
						<option value="Pakistan">Pakistan</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="United States of America">United States of America</option>
				</select>
			  </label>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="large-12 columns">
			  <label class="fontcolor">Purpose of visit & Relation with the Student*
				<textarea name="specialrequirements" required="required" placeholder=" Can Mention Special Requirements also(if any)"><?php if(isset($_SESSION['special_requirement']) && !empty($_SESSION['special_requirement'])){echo  $_SESSION['special_requirement'];}?></textarea>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-12 columns" style="text-align:right;"><button type="submit" class="button small fontslabo" style="background-color:#2ecc71;" onclick="return confirm('Are you sure you want to continue?')" >Confirm</button>
		  </div>

		  </div>
		</form>

	</div>

</div>
<?php
include 'footer.php';
?>
  

<script>
	function validateForm(form) {
		var fname = form.firstname.value;
		var lname = form.lastname.value;
		var email = form.email.value;
		var phone = form.phone.value;
		var add1 = form.addressline1.value;
		var postcode = form.postcode.value;
		var city = form.city.value;
		var state = form.state.value;
		var country = form.country.value;
		var sphone=String(phone);
		var lsphone=sphone.length;

		var gphone=String(city);
		var lgphone=gphone.length;


			if(lsphone<13){
				alert("Please enter a valid Student's contact number");
				return false;
			}
			if(lgphone<13){
				alert("Please enter a valid Guest's contact number");
				return false;
			}

			if(fname == null || lname == null || email == null || phone == null || add1 == null || postcode == null|| city == null|| state == null || country == null || fname == "" || lname == "" || email == "" || phone == "" || add1 == "" || postcode == "" || city == "" || state == "" || country == "") 
			{
			 alert("Please fill in all the fields mark with *.");

			 return false;
			}	
	}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="build/js/intlTelInput.js"></script>
 <script>
      $("#phone").intlTelInput({
        //autoFormat: false,
        //autoHideDialCode: false,
         defaultCountry: "in",
        //nationalMode: true,
        //numberType: "MOBILE",
        preferredCountries: ['in'],
        //responsiveDropdown: true,
        utilsScript: "lib/libphonenumber/build/utils.js"
      });
	    $("#city").intlTelInput({
        //autoFormat: false,
        //autoHideDialCode: false,
         defaultCountry: "in",
        //nationalMode: true,
        //numberType: "MOBILE",
        preferredCountries: ['in'],
        //responsiveDropdown: true,
        utilsScript: "lib/libphonenumber/build/utils.js"
      });
 </script>
</body></html>