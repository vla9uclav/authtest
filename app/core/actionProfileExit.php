<?php

// Подключает модель профиля и файл проверки запроса
require_once(__DIR__ . '/../models/index_model.php');
require_once(__DIR__ . '/requestVerification.php');

$model = new IndexModel();
$requestVerifi = new RequestVerification();

// Получает данные из формы входа
$login = $_POST['userLogin'];

// Удаляет куки логина для выхода из профиля
$response = $model->unsetUserCookie($login);

// Возвращает ответ
die(json_encode($response, JSON_UNESCAPED_UNICODE));