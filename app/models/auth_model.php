<?php

require_once("../core/model.php");

class AuthorizationModel extends Model
{
    public function __construct(){
        parent::__construct();
    }

    /** Проверяет валидность формы входа */
    public function validateSignIn($login, $password){

        try {
            // Проверяет установлено ли значение логина
            if (Validator::valueIsEmpty($login) === true) {
                return $this->response(false, 'sign_in_login', 'Строка логина не может быть пустой');
            }

            // Проверяет установлено ли значение пароля
            if (Validator::valueIsEmpty($password) === true) {
                return $this->response(false, 'sign_in_password', 'Строка пароля не может быть пустой');
            } 

            return $this->response(true);

        } catch (Exception $error) {
            return $this->response(false);
        }
    }

    /** Проверяет валидность формы регистрации */
    public function validateSignUp($login, $name, $email, $password, $confirmPassword){

        try {
            
            // Проверяет валидность логина
            if (Validator::loginIsValid($login) === false) {
                $msgError = 'Длина логина должна быть не менее 6 символов, содержать только цифры и символы на латинице';
                return $this->response(false, 'sign_up_login', $msgError);
            }

            // Проверяет валидность имени
            if (Validator::nameIsValid($name) === false) {
                $msgError = 'Имя должно быть длиной не менее 2х символов, может содержать только буквы на латинице и символы " - ", " ` "';
                return $this->response(false, 'sign_up_name', $msgError);
            }

            // Проверяет валидность email
            if (Validator::emailIsValid($email) === false) {
                $msgError = 'Email не может быть пустым, должен содержать @ и имя домена';
                return $this->response(false, 'sign_up_email', $msgError);
            }

            // Проверяет валидность пароля
            if (Validator::passwordIsValid($password) === false) {
                $msgError = 'Пароль должен быть длиной не менее 6 символов и содержать по крайней мере одну цифру, одну заглавную букву, одну строчную букву';
                return $this->response(false, 'sign_up_password', $msgError);
            }

            // Проверяет совпадают ли пароли
            if (Validator::valueIsEmpty($confirmPassword) === false) {
                if(Validator::getFormattedValue($password) !== Validator::getFormattedValue($confirmPassword)){
                    return $this->response(false, 'sign_up_confirm_password', 'Пароли должны совпадать');
                }
            } else {
                return $this->response(false, 'sign_up_confirm_password', 'Необходимо повторить пароль');
            }

            return $this->response(true);

        } catch (Exception $error) {
            return $this->response(false);
        }
    }

    /** Вход в аккаунт пользователя */
    public function signIn($login, $password){

        $dataLogin = [
            "login" => Validator::getFormattedValue($login),
        ];

        // Находит логин в базе и возвращает всю строку
        $resultLogin = $this->database->select($dataLogin, true); 

        if(!empty($resultLogin)){
            
            // Хеширует введенный пароль
            $hashedPassword = $this->database->getHashedString($password . $login);

            // Проверяет совпадают ли пароли
            if($resultLogin['password'] === $hashedPassword){

                $this->setUserCookie($login);
                return $this->response(true);
            }else{
                return $this->response(false, null, "Неверный пароль");
            }
        }else{
            return $this->response(false, null, "Аккаунт $login не найден");
        }
    }

    /** Регистрация нового пользователя */
    public function signUp($_login, $_name, $_email, $_password){

        // Проверят существует ли уже такой логин в бд
        $login = ["login" => Validator::getFormattedValue($_login)];
        $checkLogin = $this->database->select($login); // Делает запрос на поиск такого логина

        if(!empty($checkLogin)){
            return $this->response(false, 'sign_up_login', "Такой логин уже существует");
        }

        // Проверят существует ли уже такой email в бд
        $email = ["email" => Validator::getFormattedValue($_email)];
        $checkEmail = $this->database->select($email); // Делает запрос на поиск такого email

        if(!empty($checkEmail)){
            return $this->response(false, 'sign_up_email', "Такой email уже существует");
        }

        // Если пройдена проверка на уникальность логина и email, формирует данные для регистрации
        $data = [
            "login" => $_login,
            "name" => $_name,
            "email" => $_email,
            "password" => $this->database->getHashedString($_password . $_login)
        ];

        // Экранирует все значения массива
        $formattedData = Validator::getFormattedArray($data);

        if($this->database->insert($formattedData)){

            $this->setUserCookie($data['login']);
            return $this->response(true);
        }else{
            return $this->response(false, null, "Ошибка регистрации, попробуйте еще раз позже");
        }
    }

    /** Устанавливает куки user_login */
    private function setUserCookie($data){
        setcookie('user_login', $data, time() + 3600, "/");
    }
}