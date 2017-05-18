<?php
class MailService
{
    private $subject;
    private $message; // not correct to make this property public,
    private $recipient;

    public function setDatas($recipient, $subject, $message)
    {
        $this->recipient = $recipient;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function send()
    {
        mail($this->recipient, $this->subject, $this->message);
    }
}


class MailAttach extends MailService
{
    private $message = 'error attach'; //  this  property will be changed
    //          after using method from parent-class Mail-service (if it's public)

    public function attach($attach)
    {
        if(empty($attach))
        {
            echo $this->message;
            die;
        }
    }
}

//$obj = new MailAttach;
//$obj->setDatas('goper@tut.by', 'Тема', 'Cообщение');
//$obj->attach(null);
//$obj->send();


class A
{
    private function method()
    {
        return 'A';
    }

    public function t(){
        return $this->method();
    }
}

class B extends A
{
    public function method()
    {
        return 'B';
    }
}
$obj = new B;
echo $obj->method();
echo $obj->t();