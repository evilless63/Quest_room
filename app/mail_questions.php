<?php
function mail_attachment($filename, $mailto, $from_mail, $from_name, $replyto, $subject, $message) 
{
    $file = $filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=utf-8 \r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; 
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    return mail($mailto, $subject, "", $header);     
}

$sendto   = "vitaliy030589@gmail.com"; 		
$username = $_POST['mailUsName'];
$useremail  = $_POST['mailUsEmail'];
$usermsg = $_POST['mailUsText'];
$subjectuser  = "Сообщение";
$headersuser  = "From: Сообщение\r\n";
$headersuser .= "Reply-To: ". strip_tags($username) . "\r\n";
$headersuser .= "MIME-Version: 1.0\r\n";
$headersuser .= "Content-Type: text/html;charset=utf-8 \r\n";
$my_file = "";
if (!empty($_FILES['file']['tmp_name'])) 
 {
$path = $_FILES['file']['name']; 
if (copy($_FILES['file']['tmp_name'], $path)) $my_file = $path; 
 }			
$my_name = "Вопросы и предложения"; 					
$my_mail = "vitaliy030589@gmail.com"; 						
$my_replyto = "vitaliy030589@gmail.com";
$my_message = "Имя: ".$username."\r\nЕ-mail: ".$useremail."\r\nСообщение: ".$usermsg."\r\n";

if(@mail_attachment($my_file, $sendto, $my_mail, $my_name, $my_replyto, $subjectuser, $my_message)){
		echo "true";
} else {
	echo "false";
}

?>
