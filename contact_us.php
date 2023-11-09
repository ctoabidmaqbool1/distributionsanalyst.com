<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_GET['submit'])) {
        include 'contact.php';

        // Create connection
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        mysqli_set_charset($conn, "utf8");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name=$_GET['name'];
        $email=$_GET['email'];
        $subject=$_GET['subject'];
        $message=$_GET['message'];

        $insert="INSERT INTO contact(name,email,subject,message) VALUES ('$name','$email','$subject','$message')";
        if (mysqli_query($conn,$insert)) {
            require 'PHPMailer-master/src/Exception.php';
            require 'PHPMailer-master/src/PHPMailer.php';
            require 'PHPMailer-master/src/SMTP.php';

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();                                        // Send using SMTP
                $mail->Host = $mailhost;                                // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                 // Enable SMTP authentication
                $mail->Username = $mailuser;                            // SMTP username
                $mail->Password = $mailpass;                            // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption; 
                $mail->Port = 587;                                      // TCP port to connect to

                $mail->setFrom('info@distributionsanalyst.com');
                $mail->addAddress('info@distributionsanalyst.com');     // Name is optional

                $mail->isHTML(true);  
                $line_one="<span><b>Name:</b></span>";

                $break="<br><br>";
                // $line2="<h3>Email:</h3>";
                $line2="<span><b>Email:</b>   </span>";
                // $line3="<h3>Subject:</h3>";
                $line3="<span><b>Subject:</b>   </span>";

                // $line4="<h3>Message:</h3>";
                $line4="<span><b>Message:</b>   </span>";
                $line5="<h5>For more information<b> https://www.maqboolsolutions.com </b></h5>";                                 // 
                $mail->Subject ='Someone has contacted about Distributions Analyst';
                $mail->Body    = $line_one.$name.$break.$line2.$email.$break.$line3.$subject.$break.$line4.$message.$break.$break.$line5;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

?>
            <script type="text/javascript">
                alert("Your message has been sent successfully");
                {
                    window.location.href="contact_us.php";
                }
            </script>
<?php
        }
    }
?>

