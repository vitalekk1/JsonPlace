<?php
require_once '../vendor/autoload.php';

use App\Controllers\api\PostController;
use App\Controllers\api\UserController;
use App\Controllers\api\TodoController;

$postC = new PostController();
$userC = new UserController();
$todoC = new TodoController();

// Получение списка пользователей
$users = $userC->index();

echo '<pre>'; 
print_r($users);
echo '</pre>';


// Получение постов пользователя с id = 1
$user_posts = $postC->getUserPosts(1);

echo '<pre>'; 
print_r($user_posts);
echo '</pre>';


// Получение заданий пользователя с id = 1
$user_todos = $todoC->getUserTodos(1);
echo '<pre>'; 
print_r($user_todos);
echo '</pre>';


// Получение поста с id = 1
$post = $postC->show(1);

echo '<pre>'; 
print_r($post);
echo '</pre>';


// Добавление нового поста
$newPostData = array(
    'title' => 'New Post',
    'body' => 'This is a new post',
    'userId' => 1
);
$newPost = $postC->create($newPostData);

echo '<pre>'; 
print_r($newPost);
echo '</pre>';


// Редактирование поста с id = 1
$editPostData = array(
    'title' => 'Updated Post',
    'body' => 'This post has been updated'
);
$editedPost = $postC->update(1, $editPostData);

echo '<pre>'; 
print_r($editedPost);
echo '</pre>';


// Удаление поста с id = 1
$deletePostResult = $postC->delete(1);

echo '<pre>'; 
print_r($deletePostResult);
echo '</pre>';


?>
