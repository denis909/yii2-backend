<?php

namespace denis909\backend;

abstract class BackendController extends \denis909\yii\Controller
{

    public $userComponent = 'user';

    public $roles = ['@'];

}