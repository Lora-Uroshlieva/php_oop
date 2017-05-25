<?php
if (!empty($_POST)) {
    echo "Your message was sent successfully!";
}

class ContactForm
{
    protected $user_name;
    protected $email;
    protected $subject;
    protected $message;

    /**
     * ContactForm constructor.
     * @param $user_name
     * @param $email
     * @param $subject
     * @param $message
     */
    public function __construct($user_name, $email, $subject, $message)
    {
        $this->user_name = $user_name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }
}

$contact = new ContactForm($_POST["user_name"], $_POST["email"], $_POST["subject"], $_POST["message"]);
var_dump($contact);