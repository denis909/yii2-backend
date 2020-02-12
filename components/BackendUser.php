<?php

namespace denis909\yii\backend\components;

class BackendUser extends \yii\web\User
{

    public $returnUrlParam = '__backendReturnUrl';

    public $absoluteAuthTimeoutParam = '__backendAbsoluteExpire';

    public $authTimeoutParam = '__backendExpire';

    public $idParam = '__backendId';

    public $identityCookie = ['name' => '_backendIdentity', 'httpOnly' => true];

    public $loginUrl = ['login/index'];

    public $enableAutoLogin = true;

}