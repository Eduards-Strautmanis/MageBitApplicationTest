<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/191468e596.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="image">
        <div id="base_img">
            <img src="image_summer.png "id="image_summer" />
        </div>
    </div>
    <div id="base"></div>
    <div id="top_bar">
        <div id="logo_pineapple">
            <img v-bind:src="image_logo" id="pnpl">
            <img v-bind:src="image_txt" id="pnpltxt">
        </div>
        <p id="about">{{txt1}}</p>
        <p id="how_it_works">{{txt2}}</p>
        <p id="contact">{{txt3}}</p>
    </div>
    <div id="success"><img src="success.svg"></div>
    <h1 id="subscribe">Subscribe to newsletter</h1>
    <p id="sub2">Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
    <div id="input">
        <div class="vl" id="email_line"></div> 
        <div id="input_base">
            <form name="myform" method="post" action="database.php?insert=true" onsubmit="return validateemail();" target="_blank">
                <input type="text" id="type_email" name="email" placeholder="Type your email address here...">
                <input type="submit" value="ic_arrow.svg" id="submit">
    			<div id="checkbox-wrapper">
        			<input type="checkbox" id="check" name="checkbox" hidden />
        			<label for="check" class="checkmark"></label>
    			</div>
            </form>
            <svg id="arrow" width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M17.7071 0.2929C17.3166 -0.0976334 16.6834 -0.0976334 16.2929 0.2929C15.9023 0.683403 15.9023 1.31658 16.2929 1.70708L20.5858 5.99999H1C0.447693 5.99999 0 6.44772 0 6.99999C0 7.55227 0.447693 7.99999 1 7.99999H20.5858L16.2929 12.2929C15.9023 12.6834 15.9023 13.3166 16.2929 13.7071C16.6834 14.0976 17.3166 14.0976 17.7071 13.7071L23.7071 7.70708C24.0977 7.31658 24.0977 6.6834 23.7071 6.2929L17.7071 0.2929Z" fill="#131821"/>
            </svg>
            <!--<p id="type_email">Type your email address here...</p> -->
        </div>
    </div>
    <p id="error_txt"></p>
    <p id="tos">I agree to <a href="#">terms of service</a></p>
    <div id="hl"></div>
    <div id="facebook">
        <a href="#">
            <div class="icon_circle"></div>
            <i class="fab fa-facebook-f" id="ff"></i>
        </a>
    </div>
    <div id="instagram">
        <a href="#">
            <div class="icon_circle"></div>
            <i class="fab fa-instagram" id="inst"></i>
        </a>
    </div>
    <div id="twitter">
        <a href="#">
            <div class="icon_circle"></div>
            <i class="fab fa-twitter" id="twit"></i>
        </a>
    </div>
    <div id="youtube">
        <a href="#">
            <div class="icon_circle"></div>
            <i class="fab fa-youtube" id="yout"></i>
        </a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script>  
var top_bar = new Vue ({
	el: '#top_bar',
	data: {
		image_logo: 'logo_pineapple_less.svg',
		image_txt: 'pineapple_text.svg',
		txt1: 'About',
		txt2: 'How it works',
		txt3: 'Contact' 
	}
});
function validateemail() {  
var x=document.myform.email.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf("."); 
if (x == "" || x == null) {
  document.getElementById("error_txt").innerHTML = "Email address is required";
  return false;
} else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length) {  
  document.getElementById("error_txt").innerHTML = "Please provide a valid email address";
  return false;   
} else if (x.slice(-2) == "co") {  
  document.getElementById("error_txt").innerHTML = "We are not accepting subscriptions from Columbia emails";
  return false;
} else if (!document.getElementById('check').checked) {  
  document.getElementById("error_txt").innerHTML = "You must accept the terms and conditions";
  return false;
} else {
  var width = document.getElementById("base").style.width;
  document.getElementById("error_txt").innerHTML = "";
  document.getElementById("success").style.opacity = "1";
  document.getElementById("subscribe").innerHTML = "Thanks for subscribing!";
  document.getElementById("sub2").innerHTML = "You have successfully subscribed to our email listing. Check your email for the discount code.";
  document.getElementById("input").style.left = "-700px";
  document.getElementById("checkbox-wrapper").style.left = "-700px";
  document.getElementById("tos").style.left = "-700px";
  if (width > 400) {
  	document.getElementById("sub2").style.top = "433px";
  	document.getElementById("subscribe").style.top = "369px";
  	document.getElementById("hl").style.top = "539px";
  	document.getElementById("facebook").style.top = "590px";
  	document.getElementById("instagram").style.top = "590px";
  	document.getElementById("twitter").style.top = "590px";
  	document.getElementById("youtube").style.top = "590px";
  } else {
  	document.getElementById("sub2").style.top = "437px";
  	document.getElementById("subscribe").style.top = "393px";
  	document.getElementById("hl").style.top = "528px";
  	document.getElementById("facebook").style.top = "549px";
  	document.getElementById("instagram").style.top = "549px";
  	document.getElementById("twitter").style.top = "549px";
  	document.getElementById("youtube").style.top = "549px";
  }
}
}
</script> 
<noscript>
	<?php
		echo "
    	<div id='top_bar'>
        	<div id='logo_pineapple'>
            	<img src='logo_pineapple_less.svg' id='pnpl'>
            	<img src='pineapple_text.svg' id='pnpltxt'>
        	</div>
        	<p id='about'>About</p>
        	<p id='how_it_works'>How it works</p>
        	<p id='contact'>Contact</p>
    	</div>";
		$error = $_GET['error'];
		if ($error == 'empty') {
			echo "<p id='error_txt'>Email address is required</p>";
		} else if ($error == 'email') {
			echo "<p id='error_txt'>Please provide a valid email address</p>";
		} else if ($error == 'columbia') {
			echo "<p id='error_txt'>We are not accepting subscriptions from Columbia emails</p>";
		} else if ($error == 'checkbox') {
			echo "<p id='error_txt'>You must accept the terms and conditions</p>";
		}
	?>
</noscript>
</body>
</html>
