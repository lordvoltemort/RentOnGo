<?php 
if(isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($username) && !empty($password))
	{
		$password_hash = md5($password);
		echo $query = "SELECT user_id FROM users WHERE username='".mysqli_real_escape_string($mysql_connect, $username)."' AND password='".mysqli_real_escape_string($mysql_connect, $password_hash)."'";
		if($query_run = mysqli_query($mysql_connect, $query))
		{
			$query_run = mysqli_query($mysql_connect, $query);
			
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows==0)
			{
				echo 'Invalid username/password.';
			}
			else if($query_num_rows==1)
			{
				$query_row = mysqli_fetch_assoc($query_run);
				$user_id = $query_row['user_id'];
				$_SESSION['user_id'] = $user_id;
				header('Location: index.php');
			}
		}
	}
	else
	{
		echo 'You must enter a username and password.';
	}
}
?>

<html>
    <head>
    <style type="text/css">
        #imgBanner{
            width: 1350px;
            height: 400px;
            border: solid ;
        }
    </style>
        <title></title>
        <script type="text/javascript">
            var picPaths = ['shillong.jpg','kochi.jpg','ff78ff16dc25e5bb1b97f17a829761ac.jpg','Affordable-Bikes.jpg','lightColor.jpeg'];
            var curPic = -1;
            //preload the images for smooth animation
            var imgO = new Array();
            for(i=0; i < picPaths.length; i++) {
                imgO[i] = new Image();
                imgO[i].src = picPaths[i];
            }

            function swapImage() {
                curPic = (++curPic > picPaths.length-1)? 0 : curPic;
                imgCont.src = imgO[curPic].src;
                setTimeout(swapImage,2500);
            }

            window.onload=function() {
                imgCont = document.getElementById('imgBanner');
                swapImage();
            }
        </script>

<!--css link for adventure button -->
    
<!-- end of css link for adventure button-->

<!-- css link for adventure and review whole section-->
<link rel="stylesheet" type="text/css" href="CSS/adventure&reviews.css">
<!--end of css link for adventure and reviews section-->

 <!-- Css link for date and time -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<!--end of css link for date and time -->

<!-- Link for header file -->
    <link rel="stylesheet" type="text/css" href="header.css">
<!--End of css file for header-->
    
<!-- Link for footer file -->
<link rel="stylesheet" type="text/css" href="footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Header</title>
<!--End of css file for footer-->

<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

<!-- Header file start here -->
<div class="navbar-header-">
  <div class="navbar-header-container">
    <a href="#" style="display: inline-block; color: white;">Home</a>
    <a href="#" style="display: inline-block; color: white;">Contact us</a>
    <a href="#" style="display: inline-block; color: white;">About</a>
    <a href="#" style="display: inline-block; color: white;">Feedback</a>
    <a href="#" style="display: inline-block; color: white;">Refer_and_earn</a>
    <button onclick="document.getElementById('id01').style.display='block' " class="w3-button w3-black w3-large" style="float:right";>Login</button>
    <a href="register.php" style="display: inline-block; color: white; float: right;">Signup</a>
    </div>
</div>
</head>
<body>
    <div>
        <img id="imgBanner" src="" alt="" />
    </div>
    <div class="blank"> </div>
<!-- end of blank class -->

<!-- Start of date and time box-->
<div class="DateAndTime">
    <div class="container">
        <form action="BookingPage.php" class="form-horizontal"  role="form">
            <fieldset>
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-2 control-label">Start Date and time</label>
                    <div class="input-group date form_datetime col-md-5" data-date="2017-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1" >
                        <input class="form-control" name="Start_trip" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
            
                <div class="form-group">
                    <label for="dtp_input1" class="col-md-2 control-label">End Date and time</label>
                    <div class="input-group date form_datetime col-md-5" data-date="2017-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                        <input class="form-control" name="end_trip" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
            </fieldset>
            <div id ="searchBtn">
                <input type="submit" value="search" >
            </div>
        </form>
    </div>
</div>  
<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
    
<!-- End of date and time-->

<!-- Start of estimate class-->
<div class="estimate">
  <h1><center><b>Fare estimate</b></center></h1>
    
</div>
<!-- end of estimate class-->

<!-- Start FAQ secction-->


<!--end of FAQ section -->

<!--Suggest adventure and reviews  -->
<div class="adventureAndreviews">
    <div class="left">
 
    </div>
    
    <div class="right">
            <p>Some button will be display here</p>
            <p>And some reviews will be available here</p>

    </div>
</div>
<!-- end of suggested adventure and reviews -->

<!-- start of footer-->
<div class="container-footer">
<h3></h3>
    <hr>
        <div class="text-center center-block">
            <p class="txt-railway" id="txt-railway"><center><b> Connect with us on </b></center></p>
            <br />
                <a href="https://www.facebook.com/"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
              <a href="https://twitter.com/"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
              <a href="https://plus.google.com/"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
              <a href="mailto:1234@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
</div>
    <hr>
</div>
<!-- end of footer-->


<!--Start of Loginform-->
    
<link rel="stylesheet" type="text/css" href="w3.css">
<div class="w3-container">
       

    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width: 600px">
        <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display = 'none' " class="   w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            <img src="flat_heros_02.png" alt="Avtar" style="width: 30%" class="w3-circle w3-margin-top">
        </div>
            <form class="w3-container" action="<?php echo $current_file; ?>" method="POST">
                <div class="w3-section" >
                <label><b>Username</b></label>
                <input type="text" name="username" class="w3-input w3-border w3-margin-bottom" placeholder="Enter username" > 
                <label><b>Password</b></label>
              <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" >
              
              <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
              <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
                </div>
            </form>
                
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                <span class="w3-right w3-padding w3-hide-small">Forgot<a href="#">Password?</a></span>
                </div>

            </div>
        </div>
    </div>
</div>


<!--End of loginform -->


    </body>
</html>