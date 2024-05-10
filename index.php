<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Online Website Builder v5.9.13, https://a.mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.9.13, a.mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/FinderLogo.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Hotel Finder</title>
  <link rel="stylesheet" href="https://r.mobirisesite.com/419262/assets/web/assets/mobirise-icons2/mobirise2.css?rnd=1714618983148">
  <link rel="stylesheet" href="https://r.mobirisesite.com/419262/assets/web/assets/mobirise-icons/mobirise-icons.css?rnd=1714618983148">
  <link rel="stylesheet" href="https://r.mobirisesite.com/419262/assets/bootstrap/css/bootstrap.min.css?rnd=1714618983148">
  <link rel="stylesheet" href="https://r.mobirisesite.com/419262/assets/bootstrap/css/bootstrap-grid.min.css?rnd=1714618983148">
  <link rel="stylesheet" href="https://r.mobirisesite.com/419262/assets/bootstrap/css/bootstrap-reboot.min.css?rnd=1714618983148">
  <link rel="stylesheet" href="https://r.mobirisesite.com/419262/assets/dropdown/css/style.css?rnd=1714618983148">
  <link rel="stylesheet" href="https://r.mobirisesite.com/419262/assets/socicon/css/styles.css?rnd=1714618983148">
  <link rel="stylesheet" href="https://r.mobirisesite.com/419262/assets/theme/css/style.css?rnd=1714618983148">
  <link rel="stylesheet" href="https://r.mobirisesite.com/419262/assets/css/mbr-additional.css?rnd=1714618983148" type="text/css">
  
  <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
  <link href="https://api.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css" rel="stylesheet">
  <script src="https://api.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
  <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.1-dev/mapbox-gl-geocoder.min.js"></script>
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.1-dev/mapbox-gl-geocoder.css" type="text/css">
  <style>

    #map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
    }

    .map-controls {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex; /* Use flexbox for horizontal alignment */
    }

    .mapboxgl-ctrl {
        margin-right: 10px; /* Add some spacing between controls */
    }
</style>

</head>
<body>

<!-- MENU SECTION -->
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotelBook";

// Create connection    
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare SQL statement
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
            setTimeout(function() {
                document.location.href = "/AppDevFinal";
                alert("Your Message is sent, We\'ll get back to you"); 
            }, 0);
            </script>';
    } else {
        echo "Error executing SQL statement: " . $conn->error;
    }
}
// Close connection
$conn->close();
?>

<section data-bs-version="5.1" class="menu menu3 cid-ubA1KAdTKs" once="menu" id="menu">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <img src="assets/images/FinderLogo.png" alt="Logo" class="logo-image" style="max-width: 100px; height: auto;">
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-7" href="#Hotel" onclick="scrollToSection('menu')">Hotel Finder</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black display-4"  onclick="scrollToSection('book-now')" href="#Book">
                            Book Now</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="#Questions" onclick="scrollToSection('Questions')">
                            Questions</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="#Team" onclick="scrollToSection('Team')">Team</a>
                    </li>
                </ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="https://mobiri.se" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://mobiri.se" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-twitter socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://mobiri.se" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-instagram socicon"></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</section>

<!-- HEADER SECTION -->
<section data-bs-version="5.1" class="header13 cid-ubA1PC6c5a mbr-fullscreen" id="header13-1">

    

    
    <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(255, 255, 255);"></div>

    <div class="align-center container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-1"><strong>Welcome to Hotel Finder</strong></h1>
                
                <p class="mbr-text mbr-fonts-style mb-3 display-7">
                    Navigate your target Hotel with ease. Allow us to serve you as we process your booking with your desired hotel and confirmed it right back to you. 
                </p>
                
                <div class="social-row display-7 mt-5">
                    <div class="soc-item">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="mbr-iconfont socicon socicon-facebook"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="mbr-iconfont socicon socicon-twitter"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="mbr-iconfont socicon socicon-instagram"></span>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FORM SECTION -->
