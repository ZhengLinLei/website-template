<?php
//Start caching------------
$config = json_decode(file_get_contents('../../../config.json'));

if($config->cache){
    function arrQueryMaker($num){
        $arr = [];
        for($i = 1; $i <= $num; $i++){
            array_push($arr, "::$i::");
        }
        return $arr;
    }
    //Migration section;
    $content = '<?php return ["database" => '.(($config->migration->database)?'true':'false').', "table" => '.(($config->migration->table)?'true':'false').'];';
    file_put_contents('../../cache/database.php', $content);
    //Backend section
    $content = '<?php return ["admin" => ["type" => "'.(($config->backend->admin->type)?'true':'false').'", "user" => '.json_encode($config->backend->admin->master->user).', "password" => '.json_encode($config->backend->admin->master->password).'], "plugin" => ["ecommerce" => '.(($config->backend->plugin->ecommerce)?'true':'false').', "blog" => '.(($config->backend->plugin->blog)?'true':'false').', "comment" => '.(($config->backend->plugin->comment)?'true':'false').']];';
    file_put_contents('../../cache/backend.php', $content);
    //Database configuration;
    $content = '<?php
    namespace Config\database;
    
    class DBconnection {
        protected $connection = [
            "host" => "::1::", // Host and port
            "database" => "::2::", // Database name
            "user" => "::3::", // User
            "password" => "::4::" // Password
        ];
        public function connect(){
            try {
                return new \PDO("mysql:host=".$this->connection["host"].";dbname=".$this->connection["database"].";charset=::5::", $this->connection["user"], $this->connection["password"]);
            } catch (\PDOException $defaultPDOError) {
                print "::6::";
                die();
            }
        }
    }';
    $query = arrQueryMaker(6);
    $database_config = [$config->database->host, $config->database->database, $config->database->user, $config->database->password, $config->database->connection_charset, $config->database->default_error_text];
    $content = str_replace($query, $database_config, $content);
    file_put_contents('../../database/database.php', $content);
    //Mail configuration
    $content = '<?php
    namespace Config\mail;
    
    class MailSend{
        protected $from = "::1::"; // Write a default email
        protected $name = "::2::"; // Write a default name
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
    }';
    $query = arrQueryMaker(2);
    $mail_config = [$config->mail->default_email, $config->mail->default_name];
    $content = str_replace($query, $mail_config, $content);
    file_put_contents('../../mail/mail.php', $content);
    
    exit('Config cached and saved');
}else{
    header('Location: ./');
}