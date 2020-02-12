<?php

namespace denis909\yii\backend\controllers;

use Yii;

class LogoutController extends \backend\components\BackendController
{

    public $postActions = ['index'];

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->{$this->userComponent}->logout();

        return $this->goHome();
    }

}