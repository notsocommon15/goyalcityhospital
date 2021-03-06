<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);
  $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );

  $output = '';


  if (isset($_POST['sendmail'])) {
    $name = $_POST['name'];
    $email = $_REQUEST['email'];
    $service = $_REQUEST['select1'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $select1 = $_POST['datepicker'];



    try {
     $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'leomessi21210@gmail.com';
      // Gmail Password
      $mail->Password = '';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
      $mail->SMTPSecure = "tls";

      // Email ID from which you want to send the email
      $mail->setFrom('leomessi21210@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('kedisubham15@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission';
      $mail->Body = "<h3>Name : $name <br>Email : $email <br>Phone: $phone <br>Department: $service <br>Date: $select1 <br>Message : $message</h3>";

      $mail->send();
      $output = '<div>
                 </div> ';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Goyal City Hospital - Health Care &amp; Medical HTML5 Template</title>
<meta name="keywords" content="HTML5,CSS3,HTML,Template,Multi-Purpose,M_Adnan,Corporate Theme,Goyal City Hospital,Health Care,Goyal City Hospital - Health Care & Medical HTML5 Template">
<meta name="description" content="Goyal City Hospital - Health Care & Medical HTML5 Template">
<meta name="author" content="M_Adnan">

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>

<!--MAIN STYLE-->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css">
<style>
  #logo{
    height:60px;
    width:60px;
  }
</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- Page Wrap ===========================================-->
<div id="wrap"> 
  
  <!-- TOP BAR ===========================================-->
  <!--<div class="top-bar light">
    <div class="container">
      <ul class="pull-left">
        <li><a href="index-1.php">Welcome To Our Goyal City Hospital Center</a></li>
      </ul>
      
      <!-- SOCIAL ICONS ===========================================-->
      <!--<ul class="social_icons">
        <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>
        <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>
        <li class="dribbble"><a href="#."><i class="fa fa-dribbble"></i> </a></li>
        <li class="instagram"><a href="#."><i class="fa fa-instagram"></i> </a></li>
        <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>
        <li class="pinterest"><a href="#."><i class="fa fa-pinterest"></i> </a></li>
        <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>
      </ul>
    </div>
  </div>
  <!-- HEADER ===========================================-->
  <header> 
  <div class="container">    
    <!--======= LOGO =========-->
    <div class="logo"> <a href="index-1.php"><img src="images/lo.png" id="logo" alt="" ></a> </div>    
    <!--======= NAVIGATION =========-->
     <nav>
     <div class="menu-toggle"> <i class="fa fa-bars"> </i> </div>
        <ul id="ownmenu" class="ownmenu">
          <li class="active"><a href="index-1.php">Home</a>
            <!--<ul class="dropdown">
              <li><a href="index-1.php">Home</a></li>
              <li><a href="index-1.php">Home Slider</a></li>
              <li><a href="index-2.php">Home 2</a></li>
              <li><a href="index-header.php">header 1</a></li>
            </ul>-->
          </li>
          <li><a href="02-about-us-1.php">About us </a>
            <!--<ul class="dropdown">
              <li><a href="02-about-us.php">About</a></li>
              <li><a href="02-about-us-1.php">About 2</a></li>
            </ul>-->
          </li>
          <li><a href="services.php">SERVICES </a>
            <!--<ul class="dropdown">
              <li><a href="services.php">SERVICES</a></li>
              <li><a href="services-1.php">SERVICES 2</a></li>
            </ul>-->
          </li>
          <li><a href="03-department.php">Department </a> </li>
          <li><a href="gallery.php">Gallery </a>
            <!--<ul class="dropdown">
              <li><a href="gallery.php">GALLERY</a></li>
              <li><a href="gallery-2-col.php">GALLERY 2 col</a></li>
              <li><a href="gallery-3-col.php">GALLERY 3 col</a></li>
              <li><a href="gallery-4-col.php">GALLERY 4 col</a></li>
            </ul>-->
          </li>
          <li><a href="05-doctors-1.php">Doctors</a> 
            <!--======= MEGA MENU =========-->
            <!--<div class="megamenu full-width">
              <div class="row nav-post">
                <div class="col-sm-6 boder-da-r">
                  <ul>
                    <li><a href="index-1.php">Home</a></li>
                    <li><a href="index-1.php">Home Slider</a></li>
                    <li><a href="index-2.php">Home 2</a></li>
                    <li><a href="index-header.php">header 1</a></li>
                    <li><a href="appointment.php">Appointment</a></li>
                    <li><a href="02-about-us.php">About</a></li>
                    <li><a href="02-about-us-1.php">About 2</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a href="services-1.php">SERVICES 2</a></li>
                    <li><a href="03-department.php">Department</a></li>
                    <li><a href="04-department-detail.php">Department Detail</a></li>
                    <li><a href="team.php">TEAM</a></li>
                    <li><a href="05-doctors.php">Doctors</a></li>
                    <li><a href="05-doctors-1.php">Doctors 2</a></li>
                  </ul>
                </div>
                <div class="col-sm-6">
                  <ul>
                    <li><a href="gallery.php">GALLERY</a></li>
                    <li><a href="gallery-2-col.php">GALLERY 2 col</a></li>
                    <li><a href="gallery-3-col.php">GALLERY 3 col</a></li>
                    <li><a href="gallery-4-col.php">GALLERY 4 col</a></li>
                    <li><a href="07-timetable.php">Timetable</a></li>
                    <li><a href="08-blog.php">Blog</a></li>
                    <li><a href="09-blog-single.php">Blog Single</a></li>
                    <li><a href="10-shop.php">Shop</a></li>
                    <li><a href="11-product-detail.php">Product Detail</a></li>
                    <li><a href="12-contact.php">Contact</a></li>
                    <li><a href="shortcodes.php">Shortcodes</a></li>
                    <li><a href="coming-soon.php">Coming Soon</a></li>
                    <li><a href="404.php">404</a></li>
                  </ul>
                </div>
              </div>
            </div>-->
          </li>
          <li><a href="12-contact.php">Contact</a> </li>
        </ul>
      </nav>
    </div>
  </header>
  
  <!--======= BANNER =========-->
  <div class="home-3">
    <div id="banner" class="bnr-2">
      <div class="flex-banner">
        <ul class="slides">
          <!--======= SLIDER =========-->
          <li> <img src="images/slider-images/slider-2.jpg" alt="" >
            <div class="container"> 
              
              <!--======= SLIDER INNER DETAILS =========-->
              <div class="bnr-info">
                <h2>Welcome To Our Research Center</h2>
                <p>Cum sociis natoque penatibus et magnis dis parturient montesmus. Nunc finibus sit amet gravida. Cum sociis natoque penatibus et magnis dis parturient</p>
                
                <!-- Small Facts --> 
                <a href="#." class="btn btn-1">Make an Appoitment</a> </div>
            </div>
          </li>
          
          <!--======= SLIDER =========-->
          <li> <img src="images/slider-images/slider-3.jpg" alt="" >
            <div class="container"> 
              
              <!--======= SLIDER INNER DETAILS =========-->
              <div class="bnr-info">
                <h2>Our Best X-Ray Center</h2>
                <p>Cum sociis natoque penatibus et magnis dis parturient montesmus. Nunc finibus sit amet gravida. Cum sociis natoque penatibus et magnis dis parturient</p>
                
                <!-- Small Facts --> 
                <a href="#." class="btn btn-1">Make an Appoitment</a> </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  
  <!--======= CONTENT =========-->
  <div class="content"> 
    <!--======= SERVICES =========-->
    <section id="services">
      <div class="container-fluid">
        <ul class="row">
          <li class="col-md-3"> <i class="fa fa-heartbeat"></i>
            <h5>Heart  Rate</h5>
            <p>Duis autem vel eum iriure dolor in hendr erit in vulpt feugiat nulla facilisis utate velit esse molestie consequat</p>
          </li>
          <li class="col-md-3"> <i class="fa fa-stethoscope"></i>
            <h5>Medical Counseling</h5>
            <p>Duis autem vel eum iriure dolor in hendr erit in vulpt feugiat nulla facilisis utate velit esse molestie consequat</p>
          </li>
          <li class="col-md-3"> <i class="fa fa-user-md"></i>
            <h5>Qualified Doctors</h5>
            <p>Duis autem vel eum iriure dolor in hendr erit in vulpt feugiat nulla facilisis utate velit esse molestie consequat</p>
          </li>
          <li class="col-md-3"> <i class="fa fa-ambulance"></i>
            <h5>Emergency Services</h5>
            <p>Duis autem vel eum iriure dolor in hendr erit in vulpt feugiat nulla facilisis utate velit esse molestie consequat</p>
          </li>
        </ul>
      </div>
    </section>
    
    <!--======= WHY CHOOSE US =========-->
    <div id="why-choose">
      <div class="container">
        <div class="row"> 
          
          <!--Tittle-->
          <div class="col-lg-3">
            <div class="tittle">
              <h2>Why Choose Us</h2>
            </div>
          </div>
          
          <!-- Services Row -->
          <div class="col-lg-9">
            <ul class="row">
              
              <!-- Section -->
              <li class="col-sm-4">
                <h6>Medical Counseling</h6>
                <p>Cum sociis natoque penatibus et magnis dis parturient montesmus. Nunc finibus sit amet gravida. </p>
              </li>
              <!-- Section -->
              <li class="col-sm-4">
                <h6>Professional services</h6>
                <p>Cum sociis natoque penatibus et magnis dis parturient montesmus. Nunc finibus sit amet gravida. </p>
              </li>
              <!-- Section -->
              <li class="col-sm-4">
                <h6>24 Hours service</h6>
                <p>Cum sociis natoque penatibus et magnis dis parturient montesmus. Nunc finibus sit amet gravida. </p>
              </li>
            </ul>
            <ul class="row">
              
              <!-- Section -->
              <li class="col-sm-4">
                <h6>Qualified medical facilities</h6>
                <p>Cum sociis natoque penatibus et magnis dis parturient montesmus. Nunc finibus sit amet gravida. </p>
              </li>
              <!-- Section -->
              <li class="col-sm-4">
                <h6>Top level doctors</h6>
                <p>Cum sociis natoque penatibus et magnis dis parturient montesmus. Nunc finibus sit amet gravida. </p>
              </li>
              <!-- Section -->
              <li class="col-sm-4">
                <h6>Dedicated patient care</h6>
                <p>Cum sociis natoque penatibus et magnis dis parturient montesmus. Nunc finibus sit amet gravida. </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- Image Responsive -->
      <div class="text-center"> <img class="img-responsive" src="images/why-choose-img.jpg" alt=""> </div>
    </div>
    
    <!--======= INTRO =========-->
    <section class="intro">
      <div class="container">
        <div class="intro-in"> 
          <!--Tittle-->
          <div class="tittle">
            <h3>We are a team of young 
              professionals passionate in our work.</h3>
          </div>
          
          <!--Text Section-->
          <ul class="row">
            <li class="col-md-6">
              <p>Duis autem vel eum iriure dolor in hendrerit n vuew lputate velit esse molestie consequat, vel illum dolore eufe ugiat nulla facilisis at vero.</p>
            </li>
            <li class="col-md-6">
              <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum seacula quarta decima quinta decima. </p>
            </li>
          </ul>
          <a href="#." class="btn">Make an appoitment</a> <a href="#." class="btn btn-1">View timetable</a> </div>
      </div>
    </section>
    
    <!--======= MAKE AN APPOINTMENT =========-->
    <section class="make-oppient">
      <div class="appointment">
        <div class="container">
          <div class="row">
          <!--======= Image =========-->
            <div class="col-sm-5"> <img class="img-responsive" src="images/oppitent-img.png" alt="" > </div>
            <div class="col-sm-7"> 
            
              <!--======= FORM =========-->
              <div class="tittle">
                <h2>Make an Appointment</h2>
              </div>
              <h5 class="text-center text-success"><?= $output; ?></h5>
              <form role="form" id="appointment" method="post">
                <ul class="row">
                  <li class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full name * ">
                  </li>
                  <li class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email * ">
                  </li>
                  <li class="col-sm-6">
                    <input type="text" class="form-control"  name="phone" id="phone" placeholder="Phone" >
                  </li>
                  <li class="col-sm-6">
                    <select class="form-control selectpicker" name="select1" id="select1">
                      <option selected>Select Department</option>
                      <option>Dental</option>
                      <option>Cardiology</option>
                      <option>Orthopedics</option>
                      <option>general surgery</option>
                      <option>medicine</option>
                      <option>DBS & gynae</option>
                      <option>neurosurgery & neurology</option>
                      <option>urology & nephrology</option>
                      <option>gastro</option>
                      <option>plastic surgery</option>
                      <option>pediatrics</option>
                      <option>physiotherapy & rehabilitation</option>
                      <option>critical care</option>
                      <option>ENT</option>
                    </select>
                  </li>
                  <li class="col-sm-12">
                    <input type="text" name="datepicker" class="form-control" id="datepicker" placeholder="DD/MM/YY">
                    <i class="fa fa-calendar"></i> </li>
                  <li class="col-sm-12">
                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"></textarea>
                  </li>
                  <li class="col-sm-12">
                    <button type="submit" value="submit" name="sendmail" class="btn" id="btn_submit">make an appointment</button>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <!--======= Blog =========-->
    <section class="blog">
      <div class="container"> 
        
        <!--======= Blog POST 2nd ROW =========-->
        <ul class="row">
          
          <!-- Blog Post 2 -->
          <li class="col-md-4"> 
            <!-- Post Image -->
            <div class="post-img up"> <img class="img-responsive" src="images/blog-img-2.jpg" alt="" > </div>
            <!-- Post Text Sec -->
            <div class="col-md-12 text-section text-center"> <a href="#.">A Vital Measure: Your Surgeon’s Skill</a> <span>post by <strong>John Doe</strong> on <strong>April 5th, 2015</strong></span>
              <hr>
              <p>Claritas est etiam processus dynamicus, qui sequ itur mutationem consuetudium lectorum. Mirum est notare quam littera.</p>
            </div>
          </li>
          
          <!-- Blog Post 4 -->
          <li class="col-md-4"> 
            <!-- Post Text Sec -->
            <div class="text-section text-center"> <a href="#.">Spending More and Getting Less for Health Care</a> <span>post by <strong>John Doe</strong> on <strong>April 5th, 2015</strong></span>
              <hr>
              <p>Claritas est etiam processus dynamicus, qui sequ itur mutationem consuetudium lectorum. Mirum est notare quam littera.</p>
            </div>
            <!-- Post Image -->
            <div class="post-img down"> <img class="img-responsive" src="images/blog-img-3.jpg" alt="" > </div>
          </li>
          
          <!-- Blog Post 4 -->
          <li class="col-md-4"> 
            
            <!-- Post Image -->
            <div class="post-img up"> <img class="img-responsive" src="images/blog-img-4.jpg" alt="" > </div>
            
            <!-- Post Text Sec -->
            <div class="text-section text-center"> <a href="#.">Emergency Rooms Are No Place for the Elderly</a> <span>post by <strong>John Doe</strong> on <strong>April 5th, 2015</strong></span>
              <hr>
              <p>Claritas est etiam processus dynamicus, qui sequ itur mutationem consuetudium lectorum. Mirum est notare quam littera.</p>
            </div>
          </li>
        </ul>
      </div>
    </section>
    
   <!--======= TESTIMONILAS =========-->
    <section id="prople-says">
      <div class="overlay">
        <div class="container"> 
          
          <!--======= TITTLE =========-->
          <div class="tittle tittle-2 ">
            <h3>what patients say about us</h3>
          </div>
          <div class="qou"> <i class="fa fa-quote-left"></i> <i class="fa fa-quote-right"></i> </div>
          <div class="testi">
            <div class="testi-slide">
              <div class="item">
                <p>Excepteur sint cupidatat non proident, sunt ieserunt mollit anim id occaecat cupidatat non proident, sunt ieserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus occaecat cupidatat nonerror</p>
                <div class="avatar"><img src="images/avatar-1.jpg" alt="" ></div>
                <h5>JHON CORNNER</h5>
                <span>Ophthalmology DEOARTMENT</span> </div>
              <div class="item">
                <p>Excepteur sint cupidatat non proident, sunt ieserunt mollit anim id occaecat cupidatat non proident, sunt ieserunt mollit anim id est laborum. Sed ut perspiciatis est laborum. Sed ut perspiciatis unde omnis iste natus occaecat cupidatat nonerror</p>
                <div class="avatar"><img src="images/avatar-2.jpg" alt="" ></div>
                <h5>CORNNER JHON </h5>
                <span>DENTAL DEOARTMENT</span> </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--======= Contact Info =========-->
    <section class="contact-info">
      <div class="container"> 
        
        <!--Address-->
        <ul class="row">
          <li class="col-md-4"> <i class="ion-ios-location-outline"></i>
            <h5>Address</h5>
            <p>Goyal City Hospital NH-2 Trans Yamuna Colony Firozabad Road ,Rambagh Agra 282006</p>
          </li>
          
          <!--Hot line-->
          <li class="col-md-4"> <i class="ion-iphone"></i>
            <h5>Hotline</h5>
            <p>0562 4001062</p>
          </li>
          
          <!--Email Contact-->
          <li class="col-md-4"> <i class="ion-ios-email-outline"></i>
            <h5>Email contact</h5>
            <p>info@goyalcityhospitals.com</p>
          </li>
        </ul>
      </div>
    </section>
  </div>
  
  <!--======= FOOTER =========-->
  <footer>
    <div class="container"> 
      
      <!-- Row -->
      <div class="row"> 
        
        <!-- Latest Tweet -->
        <div class="col-md-3">
          <div class="latest-tweet">
            <h5>Latest tweets</h5>
            <ul>
              
              <!--Tweet 1 -->
              <li>
                <p><span>@Goyal City Hospital</span> Sweets and Bakers 
                  WordPress Theme' on @EnvatoMarket by themefore<a href="#."> http://t.co/we8Kf0</a></p>
                <span class="date"> - Thursday April 9, 2015</span> </li>
              
              <!--Tweet 2 -->
              <li>
                <p><span>@Goyal City Hospital</span> In hendrerit in molestie consequat in <a href="#."> http://t.co/we8Kf0</a></p>
                <span class="date"> - Thursday April 9, 2015</span> </li>
              
              <!--Tweet 3 -->
              <li>
                <p><span>@Goyal City Hospital</span> Duis autem vel eum iriure <span>@Goyal City Hospital</span> dolor in hendrerit in molestie consequat <a href="#."> http://t.co/we8Kf0</a></p>
                <span class="date"> - Thursday April 9, 2015</span> </li>
            </ul>
          </div>
        </div>
        
        <!-- About Us -->
        <div class="col-md-6">
          <div class="small-info"> <img src="images/lo.png" id="logo" alt="">
            <p>We work in a friendly and efficient using the latest technologies and sharing our expertise to make a diagnosis and implement cutting-edge therapies.</p>
            <ul class="social_icons">
              <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>
              <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>
              <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>
            </ul>
            
            <!-- News Letter -->
            <h5>register newsletter</h5>
            <form>
              <input type="email" placeholder="Enter your email here" required>
              <button type="submit"> Subscribe</button>
            </form>
          </div>
        </div>
        
        <!-- Patient Guide -->
        <div class="col-md-3">
          <div class="links text-right">
            <h5>Patient Guide</h5>
            <ul>
              <li><a href="#.">Choosing a doctor</a></li>
              <li><a href="#."> Health journals</a></li>
              <li><a href="#."> Insurance converage</a></li>
              <li><a href="#."> Talking to your doctor</a></li>
              <li><a href="#."> Goyal City Hospital error</a></li>
            </ul>
            
            <!-- Timing -->
            <div class="timing">
              <h5>opening hours</h5>
              <p>Mon to Fri <span> 8:00 am to 7:00pm</span></p>
              <p>Sun & Sat <span>9:00 am to 5:00pm</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Rights -->
    <div class="rights">
      <p>© 2015 Goyal City Hospital. Made with by M_Adnan </p>
    </div>
  </footer>
</div>
<!-- Wrap End --> 
<script src="js/jquery-1.11.0.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/own-menu.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery.superslides.js"></script> 
<script src="js/masonry.pkgd.min.js"></script> 
<script src="js/jquery.stellar.min.js"></script> 
<script src="js/jquery-ui-1.10.3.custom.js"></script> 
<script src="js/jquery.magnific-popup.min.js"></script> 
<script src="js/jquery.isotope.min.js"></script> 
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/appointment.js"></script> 
<script src="js/jquery.downCount.js"></script>
<script src="js/counter.js"></script> 
<script src="js/main.js"></script>
</body>
</html>