<section data-bs-version="5.1" class="form4 cid-ubA1YvZ7YV mbr-fullscreen" id="book-now">


    

    
    <div class="container">
        <div class="row content-wrapper justify-content-center">
            <div  id="addItemForm" class="col-lg-3 offset-lg-1 mbr-form" method="POST"data-form-type="formoid">
                <form id="addItemForm" class="mbr-form form-with-styler" action="submit_form.php" method="POST" data-form-title="Book your Stay Here">
                
                    <div class="dragArea row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="mbr-section-title mb-4 display-2">
                                <strong>Book your Stay Here</strong>
                            </h1>
                        </div>
                        <div class="col-lg-12 col-md col-12 form-group mb-3" data-for="itemName">
                            <input type="text" id="name" name="name" placeholder="Name" data-form-field="name" class="form-control" value="" required>
                        </div>
                        <div class="col-lg-12 col-md col-12 form-group mb-3" data-for="email">
                            <input type="email" id="email" name="email" placeholder="Email" data-form-field="email" class="form-control" value="" required>
                        </div>
                        <div class="col-lg-12 col-md col-12 form-group mb-3" data-for="contact">
                            <input type="tel" id="contact" name="contact" placeholder="Contact" data-form-field="contact" class="form-control" value="" required>
                        </div>
                        <div class="col-lg-12 col-md col-12 form-group mb-3" data-for="state">
                            <input type="text" id="state" name="state" placeholder="State" data-form-field="state" class="form-control" value="" required>
                        </div>
                        <div class="col-lg-12 col-md col-12 form-group mb-3" data-for="hotelname">
                            <input type="text" id="hotelname" name="hotelname" placeholder="Hotel Name" data-form-field="hotelname" class="form-control" value="" required>
                        </div>
                        <div class="col-lg-12 col-md col-12 form-group mb-3" data-for="booking_date">
                            <input type="date" id="booking_date" name="booking_date" placeholder="Booking Date" data-form-field="booking_date" class="form-control" value="" required>
                        </div>
                        <div class="col-12 col-md-auto mbr-section-btn">
                            <button type="submit" class="btn btn-secondary display-4">Submit</button>
                        </div>
                    </div>
                </form>
                
                
                
            </div>
            <div class="col-lg-7 offset-lg-1 col-12">
                <div class="image-wrapper" style="position: relative; padding-bottom: 75%;">
                    <div id="map" style="position: absolute; top: 0; bottom: 0; width: 100%;"></div>
                </div>
            </div>
        
            <script>
                mapboxgl.accessToken = 'pk.eyJ1Ijoib2tlZWhoaCIsImEiOiJjbHVvNDk1Y24wYm9kMm9wYno1OWphYWRoIn0.u9XOwVr9UDsug2oD_iVI2A';
                const map = new mapboxgl.Map({
                    container: 'map', 
                    style: 'mapbox://styles/mapbox/streets-v12', // Map style to use
                    center: [122.4797, 12.9716], // Center of Philippines [lng, lat]
                    zoom: 6 
                });
        
                map.addControl(
                    new mapboxgl.GeolocateControl({
                        positionOptions: {
                            enableHighAccuracy: true
                        },
                        trackUserLocation: true,
                        showUserHeading: true
                    })
                );
        
                const geocoder = new MapboxGeocoder({
                    // Initialize the geocoder
                    accessToken: mapboxgl.accessToken, 
                    mapboxgl: mapboxgl, 
                    marker: false, 
                    placeholder: 'Search for places in Philippines', 
                    country: 'PH', 
                });
        
                // Add the geocoder to the map
                map.addControl(geocoder);
        
        
                map.on('load', () => {
                    map.addSource('single-point', {
                        'type': 'geojson',
                        'data': {
                            'type': 'FeatureCollection',
                            'features': []
                        }
                    });
        
                    map.addLayer({
                        'id': 'point',
                        'source': 'single-point',
                        'type': 'circle',
                        'paint': {
                            'circle-radius': 10,
                            'circle-color': '#448ee4'
                        }
                    });

                    geocoder.on('result', (event) => {
                        map.getSource('single-point').setData(event.result.geometry);
                    });
                });
            </script>
        </div>
    </div>
