<?php
return [
   //Класс аутентификации
   'auth' => \Src\Auth\Auth::class,
   //Клас пользователя
   'identity' => \Model\User::class,
   
   //Классы для middleware
   'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'admin' => \Middlewares\AdminMiddleware::class,
   ],
   
   'routeAppMiddleware' => [
       'trim' => \Middlewares\TrimMiddleware::class,
       'json' => \Middlewares\JSONMiddleware::class,
       'bearer' => \Middlewares\BearerMiddleware::class,
      'specialChars' =>  Middlewares\SpecialCharsMiddleware::class,
      'Api' => \Middlewares\Api::class
   ],

    'providers' => [
        'kernel' => \Providers\KernelProvider::class,
        'route' => \Providers\RouteProvider::class,
        'db' => \Providers\DBProvider::class,
        'auth' => \Providers\AuthProvider::class,
    ],

   'validators' => [
      'required' => \Validators\RequireValidator::class,
      'unique' => \Validators\UniqueValidator::class,
      'length' => Validators\MinMaxLengthValidator::class,
      'futureDatetime' => \Validators\FutureDatetimeValidator::class
  ]

];
