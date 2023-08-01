<?php
namespace App\Models;

use App\etc\Send;
use App\etc\Instance;

abstract class Model extends Instance {

    // Таблица, связанная с моделью.
    protected $table;

    public $send;

    function __construct()
    {
        $this->send = new Send();
    }

    // Метод для получения всех записей с таблицы
    public function all(): array
    {
        $result = $this->send->sendRequest($this->table);

        return $result;
    }

    // Метод для получения записей по определенному критерию
    public function where($columns = []): array
    {
        $options = '?';

        if (count($columns)) {
        
            foreach ($columns as $key => $value){
                $options = $options . $key . '=' . $value . '&';
            }

            $options = substr($options,0,-1);
        }
        
        $result = $this->send->sendRequest($this->table, $options);

        return $result;
    }

    //Метод для получения определнной записи
    public function find($id): array
    {
        $options = '/' . $id;
        $result = $this->send->sendRequest($this->table, $options);

        return $result;
    }

    // Метод для добавления новой записи
    public function create($data): array
    {
        $result = $this->send->sendRequest($this->table, '', 'POST', $data);

        return $result;
    }

    // Метод для редактирования записи
    public function update($id, $data): array
    {
        
        $options = '/' . $id;
        $result = $this->send->sendRequest($this->table, $options, 'PUT', $data);

        return $result;
    }

    // Метод для удаления записи
    public function delete($id): array
    {
        $options ='/' . $id;
        $result = $this->send->sendRequest($this->table, $options, 'DELETE');

        return $result;
    }

}