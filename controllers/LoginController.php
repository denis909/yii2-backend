<?php

namespace denis909\yii\controllers;

use Yii;
use denis909\yii\backend\BackendLoginForm;

class LoginController extends \backend\components\BackendController
{

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