<!DOCTYPE html>
<html ⚡ lang="en">
<head><meta content="text/html" charset="utf-8">
    <title>Contact Us | Distributions Analyst</title>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Distributions Analyst, Analyst software, Business Intelligent (BI) software, Accounting software, Inventory management, Inventory software, Inventory management software, Distribution software, wms, Warehouse management system.">
    <meta name="description" content="Distributions Analyst is an accounting and inventory software also known as distribution inventory software or warehouse management software. This business accounting software is used for all types of distributors, wholesale dealers, trader, commission agent's shop, showroom and warehouses.">
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple">
    <link href="img/logo.webp" rel="icon">
    <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
    <link rel="canonical" href="https://distributionsanalyst.com/contact_us.php">
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script> 
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>   
    <link href="json/manifest.json" rel="manifest">
    <meta name="theme-color" content="#014473">

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

    <style amp-custom>
        <?php 
            include 'lib/bootstrap/css/bootstrap.min.css'; 
            include 'lib/ionicons/css/ionicons.min.css';
            include 'css/style.css'; 
            include 'lib/fontawesome-free-5.12.0-web/css/all.min.css';
            include 'assets/mobirise/css/mbr-additional.css';
            include 'assets/amp_navbar.css';
            include 'assets/theme/css/style.css';
        ?>

        .mbr-fullscreen {
            min-height: 43vh;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .mbr-fullscreen .mbr-overlay {
            min-height: 43vh;
        }
        .mbr-section-title {
            line-height: 1.0;
        }
        .pb-3 {
            padding-bottom: 0rem;
        }
    </style>
</head>
<body data-spy=scroll data-target=.navbar data-offset=50>
    <amp-sidebar id="sidebar" class="cid-rRZihwoWl9" layout="nodisplay" side="left">
        <div class="builder-sidebar" id="builder-sidebar">
            <button on="tap:sidebar.close" class="close-sidebar">
                <span></span>
                <span></span>
            </button>

            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-7" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-7" href="product.php">PRODUCT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-7" href="features.php">FEATURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-7" href="pricing_plan.php">PRICING PLAN</a>
                </li>
                <li class="nav-item" id="menu-active1">
                    <a class="nav-link link text-white display-7" href="contact_us.php">CONTACT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-7" href="faq.php">FAQ</a>
                </li>
            </ul>

            <div class="navbar-buttons mbr-section-btn">
                <a class="btn btn-sm btn-primary display-7" href="res/Distributions Analyst 2020.02.04.exe">
                    <span class="mbri-save mbr-iconfont mbr-iconfont-btn">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 32 32" fill="currentColor">
                            <path d="M28 16h-5l-7 7-7-7h-5l-4 8v2h32v-2l-4-8zM0 28h32v2h-32v-2zM18 10v-8h-4v8h-7l9 9 9-9h-7z"></path>
                        </svg>
                    </span>Try It Now!
                </a>
            </div>
        </div>
    </amp-sidebar>
    <section class="menu horizontal-menu cid-rRZihwoWl9" id="menu2-0">

        <nav class="navbar navbar-dropdown navbar-expand-lg navbar-fixed-top">
            <div class="brand">
                <a href="/" class="brand-logo">
                    <amp-img src="images/logo.webp" width="150" height="150" layout="responsive" alt="logo" class="mobirise-loader">
                        <div placeholder="" class="placeholder">
                            <div class="mobirise-spinner">
                                <em></em>
                                <em></em>
                                <em></em>
                            </div>
                        </div>
                    </amp-img>
                </a>
                <a href="/" class="brand-name mbr-fonts-style mbr-bold display-5">Distributions Analyst</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-white display-7" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-7" href="product.php">PRODUCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-7" href="features.php">FEATURES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-7" href="pricing_plan.php">PRICING PLAN</a>
                    </li>
                    <li class="nav-item" id="menu-active">
                        <a class="nav-link link text-white display-7" href="contact_us.php">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-7" href="faq.php">FAQ</a>
                    </li>
                </ul>

                <div class="navbar-buttons mbr-section-btn">
                    <a class="btn btn-sm btn-primary display-7" href="res/Distributions Analyst 2020.02.04.exe">
                        <span class="mbri-save mbr-iconfont mbr-iconfont-btn">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 32 32" fill="currentColor">
                                <path d="M28 16h-5l-7 7-7-7h-5l-4 8v2h32v-2l-4-8zM0 28h32v2h-32v-2zM18 10v-8h-4v8h-7l9 9 9-9h-7z"></path>
                            </svg>
                        </span> Try It Now!
                    </a>
                </div>
            </div>

            <button on="tap:sidebar.toggle" class="ampstart-btn hamburger sticky-but" aria-label="Right Align">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>

        <!-- AMP plug -->

    </section>
    <?php include 'slider.php'; ?>
    <main id=main>
        <section id=contact class="section-bg wow fadeInUp">
            <div class=container>
                <div class=section-header>
                    <h2>Contact Us</h2>
                    <p>You are always welcome at your convenience.</p>
                </div>
                <div class="row contact-info">
                    <div class="col-lg-4 col-md-4 col-ms-12 col-xs-12">
                        <div class=contact-address>
                            <i class=ion-ios-location-outline></i>
                            <h3>Address</h3>
                            <address>1 KM, Sargodha Road near Attock Petroleum Talagang, Chakwal, Pakistan</address>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-ms-12 col-xs-12">
                        <div class=contact-phone>
                            <i class=ion-ios-telephone-outline></i>
                            <h3>Phone Number</h3>
                            <p>0543-286738</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-ms-12 col-xs-12">
                        <div class=contact-email>
                            <i class=ion-ios-email-outline></i>
                            <h3>Email</h3>
                            <p> info@distributionanalyst.com</p>
                        </div>
                    </div>
                </div>
                <div class=" form">
                    <form method="get" action="contact_us.php" target="_top">
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label for="name"><b>Your Name</b></label>
                                <input type="text" name="name" class="form-control" id="name" required="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label for="email"><b>Your Email</b></label>
                                <input type="email" class=form-control name="email" required="" id="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="subject"><b>Subject</b></label>
                                <input type="text" class="form-control" name="subject" id="subject">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="message"><b>Message</b></label>
                                <textarea class="form-control" name="message" rows=5 required="" id="message"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="text-center form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" name="submit" class="btn form-control btn-get-started" style="background:#d21894;color:white">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=container>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 offset-lg-3 offset-md-3 offset-sm-12 offset-xs-12" data-scroll-reveal="enter from the bottom after 0.2s">
                    <div style="text-align: center;">
                        <a href="https://www.facebook.com/MaqboolSolutions" rel=noopener target=_blank name="facebook" aria-label="facebook">
                            <amp-img width="50px" height="50px" src=img/facebook22.webp alt=logo></amp-img>
                        </a>

                        <a href="https://twitter.com/maqboolsol" name="twitter" aria-label="twitter">
                            <amp-img width="50px" height="50px" src=img/twitter.webp alt=logo></amp-img>
                        </a>

                        <a href="https://pk.linkedin.com/company/maqbool-solutions" name="linkdin" aria-label="linkdin">
                            <amp-img width="50px" height="50px" src="img/linkedin.webp" alt="logo"></amp-img>
                        </a>

                        <a href="https://www.instagram.com/maqboolsolutions" name="instagram" aria-label="instagram">
                            <amp-img width="50px" height="50px" src=img/instagram.webp alt=logo></amp-img>
                        </a>

                        <a href="https://www.pinterest.com/maqboolsolutions" name="pinterest" aria-label="pinterest">
                            <amp-img width="50px" height="50px" src=img/pinterest.webp alt=logo></amp-img>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <br>
    <br>
    <footer id=footer>
        <div class=container>
            <div class="copyright"> © Copyright <strong>Distributions Analyst</strong> All Rights Reserved </div>
            <div class="form-row">
                <div class="text-center form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class=credits> Designed by <a href="https://maqboolsolutions.com/" style="color:#18d26e " name="maqbool-solution">Maqbool Solutions (SMC-Private) Limited</a></div>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="add" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog  modal-md  modal-dialog-centered">
            <div class="modal-content">
                <div class="card bg-primary text-white">
                    <div class="modal-header" style="">
                        <h4 class="modal-title">Buy Now</h4>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="card">
                            <br>
                            <form class="m-2" method="post" action-xhr="contact_us.php" target="_top">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Customer Name" name="name" maxlength="20" pattern="[A-Za-z _-&,.]{3,}" required="" title="Three or more Alphabets , Like Ali">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email"> </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone # " name="phone" maxlength="13" pattern="[0-9]{10,}" title="Ten or more Integers , Like 0542323676">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Card Number" name="cnic" maxlength="13" pattern="[0-9]{13}" title="Thirteen  Integers require, Like 3710135678454">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Address" name="address" pattern="[A-Za-z0-9 _-,/#&@\]{5,.}" title="Five or more characters ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Description" name="description">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-lg submit" name="add">Download </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
