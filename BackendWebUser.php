<?php

namespace denis909\backend;

abstract class BackendWebUser extends \yii\web\User
{

    public $returnUrlParam = '__backendReturnUrl';

    public $absoluteAuthTimeoutParam = '__backendAbsoluteExpire';

    public $authTimeoutParam = '__backendExpire';

    public $idParam = '__backendId';

    public $identityCookie = ['name' => '_identity-backend', 'httpOnly' => true];

    public $loginUrl = ['site/login'];

    public $logoutUrl = ['site/logout'];

    public $enableAutoLogin = true;

}