<?php

namespace Vendor\config;

use Rain\Tpl;

class Mailer
{
    public const USERNAME = 'osvaldocariege06@gmail.com';
    public const PASSWORD = 'osvaldocariege@gmail';
    public const NAME_FROM = 'BioloOnline Store';

    private $mail;

    public function __construct($toAddres, $toName, $subject, $tplName, $data = [])
    {
        $config = array(
            "tpl_dir"   => $this->getPathLocation("views/email/")["tpl"],
            "cache_dir" => $this->getPathLocation("views/cache/")["tpl"],
            "debug"     => false,
        );

        Tpl::configure($config);

        $tpl = new Tpl();

        foreach ($data as $key => $value) {
            $tpl->assign($key, $value);
        }
        $html = $tpl->draw($tplName, true);

        // server config
        try {
            $this->mail = new \PHPMailer();
            $this->mail->isSMTP();
            $this->mail->SMTPDebug = 0;
            $this->mail->Debugoutput = 'html';
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->Port = 587;
            $this->mail->SMTPSecure = "tls";
            $this->mail->SMTPAuth = true;

            // email params
            $this->mail->Username = Mailer::USERNAME;
            $this->mail->Password = Mailer::PASSWORD;
            $this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);
            $this->mail->addAddress($toAddres, $toName);
            $this->mail->Subject = $subject;
            $this->mail->msgHTML($html);
            $this->mail->AltBody = 'This is a plain-text message body';
        } catch (\Exception $th) {
            //throw $th;
            echo $th;
        }
    }

    public function sendMail()
    {
        return $this->mail->send();
    }

    private function getPathLocation($views)
    {
        return [
            "tpl" => $_SERVER["DOCUMENT_ROOT"]
                . DIRECTORY_SEPARATOR . "bioloOnline"
                . DIRECTORY_SEPARATOR . "src"
                . DIRECTORY_SEPARATOR . $views,

            "cache" => $_SERVER["DOCUMENT_ROOT"]
                . DIRECTORY_SEPARATOR . "bioloOnline"
                . DIRECTORY_SEPARATOR . "src"
                . DIRECTORY_SEPARATOR . $views . "cache/"
        ];
    }
}
