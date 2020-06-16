<?php

namespace denis909\backend\events;

class BackendMainLayoutParamsEvent extends \yii\base\Event
{

    public $params = [];

    public $view;

}