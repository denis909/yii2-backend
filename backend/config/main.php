<?php

return [
    'controllerMap' => [
        'login' => 'denis909\backend\controllers\LoginController',
        'logout' => 'denis909\backend\controllers\LogoutController'
    ],
    'params' => [
        'backendMenu' => [
            'system' => [
                'label' => ['backend', 'System'],
                'icon' => 'fas fw fa-cog'
            ]
        ]
    ]
];