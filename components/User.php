<?php

namespace denis909\yii\backend\components;

class User extends \yii\web\User
{

    public $returnUrlParam = '__backendReturnUrl';

    public $absoluteAuthTimeoutParam = '__backendAbsoluteExpire';

    public $authTimeoutParam = '__backendExpire';

    public $idParam = '__backendId';

    public $identityCookie = ['name' => '_identity-backend', 'httpOnly' => true];

    public $loginUrl = ['site/login'];

    public $enableAutoLogin = true;

}