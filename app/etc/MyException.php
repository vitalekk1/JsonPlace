<?php
namespace App\etc;

class MyException extends \Exception{

    public function __construct($messsage){
        parent::__construct($messsage);
        $this->writeToFile($messsage);
    }

    private function writeToFile($messsage){
        error_log(date("Y-m-d H:i:s") . ' :: ' . $messsage . PHP_EOL, 3, "/var/www/logs/my-errors.log");
    }

}