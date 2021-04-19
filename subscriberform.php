<?php
    if($_POST["Message"]) {
        mail("john@gmail.com", "Here is the sample subject line",
        $_POST["Insert Your Message"]. "From: ps2104001@gmail.com");
    }
?>