</section>




<section data-bs-version="5.1" class="content17 cid-ubA2dyv2eH" id="Questions">

    <div class="container">
        <div class="row justify-content-between">
            <!-- Contacts Section -->
            <div class="col-lg-5">
                <div class="mbr-section-head">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                        <strong>Questions? Concern? Message Us</strong>
                    </h3>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-lg-10 mx-auto mbr-form" data-form-type="formoid">
                        <form action="message_submit.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                            <div class="dragArea row">
                                <div class="col-md col-sm-12 form-group mb-3" data-for="name">
                                    <input type="text" name="name" placeholder="Name" data-form-field="name" class="form-control" value="" id="nameQuestion">
                                </div>
                                <div class="col-md col-sm-12 form-group mb-3" data-for="email">
                                    <input type="email" name="email" placeholder="E-mail" data-form-field="email" class="form-control" value="" id="emailQuestion">
                                </div>
                                <div class="col-12 form-group mb-3" data-for="textarea">
                                    <textarea name="message" placeholder="Message" data-form-field="message" class="form-control" id="messageQuestion"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn">
                                    <button type="submit" class="btn btn-secondary display-4">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- FAQs Section -->
            <div class="col-lg-6">
                <div class="section-head align-center mb-4">
                    <h3 class="mbr-section-title mb-0 mbr-fonts-style display-2">
                        <strong>Frequently Asked Questions</strong>
                    </h3>
                </div>
                <div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content">
                    <!-- FAQ 1 -->
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse1_5" aria-expanded="false" aria-controls="collapse1">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>How can I book a hotel?</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse1_5" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-7">Just answer the form and we'll verify it back to you. After that we'll forward your request with the Hotel.</p>
                            </div>
                        </div>
                    </div>
                    <!-- FAQ 2 -->
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingTwo">
                            <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse2_5" aria-expanded="false" aria-controls="collapse2">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>How to be sure that my booking will be accepted with my Chosen Hotel?</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse2_5" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-7">We are already connected with all hotel available and we guarantee that your booking will reach out the Hotel.</p>
                            </div>
                        </div>
                    </div>
                    <!-- FAQ 3 -->
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingThree">
                            <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse3_5" aria-expanded="false" aria-controls="collapse3">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>How can we pay to the hotel?</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse3_5" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-7">After verifying the booking, the hotel itself will accompany you for all services and payments to fully processed your bookings.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- TEAM SECTION -->
