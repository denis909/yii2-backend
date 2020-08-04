<?php

namespace denis909\backend;

abstract class BackendCrudController extends \denis909\yii\CrudController
{

    public $userComponent = 'user';

    public $roles = ['@'];

}