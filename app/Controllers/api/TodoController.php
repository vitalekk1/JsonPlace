<?php
namespace App\Controllers\api;

use App\Models\Todo;

class TodoController {

    // Метод для получения заданий пользователя по его id
    public function getUserTodos($userId) 
    {
        return Todo::getInstance()->where([ 'userId' => $userId ]);
    }
}