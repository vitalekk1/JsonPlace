<?php
namespace App\Controllers\api;

use App\Models\User;

class UserController {

    // Метод для получения списка всех пользователей
    public function index() {
        return User::getInstance()->all();
    }
}