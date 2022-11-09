<?php 

class Validator
{

    /** Проверяет пустоту введенного поля */
    public static function valueIsEmpty(string $value){
        try { 
            if(isset($value) & strlen(self::getFormattedValue($value)) > 0){
                return false;
            }else{
                return true;
            }
        } catch (Exception $error) {
            return true;
        }
    }

    /** Возвращает отформатированную строку (удаляет пробелы, переносы и символы: "<", ">", "&", "/" ) */
    public static function getFormattedValue(string $value){
        if(isset($value)){
            return htmlspecialchars(stripslashes(trim($value)));
        }else{
            return null;
        }
    }

    /** Возвращает отформатированный массив (удаляет пробелы, переносы и символы: "<", ">", "&", "/" ) */
    public static function getFormattedArray(array $array){
        if (isset($array)) {
            $newArray = [];
            
            foreach ($array as $key => $value) {
                if(!empty($value)){
                    $newArray[$key] = htmlspecialchars(stripslashes(trim($value)));
                }else{
                    $newArray[$key] = null;
                }
            }

            return $newArray;
            
        } else {
            return null;
        }
    }

    /** Проверяет валидность логина */
    public static function loginIsValid(string $value){

        if (self::valueIsEmpty($value) === false) {

            $newValue = self::getFormattedValue($value);

            try {
                // Логин должен быть длинее 5х символов и содержать только цифры и символы на латинице
                if (strlen($newValue) > 5 & preg_match('/^[a-zA-Z0-9]+$/', $newValue)) {
                    return true;
                } else {
                    return false;
                }
            } catch (Exception $error) {
                return false;
            }
        } else {
            return false;
        }
    }

    /** Проверяет валидность имени */
    public static function nameIsValid(string $value){

        if (self::valueIsEmpty($value) === false) {

            $newValue = self::getFormattedValue($value);

            try {
                // Имя должно быть длиной не менее 2х символов и может содержать только буквы на латинице и символы "-", "'"
                if (strlen($newValue) > 1 & preg_match("/^(([a-zA-Z' -]{1,60}))$/u", $newValue)) {
                    return true;
                } else {
                    return false;
                }
            } catch (Exception $error) {
                return false;
            }
        } else {
            return false;
        }
    }

    /** Проверяет валидность email */
    public static function emailIsValid(string $value){
        
        if (self::valueIsEmpty($value) === false) {

            $newValue = self::getFormattedValue($value);

            try {
                // Получает домен из строки email
                $domain = substr($newValue, strpos($newValue, '@') + 1, strlen($newValue));

                if (filter_var($newValue, FILTER_VALIDATE_EMAIL)) {
                    if(checkdnsrr($domain, 'MX')){
                        return true;
                    }else{
                        return false;
                    }
                } else {
                    return false;
                }
            } catch (Exception $error) {
                return false;
            }
        } else {
            return false;
        }
    }

    /** Проверяет валидность пароля */
    public static function passwordIsValid(string $value){

        if (self::valueIsEmpty($value) === false) {

            $newValue = self::getFormattedValue($value);

            try {
                $number = preg_match('@[0-9]@', $newValue);
                $uppercase = preg_match('@[A-Z]@', $newValue);
                $lowercase = preg_match('@[a-z]@', $newValue);

                // Пароль должен быть длиной не менее 6 символов, должен содержать по крайней мере одну цифру, одну заглавную букву и одну строчную букву
                if (strlen($newValue) < 6 || !$number || !$uppercase || !$lowercase) {
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $error) {
                return false;
            }
        } else {
            return false;
        }
    }

}