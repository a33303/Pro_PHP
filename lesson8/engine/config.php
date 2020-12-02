<?php
return [
    'appName' => 'Мой магазин',
    'defaultController' => 'good',

    'components' => [
        'menuService' => [
            'class' => \App\services\MenuServices::class,
        ],
        'userService' => [
            'class' => \App\services\UserServices::class,
        ],
        'renderer' => [
            'class' => \App\services\renders\TmplRenderer::class,
        ],
    ]
];