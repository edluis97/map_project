<?php

class Email
{
  
  public static function send($data) {
    global $siteInfo;
    global $smtp;
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require_once $siteInfo['root'].'/site/Core/Providers/PHPMailer/src/Exception.php';
    require_once $siteInfo['root'].'/site/Core/Providers/PHPMailer/src/PHPMailer.php';
    require_once $siteInfo['root'].'/site/Core/Providers/PHPMailer/src/SMTP.php';
    
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    
    try {
         $mail->Host       = $smtp['smtp_server'];
         $mail->SMTPDebug  = $smtp['debug'];
         $mail->SMTPAuth   = $smtp['auth'];
         $mail->SMTPSecure = $smtp['secure'];
         $mail->Port       = $smtp['port'];
         $mail->Username   = $smtp['sender_address'];
         $mail->Password   = $smtp['password'];

         if (isset($data['email'])) {
           $mail->AddAddress($data['email'], $data['email']);
         } else {
           $mail->AddAddress($smtp['to_address'], $smtp['to_alias']);
         }         
         
         $mail->AddReplyTo($smtp['reply_address'], $smtp['reply_alias']);
         
         $mail->SetFrom($smtp['sender_address'], $smtp['sender_alias']);
         
         if(isset($data['cc']) && !empty($data['cc'])) {
           if (!isset($data['ccName']) || empty($data['ccName'])) {
             $data['ccName'] = $data['cc'];
           }
            $mail->AddCC($data['cc'], $data['ccName']);
         } else {
           if (!empty()) {
             $mail->AddCC($smtp['cc'], $smtp['ccName']);
           }
         }         
         
         if (!empty($smtp['bcc'])) {
           $mail->AddBCC($smtp['bcc'], $smtp['bccName']);
         }
         
         
         if (isset($data['subject'])) {
           $mail->Subject = $data['subject'];
         }
         
         $mail->AltBody = 'Para ver este email correctamente active a vista com HTML'; // optional - MsgHTML will create an alternate automatically
         $mail->MsgHTML($data['message']);
         
         if (isset($data['attachment']) && !empty($data['attachment'])) {
           //attachment must be the path to resource
           
           if (isset($data['attachment_with_root']) && $data['attachment_with_root'] == true) {
             //path must include the real root
             $mail->AddAttachment($data['attachment']); 
           } else {
             //path is relative to project, no need for actual root
             $mail->AddAttachment($siteInfo['root'].'/'.$data['attachment']); 
           }
           
         }

      }
      catch (phpmailerException $e) {  echo $e->errorMessage(); }   //Pretty error messages from PHPMailer

      if(!$mail->Send()){
         return false;
      } else {
         return true;
      }
  }
  
}