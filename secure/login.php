<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="../src/css/font-awesome.css"/>
</head>
<body>
<?php
    <form class="form" method="post" name="login">
        <h1 class="login-title" style="font-family: 'DiscordHeavy';">Secure Login</h1>
        <input type="text" class="login-input" name="username" style="font-family: 'Ubuntu'; color: #000;" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" style="font-family: 'Ubuntu'; color: #000;" placeholder="Password"/>
        <center><input type="submit" style="font-family: 'DiscordThin';" value="Login" name="submit" class="button"/></center>
        <p class="link" style="font-family: 'Ubuntu';">Don't have an account? <a href="registration">Register Now</a>!</p>
  </form>
        <!-- START Bootstrap-Cookie-Alert -->
        <div class="alert text-center cookiealert" role="alert" style="font-size: 24px; font-family: arial; padding: 20px;">
    <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you, get the best experience on our website. <a href="/information#cookie" target="_blank">Learn more</a><button type="button" style="border-radius: 8px; border: solid #7289da; background-color: #7289da; color: #fff;" class="btn btn-primary btn-sm acceptcookies">
        I accept
    </button>
</div>
<!-- END Bootstrap-Cookie-Alert -->
<!-- Include cookiealert script -->
<script src="../src/js/cookiealert.js"></script>
    <link rel="stylesheet" href="../src/css/cookiealert.css">
</body>
</html>
