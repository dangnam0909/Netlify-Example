<?php
    require('contact/helpers.php');
    require('contact/mailer-helper.php');
    $error = array();
    $data = array();

    $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['company'] = isset($_POST['company']) ? $_POST['company'] : '';
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['tel'] = isset($_POST['tel']) ? $_POST['tel'] : '';
    $data['subject'] = isset($_POST['subject']) ? $_POST['subject'] : '';
    $data['message'] = isset($_POST['message']) ? $_POST['message'] : '';

    if ($_SERVER['REQUEST_METHOD'] === "POST"):
 
        // validate

        if (empty($data['name'])) {
            $error['name'] = "お名前をご入力ください。";
        }
    
        if (empty($data['company'])) {
            $error['company'] = "お名前をご入力ください。";
        }

        if (empty($data['email'])) {
            $error['email'] = 'メールアドレスをご入力ください。';
        }

        if (empty($data['tel'])) {
            $error['tel'] = '電話番号をご入力ください。';
        }

        if (empty($data['subject'])) {
            $error['subject'] = 'タイトルを入力してください';
        }

        if (empty($data['message'])) {
            $error['message'] = 'コメントを入力してください';
        }

        // //reCAPTCHA validation
		// if (isset($_POST['g-recaptcha-response'])) {
				
		// 	$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);

		// 	$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		// 	if (!$resp->isSuccess()) {
		// 			$output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!'));
		// 			die($output);				
		// 	}
		// }
        // $context = stream_context_create($options);
        // $response = file_get_contents($url, false, $context);
        // $res = json_decode($response, true);

        // if ($res['success'] == true && $res['score'] >= "0.3") {
        //     // echo "recaptcha ok";
        // } else {
        //     $error['recaptcha'] = "You are a robot!";
        //     // echo $error['recaptcha'];
        // }
        // print_r(json_decode($response, true));
    endif;

    // sendmail
    if (isset($_POST['submit'])):
        $name = $data['name'];
        $tel = $data['tel'];
        $email = $data['email'];
        $company = $data['company'];
        $subject = $data['subject'];
        $message = $data['message'];
        
        $email_admin = "ps2104001@gmail.com";

        // content mail
        $mailContent   = "【送信内容】".  "\n";
        $mailContent  .= "==================================================".  "\n";
        $mailContent  .= 'お名前: '.$name.  "\n";
        $mailContent  .= '会社名: '. $company . "\n";
        $mailContent  .= 'メールアドレス: '. $email . "\n";
        $mailContent  .= '電話番号: '. $tel . "\n";
        $mailContent  .= '件名: '. $subject . "\n";
        $mailContent  .= 'お問い合わせ内容: '. $message . "\n";
        $mailContent  .= "==================================================".  "\n";

        // mail admin:

        $subject_admin  = "【ohr】お客様よりお問い合わせがありました";
        // ※管理者用通知メール※＿＿『サイト名』お客様よりお問い合わせがありました

        $message_admin  = "ホームページのフォームより以下の内容でお問い合わせありました。"."\n\n";
        $message_admin .= $mailContent;
        $message_admin .= "※本メールはサーバーからの自動返信メールとなっております。";

        // mail customer

        $email_customer = $email;
        $subject_customer  = "【ohr】お問い合わせありがとうございました。";
        // $title_customer = mb_convert_encoding($subject_customer, "UTF-8","auto");
        $message_customer .= 'お名前: '.$name.  "\n\n";
        $message_customer .= "この度は弊社ホームページへのお問い合わせいただき"."\n";
        $message_customer .= "誠にありがとうございました。"."\n";
        $message_customer .= "フォームより以下の内容で送信いたしました。"."\n\n";
        $message_customer .= "送信内容確認後、改めて担当者よりご連絡いたしますので"."\n";
        $message_customer .= "今しばらくお待ちください。"."\n\n";
        $message_customer .= $mailContent;
        $message_customer .= "※本メールはサーバーからの自動返信メールとなっております。"."\n";
        $message_customer .= "本メールに返信いただいてもご連絡いたしかねますのでご了承ください。"."\n";

        $send = new mailer_helper();

        if ($send->sendMail($email_admin, $message_admin, $subject_admin) && $send->sendMail($email, $message_customer, $subject_customer)){
            redirect("./contact_confirm.php","POST");
        }
        else{
            ?>
<p>お問い合わせ内容を送信できませんでした。</p>
<p>しばらくたってから、もう一度お試しください。</p>
<?php
        }
        
    endif;