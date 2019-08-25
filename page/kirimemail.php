<?php
require('phpmailer/class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "elang.uptdam@gmail.com";
$mail->Password = "emailelanguptam999";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("elang.uptdam@gmail.com", "Elang UPTD Air Minum Kota Cimahi");
$mail->AddReplyTo("elang.uptdam@gmail.com", "Elang UPTDAM Cimahi");
$mail->AddAddress("recipient email");
$mail->Subject = ""; //isi subjek
$mail->WordWrap   = 80;
$content = ""; //isi konten
$mail->MsgHTML($content);
$mail->IsHTML(true);

if(!$mail->Send()) 
    echo "Problem sending email.";
else 
    echo "email sent.";
?>