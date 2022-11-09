<?php

// Подключает модель авторизации и проверку запроса
require_once(__DIR__ . '/../models/auth_model.php');
require_once(__DIR__ . '/requestVerification.php');

$auth = new AuthorizationModel();
$requestVerifi = new RequestVerification();

// Получает данные из формы входа
$login = $_POST['signInLogin'];
$password = $_POST['signInPassword'];

// Проверяет данные на валидность
$response = $auth->validateSignIn($login, $password);

if($response['status'] == true){
    $response = $auth->signIn($login, $password);
}

// Возвращает ответ
die(json_encode($response, JSON_UNESCAPED_UNICODE));



