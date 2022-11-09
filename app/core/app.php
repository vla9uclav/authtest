<?php 

// Это основной класс загрузки страницы. Работает как контроллер
class App
{
    public static function start()
    {
        // Подключает базовые классы view и model
        require_once(__DIR__ . '/view.php');
        require_once(__DIR__ . '/model.php');
        $view = new View();
        $model = new Model();

        // Если куки с логином пользователя не установлены - генерирует вид страницы авторизации
        if(empty($_COOKIE['user_login'])){
            $view->generate('auth_view.php');
        }
        // Иначе получает данные из нужной модели и генерирует вид главной страницы
        else{
            $userData = $model->getUserData();
            $view->generate('index_view.php', $userData);
        }
    }
}