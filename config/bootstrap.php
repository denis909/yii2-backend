<?php

use Denis909\CascadeFilesystem\CascadeConfig;

CascadeConfig::addPath(__DIR__);

Yii::setAlias('@denis909/yii/backend', dirname(__DIR__));