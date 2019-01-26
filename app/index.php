<?php
session_start();
?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/gif/png" href="img/images.png">
<title>Guest Room Booking</title>
<link rel="stylesheet" href="scss/normalize.css">
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link rel="stylesheet" href="scss/yes.css">
<link rel="stylesheet" href="scss/datepicker.css">
<link href="scss/datepicker.css" rel="stylesheet" type="text/css"/>  
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>

<!--link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script>
  $(document).ready(function() {
		$("#checkout").datepicker();
		$("#checkin").datepicker({
		minDate : new Date(),
		onSelect: function (dateText, inst) {
        var date = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);
        $("#checkout").datepicker("option", "minDate", date);
		}
		});
  });
  
</script>
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
<meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large"><meta class="foundation-mq-medium"><meta class="foundation-mq-small"><style></style><meta class="foundation-mq-topbar"></head>
<body class="fontbody" style="background-image : url(img/background.jpg); background-size:cover;background-repeat:no-repeat; height:100%;background-position: center;background-attachment: fixed;font-size: 16px;" >
<?php
include 'header1.php';
?>
<div >
	<div class="row foo" style="margin:30px auto 30px auto;"><br><br>
		<div class="uniq"style="">
			
			<div class=" columns  fontcolor" style="	position:absolute;">
		
				<div class="large-12 columns " >
					<p><b><font size="4" color="white">Details</font></b></p><hr class="line">
					<form name="form" action="checkroom.php" method="post" onSubmit="return validateForm(this);">
						<div >
							<div class="large-6 columns" style="max-width:100%;">
								<label class="fontcolor" for="checkin"><font size="3">Check In</font>
									<input name="checkin" required="required" id="checkin" style="font-size: 15px; color:black;width:100%;height:25px"/>
								</label>
							</div>
							<div class="large-6 columns" style="max-width:100%;">
								<label class="fontcolor" for="checkout"><font size="3">Check Out</font>
									<font color=black><input name="checkout" required="required" id="checkout" style="font-size: 15px; color:black;width:100%;height:25px"/></font>
								</label>
							</div>
						</div>
						<div>
							<div class="large-6 columns">
								<label class="fontcolor"><font size="3">No. of Guests</font>

									<font color="Black">
										<select  name="totaladults" required id="totaladults" style="font-size: 15px; color:black;width:100%;height:35px;">
										<option></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										</select>
									</font>
								</label>
							</div>
						</div>
						<div>
							<div class="large-12 columns" >
								<button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%;" >
									<font size="3">Check Availability</font>
								</button>
							</div>
			  			</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer1.php';
?>
<script>
	function validateForm(form) {
		var a = form.checkin.value;
		var b = form.checkout.value;
		var c = form.totaladults.value;
		var d = form.totalchildrens.value;
		var e = form.checkin.value;
		
			if(a == null || b == null || a == "" || b == "") 
			{
			 alert("Please choose date");
			 return false;
			}
		
			if(c == 0) 
			{
			 	if(d == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}
			if(d == 0) 
			{
			 	if(c == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}

	}
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57205452-1', 'auto');
  ga('send', 'pageview');

</script>
</body></html>