<section data-bs-version="5.1" class="people5 mbr-embla cid-ubAajo8979" id="Team">

    

    
    

    <div class="position-relative text-center">
        <h3 class="mb-4 mbr-fonts-style display-3">
            <strong>Meet the Team</strong>
        </h3>

        <div class="embla" data-skip-snaps="true" data-align="center" data-auto-play-interval="5" data-draggable="true">
            <div class="embla__viewport container-fluid">
                <div class="embla__container">
                    <div class="embla__slide slider-image item" style="margin-left: 7rem; margin-right: 7rem;">
                        <div class="user">
                            <div class="user_image">
                                <div class="item-wrapper position-relative">
                                    <img src="assets/images/Cyril.jpg" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <div class="user_text mb-4">
                                <p class="mbr-fonts-style display-7">
                                    Everthing works Great
                                </p>
                            </div>
                            <div class="user_name mbr-fonts-style mb-2 display-7">
                                <strong>Cyril Jade Altar</strong>
                            </div>
                            <div class="user_desk mbr-fonts-style display-7">
                                DEVELOPER
                            </div>
                        </div>
                    </div>
                    <div class="embla__slide slider-image item" style="margin-left: 7rem; margin-right: 7rem;">
                        <div class="user">
                            <div class="user_image">
                                <div class="item-wrapper position-relative">
                                    <img src="assets/images/Jayrelle.jpg" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <div class="user_text mb-4">
                                <p class="mbr-fonts-style display-7">
                                    Made to Perfection
                                </p>
                            </div>
                            <div class="user_name mbr-fonts-style mb-2 display-7">
                                <strong>Jayrelle James Baldemor</strong>
                            </div>
                            <div class="user_desk mbr-fonts-style display-7">
                                DESIGNER
                            </div>
                        </div>
                    </div>
                    <div class="embla__slide slider-image item" style="margin-left: 7rem; margin-right: 7rem;">
                        <div class="user">
                            <div class="user_image">
                                <div class="item-wrapper position-relative">
                                    <img src="assets/images/Migol.jpg" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <div class="user_text mb-4">
                                <p class="mbr-fonts-style display-7">
                                    Maintaining the progress
                                </p>
                            </div>
                            <div class="user_name mbr-fonts-style mb-2 display-7">
                                <strong>Miguel Angelo Del Mundo</strong>
                            </div>
                            <div class="user_desk mbr-fonts-style display-7">
                                DEVELOPER
                            </div>
                        </div>
                    </div>
                    <div class="embla__slide slider-image item" style="margin-left: 7rem; margin-right: 7rem;">
                        <div class="user">
                            <div class="user_image">
                                <div class="item-wrapper position-relative">
                                    <img src="assets/images/Fea1.jpg" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <div class="user_text mb-4">
                                <p class="mbr-fonts-style display-7">
                                    My kind of Happiness
                                </p>
                            </div>
                            <div class="user_name mbr-fonts-style mb-2 display-7">
                                <strong>Fea Navarro</strong>
                            </div>
                            <div class="user_desk mbr-fonts-style display-7">
                                DESIGNER
                            </div>
                        </div>
                    </div>
                    <div class="embla__slide slider-image item" style="margin-left: 7rem; margin-right: 7rem;">
                        <div class="user">
                            <div class="user_image">
                                <div class="item-wrapper position-relative">
                                    <img src="assets/images/Raphael.jpg" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <div class="user_text mb-4">
                                <p class="mbr-fonts-style display-7">
                                    Security is a must
                                </p>
                            </div>
                            <div class="user_name mbr-fonts-style mb-2 display-7">
                                <strong>Raphael Moses Santos</strong>
                            </div>
                            <div class="user_desk mbr-fonts-style display-7">
                                DEVELOPER
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="embla__button embla__button--prev">
                <span class="mobi-mbri mobi-mbri-arrow-prev mbr-iconfont" aria-hidden="true"></span>
                <span class="sr-only visually-hidden visually-hidden">Previous</span>
            </button>
            <button class="embla__button embla__button--next">
                <span class="mobi-mbri mobi-mbri-arrow-next mbr-iconfont" aria-hidden="true"></span>
                <span class="sr-only visually-hidden visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer3 cid-ubA23Imgqg" once="footers" id="footer3-3">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    
                    
                    
                    
                    
                <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white" href="#Book" onclick="scrollToSection('book-now')">Book Now</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white" href="#Question" onclick="scrollToSection('Questions')">Questions</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white" href="#Team" onclick="scrollToSection('Team')">Team</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                    
                    
                    
                    
                    
                    
                <div class="soc-item">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com/c/mobirise" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://instagram.com/mobirise" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                            <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.behance.net/Mobirise" target="_blank">
                            <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2024 Hotel Finder. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</section>

<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/smoothscroll/smooth-scroll.js"></script>
<script src="assets/ytplayer/index.js"></script>
<script src="assets/dropdown/js/navbar-dropdown.js"></script>
<script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>
<script src="assets/embla/embla.min.js"></script>
<script src="assets/embla/script.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/formoid/formoid.min.js"></script>

<script>
    function scrollToSection(sectionId) {
        var section = document.getElementById(sectionId);
        if (section && !isElementInViewport(section)) {
            section.scrollIntoView({ behavior: 'smooth' });
        }
    }

    function isElementInViewport(element) {
        var rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Add event listeners to navigation links
    document.addEventListener('DOMContentLoaded', function () {
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        navLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default link behavior
                var targetSectionId = link.getAttribute('href').substring(1); // Get section ID from href
                scrollToSection(targetSectionId); // Scroll to the target section
            });
        });
    });
</script>

</body>
</html>
