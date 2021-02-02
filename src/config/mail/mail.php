<?php
    namespace Config\mail;
    
    class MailSend{
        protected $from = "default@email.com"; // Write a default email
        protected $name = "DefaultName"; // Write a default name
        protected $to, $title, $body, $header;
        public function __constructor($to, $title, $body, $name=$this->name, $from=$this->from){
            $this->to = $to;
            $this->title = "=?utf-8?B?".base64_encode($title)."?=\n";
            $this->body = $body;
            $this->header = "From: ".$name." <".$from."> " . "\r\n" .
                             "X-Mailer: PHP/" . phpversion(). "\r\n" .
                             "MIME-Version: 1.0" . "\r\n" .
                             "Content-type: text/html; charset=utf-8" . "\r\n";
        }
    
        public function sendMail(){
            return mail($this->to, $this->title, $this->body, $this->header);
        }
    }