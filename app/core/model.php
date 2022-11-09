<?php

class Model
{
    protected Database $database;

    // При инициализации подключает валидатор и базу данных
    public function __construct(){
        require_once(__DIR__ . '/validator.php');
        require_once(__DIR__ . '/database.php');
        $this->database = new Database();
    }

    /** Возвращает основную информацию о пользователе */
    public function getUserData(){

        // Основная информация пользователя
        $userData = [
            'login' => null,
            'name' => null,
            'email' => null
        ];

        if(!empty($_COOKIE['user_login'])){

            // Экранированый запрос логина в бд
            $query = [
                'login' => Validator::getFormattedValue($_COOKIE['user_login'])
            ];

            // Получает данные по запросу в бд
            $resultData = $this->database->select($query, true);

            if(!empty($resultData)){
                $userData['login'] = $resultData['login'];
                $userData['name'] = $resultData['name'];
                $userData['email'] = $resultData['email'];
            }else{
                $this->unsetUserCookie($userData['login']);
            }
        }
        
        return $userData;
    }

    /** Удаляет куки user_login */
    public function unsetUserCookie($data){
        setcookie('user_login', $data, time() - 3600, "/");
        return $this->response(true);
    }

    /** Возвращает статус, имя input в котором была найдена ошибка и сообщение ошибки */
    public function response(bool $status, string $inputName = null, string $message = null){
        $response = [
            "status" => $status,
            "inputName" => $inputName,
            "message" => $message
        ];

        return $response;
    }
}