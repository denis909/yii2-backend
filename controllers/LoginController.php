<?php

namespace denis909\backend\controllers;

use Yii;
use denis909\backend\BackendLoginForm;

class LoginController extends \backend\components\BackendController
{

    public $layout = 'login';

    public $roles = [];

    /**
     * Login action.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->{$this->userComponent}->isGuest)
        {
            return $this->goHome();
        }

        $model = new BackendLoginForm;

        $model->setUserComponent($this->userComponent);
        
        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function getViewPath()
    {
        return '@vendor/denis909/yii2-backend/views/login';
    }

}