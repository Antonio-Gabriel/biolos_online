<?php

use Vendor\config\RainTpl;

class Mailer
{
    public const USERNAME = '';
    public const PASSWORD = '';
    public const NAME_FROM = 'BioloOnline Store Store';

    private $mail;

    public function __construct($toAddres, $toName, $subject, $tplName, $data = [])
    {
        $template = new RainTpl("views/email/");

        $html = $template->setTpl($tplName, $data);

        // server config
        $this->mail = new \PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->Debugoutput = 'html';
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Port = 587;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->SMTPAuth = true;

        // email params
        $this->mail->Username = Mailer::USERNAME;
        $this->mail->Password = Mailer::PASSWORD;
        $this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);
        $this->mail->addAddress($toAddres, $toName);
        $this->mail->Subject = $subject;
        $this->mail->msgHTML($html);
        $this->mail->AltBody = 'This is a plain-text message body';
    }

    public function sendMail()
    {
        return $this->mail->send();
    }
}