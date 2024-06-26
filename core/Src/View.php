<?php

declare(strict_types=1);

namespace Src;

use Exception;

class View
{
    private string $view = '';
    private array $data = [];
    private string $root = '';
    private string $layout = '/layouts/main.php';

    public function __construct(string $view = '', array $data = [])
    {
        $this->root = $this->getRoot();
        $this->view = $view;
        $this->data = $data;
    }

    //Полный путь до директории с представлениями
    private function getRoot(): string
    {
        global $app;
        $root = $app->settings->getRootDir();
        $path = $app->settings->getViewsPath();

        return $root . $path;
    }

    //Путь до основного файла с шаблоном сайта
    private function getPathToMain(): string
    {
        return $this->root . $this->layout;
    }

    //Путь до текущего шаблона
    private function getPathToView(string $view = ''): string
    {
        $view = str_replace('.', '/', $view);
        return $this->getRoot() . "/$view.php";
    }

    public function render(string $view = '', array $data = [])
    {
        if (!$view) {
            $view = $this->view;
        }

        if (!$data) {
            $data = $this->data;
        }

        $path = $this->getPathToView($view);

        if (file_exists($this->getPathToMain()) && file_exists($path)) {

            //Импортирует переменные из массива в текущую таблицу символов
            extract($data, EXTR_PREFIX_SAME, '');

            //Включение буферизации вывода
            ob_start();

            require $path;
            //Помещаем буфер в переменную и очищаем его
            $content = ob_get_clean();

            //Отрисовываем собранную страницу
            require($this->getPathToMain());
            
            return;
        }

        throw new Exception('Error render');
    }

    //Преобразование массива в json и отдача клиенту
    public function json(array $data = [], int $code = 200): void
    {
        header_remove();
        header("Content-Type: application/json; charset=utf-8");
        http_response_code($code);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }

}