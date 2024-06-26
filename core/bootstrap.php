<?php

use Src\Response;

header('Access-Control-Allow-Origin: * ');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Expose-Headers: *');
header('Access-Control-Request-Headers: content-type,x-pingother');
header('Access-Control-Request-Method: POST, GET, OPTIONS, PUT, DELETE');
header('Content-Type: application/json');

//Подключение автозагрузчика composer
require_once __DIR__ . '/../vendor/autoload.php';


//Создание экземпляра приложения
$app = new Src\Application(require __DIR__ . '/../config/app.php');

//Подключение хелперов 
require_once __DIR__ .  '/../core/helpers.php';

function response($content, $status = 200, array $headers = [])
{
    return new Response($content, $status, $headers);
}

return $app;