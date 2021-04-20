<?php
	require('constant.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/js/contact.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="assets/css/contact1.css">
</head>

<body>
    <div id="central">
        <div class="content">
            <h1>Contact</h1>
            <!-- <p>Send your comments through this form and we will get back to you. </p> -->
            <div id="message">
                <form id="frmContact" action="" method="POST" novalidate="novalidate">
                    <div class="label">Name:</div>
                    <div class="field">
                        <input type="text" id="name" name="name" placeholder="enter your name here"
                            title="Please enter your name" class="required" aria-required="true" required>
                    </div>
                    <div class="label">Email:</div>
                    <div class="field">
                        <input type="text" id="email" name="email" placeholder="enter your email address here"
                            title="Please enter your email address" class="required email" aria-required="true"
                            required>
                    </div>
                    <div class="label">Phone Number:</div>
                    <div class="field">
                        <input type="text" id="phone" name="phone" placeholder="enter your phone number here"
                            title="Please enter your phone number" class="required phone" aria-required="true" required>
                    </div>
                    <div class="label">Comments:</div>
                    <div class="field">
                        <textarea id="comment-content" name="content" placeholder="enter your comments here"></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>
                    <div id="mail-status"></div>
                    <button type="Submit" id="send-message" style="clear:both; margin: 0 auto;">Submit</button>
                </form>
                <div id="loader-icon" style="display:none;"><img src="img/loader.gif" /></div>
            </div>
        </div><!-- content -->
    </div><!-- central -->
</body>
</html>