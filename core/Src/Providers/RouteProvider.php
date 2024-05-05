<?php

namespace Providers;

use Src\Provider\AbstractProvider;
use Src\Route;

class RouteProvider extends AbstractProvider
{

    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->bind('route', Route::single()->setPrefix($this->app->settings->getRootPath()));

            //Загружаем маршруты из файла для апи
            Route::group('/web', function () {
                require_once __DIR__ . '/../..' . $this->app->settings->getRoutePath() . '/web.php';
            });
            return;
    }

    private function getUri(): string
    {
        //Возвращает адрес без пути до директории
        return substr($_SERVER['REQUEST_URI'], strlen($this->app->settings->getRootPath()));
    }

    private function checkPrefix(string $prefix): bool
    {
        //Получение маршрута
        $uri = $this->getUri();
        //Проверка на вхождение префикса
        return strpos($uri, $prefix) === 0;
    }
}