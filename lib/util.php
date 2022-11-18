<?php
// 메일 발송
function sendMail($email, $subject, $con){
	include_once("lib.smtp.mailer/class.phpmailer.php");
	include_once("lib.smtp.mailer/class.smtp.php");
	
	$smtp_mail_id = "test@novustec.co.kr";			// Gmail 아이디
	$smtp_mail_pw = "shqmtmxpr1!";					// Gmail 패스워드
	
	$title = "=?UTF-8?B?".base64_encode($subject)."?="; //예)홍길동님의 문의사항 등록되었습니다.
	$from_name = "report";
	$from_email = "test@novustec.co.kr";
	$content =  $con;
	
	$smtp_use = 'smtp.worksmobile.com'; //웍스 메일 사용
	
	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	try {
		$mail->Host = $smtp_use; 			// email 보낼때 사용할 서버를 지정
		$mail->SMTPAuth = true; 			// SMTP 인증을 사용함
		$mail->Port = 465; 					// email 보낼때 사용할 포트를 지정
		$mail->SMTPSecure = "ssl"; 			// SSL을 사용함
		$mail->Username = $smtp_mail_id; 	// 계정
		$mail->Password = $smtp_mail_pw; 	// 패스워드
		$mail->SetFrom($from_email); 		// 보내는 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
		//$mail->SetFrom($from_email, $from_name); // 보내는 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
		$mail->AddAddress($email); 				// 받을 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능) 
		$mail->Subject = $title; 			// 메일 제목
		$mail->MsgHTML($content); 			// 메일 내용 (HTML 형식도 되고 그냥 일반 텍스트도 사용 가능함)
		return $mail->Send(); // 실제로 메일을 보냄
	} catch (phpmailerException $e) {
		echo $e->errorMessage();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

?>