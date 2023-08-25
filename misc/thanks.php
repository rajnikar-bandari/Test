<?php
$xheaders.= "Content-Type: text/html; charset=iso-8859-1\n";
$cont .= "<table border='1' cellpadding='3' cellspacing='1' bgcolor='#F0F0F0' bordercolor='#D6D6D6' style='FONT-FAMILY:Tahoma, Helvatica, fantasy; color:#000000; FONT-SIZE: 9pt; FONT-STYLE: normal; FONT-VARIANT: normal; FONT-WEIGHT: normal; border-collapse:collapse'><tr>";
$cont .= "<td colspan='2' bgcolor='#000099'><font color='white'><b>Aimensol Enquiry</b></font></td></tr>";
$cont .= "<tr><td colspan='2' style='height:6px'></td></tr>";
$cont .= "<tr><td>Name:&nbsp;</td><td>$_POST[txt_name]</td></tr>";
$cont .= "<tr><td>Email:&nbsp;</td><td>$_POST[txt_email]</td></tr>";
$cont .= "<tr><td>Subject:&nbsp;</td><td>$_POST[subject_id]</td></tr>";
$cont .= "<tr><td>Comments:&nbsp;</td><td>$_POST[txt_comment]</td></tr></table>";  

$recipient .= 'info@aimensol.com';

$subject = "Aimensol Enquiry";
$xheaders .= "From: $_POST[txt_email]\r\n";
$xheaders .= "Reply-To: $_POST[txt_email]\n\n";

if(isset($_POST['enq_submit']))
{
	if(mail($recipient, $subject, $cont, $xheaders))
	{
	$msg = "Thanks for contacting to us. We will get back to you as soon as possible.";
	}
	else
	{
	$msg = "Sorry, An error has occurred! Please try again.";
	}
}
else
{
$msg = "Please <a href='contactus.html'>click here</a> to contact us!";
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>AIMENSOL INC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta charset="UTF-8">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <!-- CSS Bootstrap & Custom -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/misc.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css">
        
    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">
    
    <!-- JavaScripts -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/modernizr.js"></script>
    <!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
        </div>
    <![endif]-->
</head>
<body>
    
    <div id="home">
        <div class="site-header">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="left-header">
                                <span><i class="fa fa-phone"></i>281-937-5563</span>
                                <span><i class="fa fa-envelope"></i>info@aimensol.com</span>
                            </div> <!-- /.left-header -->
                        </div> <!-- /.col-md-6 -->
                        <div class="col-md-6 col-sm-6">
                            <div class="right-header text-right">
                                <ul class="social-icons">
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <!--<li><a href="#" class="fa fa-instagram"></a></li>-->
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-google-plus"></a></li>
                                </ul>
                            </div> <!-- /.left-header -->
                        </div> <!-- /.col-md-6 -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.top-header -->
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="logo">
                                <h1><a href="index.html" title="AIMENSOL"><img src="images/logo.png" alt="AIMENSOL"></a></h1>
                            </div> <!-- /.logo -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-md-8 col-sm-8 col-xs-6">
                            <div class="menu text-right hidden-sm hidden-xs">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="company.html">Company</a></li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="clients.html">Clients</a></li>
                                    <li><a href="careers.html">Careers</a></li>
                                    <li><a href="contact.html" class="current">Contact us</a></li>
                                </ul>
                            </div> <!-- /.menu -->
                        </div> <!-- /.col-md-8 -->
                    </div> <!-- /.row -->
                    <div class="responsive-menu text-right visible-xs visible-sm">
                        <a href="#" class="toggle-menu fa fa-bars"></a>
                        <div class="menu">
                            <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="company.html">Company</a></li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="clients.html">Clients</a></li>
                                    <li><a href="careers.html">Careers</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                </ul>
                        </div> <!-- /.menu -->
                    </div> <!-- /.responsive-menu -->
                </div> <!-- /.container -->
            </div> <!-- /.header -->
        </div> <!-- /.site-header -->
    </div> <!-- /#home -->

   <!-- Start Page Banner -->
		<div class="aboutin">
			<div class="container">
				<div class="row">
					<div class="col-md-8 abouttext">
						<h2>Contact us</h2>
					</div>
					<div class="col-md-4">
						<ul class="breadcrumbs">
							<li><a href="index.html">Home</a></li>
							<li>Contact us</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Banner -->

    <div id="contact" class="section-cotent">
        <div class="container">

            <div class="row">
                <div class="col-md-7 col-sm-6">
                    <h4 class="widget-title"> <?php if(isset($msg)){ echo $msg; } ?></h4>
                   
                </div> <!-- /.col-md-3 -->
                <div class="col-md-5 col-sm-6">
                    <h4 class="widget-title">Contact Us</h4>
                    <div class="contact-info">
                        <p style="font-weight:bold">AIM ENSOL INC. </p>
                        <span><i class="fa fa-home"></i>10924 Grant Rd #116, Houston TX - 77070</span>
                        <span><i class="fa fa-phone"></i>281-937-5563</span>
                        <span><i class="fa fa-envelope"></i>info@aimensol.com</span>
                    </div>
					<br><br><br><br><br>
                    <!--<div class="map-holder" style="margin-top:20px;">
                         <div class="google-map-canvas" style="height: 250px;">
                        	 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3463.9101796939417!2d-95.39124501719668!3d29.75131257726587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640bf5eff030a23%3A0x5eadfa85122cec8f!2s1092+Grant+St+%23116%2C+Houston%2C+TX+77006%2C+USA!5e0!3m2!1sen!2sin!4v1438770441528" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe> 
                        </div> 
                    </div>--> <!-- /.map-holder -->
                    
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#contact -->


    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <p>Copyright &copy; 2015 Aimensol Inc</p>
                </div> <!-- /.col-md-6 -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="go-top">
                        <a href="#" id="go-top">
                            <i class="fa fa-angle-up"></i>
                            Back to Top
                        </a>
                    </div>
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>