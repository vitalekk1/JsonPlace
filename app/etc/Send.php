<?php
namespace App\etc;

use App\etc\MyException;

class Send {

    private $base_url = 'https://jsonplaceholder.typicode.com';

    private $errors = [];


    //Отправка запроса в api
    public function sendRequest($table, $options = '', $method = 'GET', $data = null) 
    {
        $result = [];
        $url = $this->base_url . '/' . $table . $options;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($method != 'GET' && $data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
    
        try {
            $this->clearErrors();

            $response = curl_exec($ch);
            if ($response === false)
            {
                throw new MyException("Невозможно сделать запрос к данному ресурсу");
            }

            $result = json_decode($response, true);

            if(!is_array($result)){
                throw new MyException("Неверный формат данных");
            } 
            
        } catch (MyException $exception){
            $this->errors[] = $exception->getMessage();
        }

        curl_close($ch);

        return $result != null ? $result : [];
    }

    //Очистка массива с ошибками
    private function clearErrors(): void 
    {
        $this->errors = [];
    }

    //Проверка, есть ли ошибки
    public function isSuccess(): bool 
    {
        return empty($this->errors);
    }

    //Получение списка ошибок
    public function getErrors(): array 
    {
        return $this->errors;
    }

}