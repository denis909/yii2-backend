<?php

namespace denis909\yii\backend;

//use backend\models\BackendUser;

class WebUser extends \yii\web\User
{

    public $returnUrlParam = '__backendReturnUrl';

    public $absoluteAuthTimeoutParam = '__backendAbsoluteExpire';

    public $authTimeoutParam = '__backendExpire';

    public $idParam = '__backendId';

    public $identityCookie = ['name' => '_backendIdentity', 'httpOnly' => true];

    public $loginUrl = ['login/index'];

    //public $identityClass;

    public $enableAutoLogin = true;

}