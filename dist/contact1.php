<?php
	if($_POST)
	{
		require('constant.php');
		
		$user_name      = filter_var($_POST["お名前"], FILTER_SANITIZE_STRING);
		$user_company   = filter_var($_POST["会社名"], FILTER_SANITIZE_STRING);
		$user_email     = filter_var($_POST["メールアドレス"], FILTER_SANITIZE_EMAIL);
		$user_phone     = filter_var($_POST["電話番号"], FILTER_SANITIZE_STRING);
		$subject        = filter_var($_POST["件名"], FILTER_SANITIZE_STRING);
		$content   		= filter_var($_POST["お問い合わせ内容"], FILTER_SANITIZE_STRING);
		
		if(empty($user_name)) {
			$empty[] = "<b>お名前</b>";		
		}
		
		if(empty($user_company)) {
			$empty[] = "<b>会社名</b>";		
		}

		if(empty($user_email)) {
			$empty[] = "<b>メールアドレス</b>";
		}
		
		if(empty($user_phone)) {
			$empty[] = "<b>電話番号</b>";
		}	

		if(empty($subject)) {
			$empty[] = "<b>件名</b>";
		}	

		if(empty($content)) {
			$empty[] = "<b>お問い合わせ内容</b>";
		}
		
		if(!empty($empty)) {
			$output = json_encode(array('type'=>'error', 'text' => implode(", ",$empty) . ' Required!'));
			die($output);
		}
		
		if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
			$output = json_encode(array('type'=>'error', 'text' => '<b>'.$user_email.'</b> is an invalid Email, please correct it.'));
			die($output);
		}
		
		//reCAPTCHA validation
		if (isset($_POST['g-recaptcha-response'])) {
			
			require('recaptcha/src/autoload.php');		
			
			$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);

			$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

			if (!$resp->isSuccess()) {
					$output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!'));
					die($output);				
			}	
		}
		
		$toEmail = "ps2104001@gmail.com";
		$mailHeaders = "From: " . $user_name . " <" . $user_email . ">\r\n";
		$mailBody = "NAME: " . $user_name . "\n";
		$mailBody = "会社名: " . $user_company . "\n";
		$mailBody .= "メールアドレス: " . $user_email . "\n";
		$mailBody .= "電話番号: " . $user_phone . "\n";
		$mailBody .= "件名: " . $subject . "\n";
		$mailBody .= "お問い合わせ内容: " . $content . "\n";

		if (mail($toEmail, "Contact Mail", $mailBody, $mailHeaders)) {
			$output = json_encode(array('type'=>'section', 'text' => 'Hi '.$user_name .', thank you for the comments. We will get back to you shortly.'));
			die($output);
		} else {
			$output = json_encode(array('type'=>'error', 'text' => 'Unable to send email, please contact'.SENDER_EMAIL));
			die($output);
		}
	}
?>