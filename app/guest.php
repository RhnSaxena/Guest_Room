<!DOCTYPE html>
<!-- saved from url=(0046)http://foundation.zurb.com/templates/blog.html -->
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en" data-useragent="Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/gif/png" href="img/images.png">
<title>Guest Room Booking</title>
<meta name="reservation for hostel room" >
<meta name="IIITDMJ" content="www.iiitdmj.ac.in">
<meta name="copyright" content="PDPM IIITDMJ, inc. Copyright (c) 2018">
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
<meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large"><meta class="foundation-mq-medium"><meta class="foundation-mq-small"><style></style><meta class="foundation-mq-topbar"></head>
<body class="fontbody">
 
<div class="row" style="margin-top:30px;">
<div class="large-12 columns">
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round blackblur fontslabo">1</a>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round blackblur">2</a>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round blackblur" style="background-color:#2ecc71;">3</a>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round blackblur">4</a>
		</div>
</div>
<script>
   function addStorage() 
   {
      var fname = document.getElementById("firstname");
      var lname = document.getElementById("lastname");
      var email = document.getElementById("email");
      var phone = document.getElementById("phone");      
	  var addressline1 = document.getElementById("addressline1");
      var addressline2 = document.getElementById("addressline2");
      var postcode = document.getElementById("postcode");
      var city = document.getElementById("city");      
	  var state = document.getElementById("state");
      var country = document.getElementById("country");
	  var specialrequirements = document.getElementById("specialrequirements");
      /* Set the session storage item */
      if ("sessionStorage" in window) 
      {
         sessionStorage.setItem(fname.value, lname.value, email.value, phone.value, addressline1.value, addressline2.value, postcode.value, city.value, state.value, country.value, specialrequirements.value);
        
      } 
      else 
      {
         alert("no sessionStorage in window");
      }
   }
</script>


</div>
</div>
 
<div class="row">
	<div class="large-4 columns">
	</div>
	<div class="large-8 columns blackblur fontcolor" style="padding-top:10px;">
		<p><b>Guest Details</b></p><hr>
		<form>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">First Name*
				<input id="firstname"  required="required" type="text" placeholder="" />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Last Name*
				<input id="lastname"  required="required" type="text" placeholder="" />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Institute Email Address*
				<input id="email" required="required" type="text" placeholder="" />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Contact Number*
				<input id="phone" type="text" placeholder="" />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Hall of Residence*
				<input id="addressline1" required="required" type="text" placeholder="" />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Roll Number*
				<input id="addressline2" required="required" type="text" placeholder="" />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Zip/Postcode*
				<input id="postcode"  required="required"type="text" placeholder="" />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">City*
				<input id="city"  required="required" type="text" placeholder="" />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">State*
				<input id="state"  required="required" type="text" placeholder="" />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Country*
				<input id="country"  required="required" type="text" placeholder="" />
			  </label>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="large-12 columns">
			  <label class="fontcolor">Special Requirements
				<textarea id="specialrequirements" placeholder=""></textarea>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-12 columns" >
				<input type="button" id="paysubmit" class="button small" style="background-color:#2ecc71;" onclick="addStorage();"><b>Book Now and Pay Deposit</b></a>
			</div>
		  </div>
		</form>

	</div>

</div>


</body></html>