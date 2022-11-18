<?
//메일보내기
function mailer($fname, $fmail, $to, $subject, $content, $type=0, $file="", $cc="", $bcc="") 
{
    $fname = "novustec";
	$fmail = "no-reply@novustec.co.kr";

    $fname   = "=?UTF-8?B?" . base64_encode($fname) . "?=";
    $subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";

    $header  = "Return-Path: <$fmail>\n";
    $header .= "From: $fname <$fmail>\n";
    $header .= "Reply-To: <$fmail>\n";
    if ($cc)  $header .= "Cc: $cc\n";
    if ($bcc) $header .= "Bcc: $bcc\n";
    $header .= "MIME-Version: 1.0\n";
   
    // UTF-8 관련 수정
    $header .= "X-Mailer: ClickMailer Ver 4.0.0 \n";

	$header .= "Content-Type: TEXT/PLAIN; charset=UTF-8\n";
    $content = stripslashes($content);
		
    $header .= "Content-Transfer-Encoding: BASE64\n\n";
    $header .= chunk_split(base64_encode($content)) . "\n";

    return mail($to, $subject, "", $header);
}



define(CRLF,'"\n"');

//메일보내기
function mailer2($to, $subject, $content, $type=1)
{
	$fname = "novustec";
	$fmail = "no-reply@novustec.co.kr";

    $fname   = "=?UTF-8?B?" . base64_encode($fname) . "?=";
    $subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
    //$g4[charset] = ($g4[charset] != "") ? "charset=$g4[charset]" : "";

    $header  = "Return-Path: <$fmail>".CRLF;
    $header .= "From: $fname <$fmail>".CRLF;
    $header .= "Reply-To: <$fmail>".CRLF;
    if ($cc)  $header .= "Cc: $cc".CRLF;
    if ($bcc) $header .= "Bcc: $bcc".CRLF;
    $header .= "MIME-Version: 1.0".CRLF;
    $header .= "X-Mailer: ClickMailer Ver 4.0.0".CRLF;
  
	$header .= "Content-Type: TEXT/HTML; charset=UTF-8".CRLF;	
    $header .= "Content-Transfer-Encoding: BASE64".CRLF.CRLF;
    $header .= chunk_split(base64_encode($content)) .CRLF;

    return mail($to, $subject, "", $header);
}



$name = @$_GET['name'];
$mail = @$_GET['mail'];
$msg =  @$_GET['msg'];

$con = "[ 연락처 ]\r\n$name ($mail)\r\n\r\n[ 내용 ]\r\n$msg";

echo mail('s211312@gmail.com', '1123', '32132');
echo '22';
//echo mailer2('s211312@gmail.com','novustec contact us2',$con);
?>