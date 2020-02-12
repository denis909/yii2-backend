<?php

namespace denis909\yii\backend\controllers;

use Yii;
use denis909\yii\backend\forms\BackendLoginForm;

class LoginController extends \backend\components\BackendController
{

    const BACKEND_LOGIN_FORM = BackendLoginForm::class;

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

        $formClass = static::BACKEND_LOGIN_FORM;

        $model = new $formClass;
        
        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('index', [
            'model' => $model
        ]);
    }

}