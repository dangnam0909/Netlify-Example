<?php
	require('constant.php');
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/contact.css">
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="icon" href="../img/log/favicon.png">
        <title>Contact</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <div class="header_logo">
                <a href="index.php" title="OHR" class="logo">
                    <h1>OHR</h1>
                </a>
                <div class="head_title">
                    <a href="" class="p_title">沖縄県人材育成事業協同組合
                        <span class="p_title_ohr">OHR <wbr>(Okinawa Human Resources Cooperative)</span></a>
                    <span class="ohr">OHR</span>
                </div>
            </div>
            <nav>
                <ul>
                    <li class="hide-pc"><a href="index.php" title="HOME">About</a></li>
                    <li><a href="#" title="PRODUCTS">Our Services</a></li>
                    <li><a href="#" title="BUSINESS">Message</a></li>
                    <li><a href="#" title="COMPANY">Cooperative</a></li>
                    <li><a href="kumiai.php" title="CONTACT">News</a></li>
                    <li><a href="contact.php" title="Contact">Contact</a></li>
                </ul>
            </nav>
            <div id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div id="menu_bg"></div>
        </header>
        <main class="contact">
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-sm-8 message">
                            <h1 class="mgt_30 mgb_30"><a href="/" title="contact" class="contact_title">Contact</a></h1>
                            <p class="p_contat pdb_30">以下の内容をご記入いただき、送信ボタンをクリック<wbr>してください。</p>
                            <form action="contact_confirm.php" id="form" name="form" method="POST" novalidate="novalidate"> 
                                <label class="need" for="name">お名前</label>
                                <input type="text" id="name" name="お名前" required>
                                <label for="company">会社名</label>
                                <input type="text" id="company" name="会社名">
                                <label class="need" for="email">メールアドレス</label>
                                <input type="email" id="email" name="メールアドレス" required>
                                <label for="email_confirmation">メールアドレス</label>
                                <input type="text" id="email_confirmation" name="メールアドレス" required>
                                <p class="pdb_20">※キャリアメール（au,docomoなど）以外でお願いします。キャリアメールですと、うまく返信ができない場合がございます。<br>
                                    　何かしらの理由でメールが返信できない場合は、お電話させていただきますので、予めご了承ください。
                                </p>
                                <label class="need" for="tel">電話番号</label>
                                <input type="tel" id="tel" name="電話番号" required>
                                <label for="subject">件名</label>
                                <input type="text" id="subject" name="件名">
                                <label class="need" for="message">お問い合わせ内容</label>
                                <textarea id="message" name="お問い合わせ内容" cols="30" rows="10" required> </textarea>
                                <div class="g-recaptcha d-flex-center" data-sitekey="<?php echo SITE_KEY; ?>"></div>
                                <div id="mail-status"></div>
                                <button type="submit" id="send-message" value="send" class="btn mg_au"style="display: flex;">送 信 </button>
                            </form>
                            <!-- <div id="loader-icon" style="display:none;"><img src="assets/img/loader.gif" /></div> -->
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="footer">
            <a href="index.html" target="_blank" class="footer_logo" title="sample"></a>
            <small class="copyright cp">&copy; <span class="year"></span> OHR (Okinawa Human Resources Cooperative)</small>
            <div class="footer-right">
                <small class="privacy">
                    <a href="privacy.php">Privacy Policy</a>
                </small>
                <small class="copyright sp">&copy; <span class="year"></span> OHR</small>
                <div class="footer_sns">
                    <a href="" class="fb_img" title="facebook"></a>
                </div>
            </div>
        </footer>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@latest/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/function.js"></script>
    <script src="assets/jquery/jquery-3.2.1.min.js"></script>
    <!-- <script src="assets/js/contact.js"></script> -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</html>