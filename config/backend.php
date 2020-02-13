<?php

return [
    'components' => [
        'urlManager' => [
            'rules' => [
                'site/login' => 'backend/login/index',
                'site/logout' => 'backend/logout/index'
            ]
        ]
    ]
];