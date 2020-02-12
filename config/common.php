<?php

use yii\base\Module;

return [
    'modules' => [
        'backend' => [
            'class' => Module::class,
            'controllerNamespace' => 'denis909\yii\backend\controllers',
            'viewPath' => '@denis909/yii/backend/views'
        ]
    ]
];