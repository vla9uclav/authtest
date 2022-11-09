<?php

// Подключает модель авторизации и проверку запроса
require_once(__DIR__ . '/../models/auth_model.php');
require_once(__DIR__ . '/requestVerification.php');

$auth = new AuthorizationModel();
$requestVerifi = new RequestVerification();

// Получает данные из формы регистрации
$login = $_POST['signUpLogin'];
$name = $_POST['signUpName'];
$email = $_POST['signUpEmail'];
$password = $_POST['signUpPassword'];
$confirmPassword = $_POST['signUpConfirmPassword'];

// Проверяет данные на валидность
$response = $auth->validateSignUp($login, $name, $email, $password, $confirmPassword);

if ($response['status'] == true) {
    $response = $auth->signUp($login, $name, $email, $password);
}

// Возвращает ответ
die(json_encode($response, JSON_UNESCAPED_UNICODE));

