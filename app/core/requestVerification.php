<?php

class RequestVerification
{
    public function __construct(){
        // Проверяет является ли запрос ajax-запросом
        if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
            $this->echoError('Ошибка выполнения запроса');
            die();
        }

        // Проверяет является ли тип отправки формы POST
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $this->echoError('Метод отправки формы не соответствует типу POST');
            die();
        }
    }

    /** Выводит html сообщение и создает кнопку вернуться */
    private function echoError(string $msg)
    {
        $href = "location.href='/';";
        echo '
            <div style="margin: 0 auto; margin-top: 20vh; text-align: center;">
                <h2> ' . $msg . '</h2><br>
                <input style="padding: 12px 20px; cursor: pointer;" type="button" onclick="' . $href . '" value="Вернуться"/>
            </div>
        ';
    }
}