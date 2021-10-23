<?php
    // connect heartbeat here
?>

<?php
    include("src/php/log.php") // log their ip if they visited the page
?>
<html>
    <!-- External -->
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/font-awesome.css">
    <script src="src/js/script.js"></script>
        <!-- Cookie Constent -->
        <link rel="stylesheet" href="cookie.css">
        <script src="src/js/cookie.js"></script>
    
    <!-- Open Graph -->
    <meta property="og:image" content="src/img/logo.png" />
    <meta property="og:title" content="Dashboard - DownNotify" />
    <meta property="og:description" content="View DownNotify Dashboard" />
    <meta property="og:site_name" content="www.minco.kro.kr/downnotify/dashboard" />
    <meta name="theme-color" content="# ADD HEX COLOR HERE WHATEVER YOU WANT" />
    <meta name="title" content="Dashbord - DownNotify" />
    <meta name="description" content="View DownNotify Dashboard" />
    
    <footer>
     <!-- START Bootstrap-Cookie-Alert -->
    <div class="alert text-center cookiealert" role="alert" style="font-size: 24px; font-family: arial; padding: 20px;">
    <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you to the best experience on our dashboard. <a href="information#cookie" target="_blank">Learn more</a><button type="button" style="border-radius: 8px; border: solid #7289da; background-color: #7289da; color: #fff;" class="btn btn-primary btn-sm acceptcookies">I accept</button>
    </div>
    <!-- END Bootstrap-Cookie-Alert -->
    <!-- Include cookiealert script -->
    <script src="src/js/cookie.js"></script>
    <link rel="stylesheet" href="src/css/cookie.css">
    </footer>
</html>
