# yii2-backend

## Installation

backend/config/main.php

```
return [
    ...
    'components' => [
        'urlManager' => [
            'rules' => [
                'site/login' => 'login',
                'site/logout' => 'logout'
            ]
        ]
    ]
    ...
];
```

common/config/bootstrap.php

```
require dirname(dirname(__DIR__)) . '/vendor/denis909/yii2-backend/config/bootstrap.php';
```

All other configuration files are connected via CascadeConfig, but if you do not use it, connect them manually:

```
config/common.php
config/common-bootstrap.php
config/frontend.php
config/frontend-bootstrap.php
config/backend.php
config/backend-bootstrap.php
config/console.php
config/console-bootstrap.php
```