<?php
namespace App\Controllers\api;

use App\Models\Post;

class PostController {

    // Метод для получения конкретного поста по его id
    public function show($postId)
    {
        return Post::getInstance()->find($postId);
    }

    // Метод для получения постов пользователя по его id
    public function getUserPosts($userId): array
    {
        return Post::getInstance()->where([ 'userId' => $userId ]);
    }

    // Метод для добавления нового поста
    public function create($data): array 
    {
        return Post::getInstance()->create($data);
    }

    // Метод для редактирования поста
    public function update($postId, $data): array 
    {
        return Post::getInstance()->update($postId, $data);
    }

    // Метод для удаления поста
    public function delete($postId): array 
    {
        return Post::getInstance()->delete($postId);
    }
}