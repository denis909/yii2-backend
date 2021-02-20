<?php

use denis909\yii\CascadeConfig;

CascadeConfig::addPath(dirname(dirname(__DIR__)));

Yii::setAlias('@denis909/backend', dirname(dirname(__DIR__)));