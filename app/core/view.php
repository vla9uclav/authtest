<?php

class View
{
    private $data;

    /** Генерирует представление страницы */
    public function generate($content_view, $data_model = null)
    {
        // Добавляет шаблон страницы по умолчанию
        require_once (__DIR__ . '/../views/template_view.php');

        $data = $data_model;

        // Подключает файл вида
        require_once (__DIR__ . '/../views/' . $content_view);
    }
}