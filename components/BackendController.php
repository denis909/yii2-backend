<?php

namespace denis909\yii\backend\components;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;

class BackendController extends \yii\web\Controller
{

    public $userComponent = 'user';

    public $postActions = [];

    public $layout = 'main';

    public $roles = ['@'];

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $return = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => $this->roles
                    ]
                ],
                'user' => $this->userComponent
            ]
        ];

        if ($this->postActions)
        {
            $return['verbs'] = [
                'class' => VerbFilter::class
            ];

            foreach($this->postActions as $action)
            {
                $return['verbs']['actions'][$action][] = 'post';
            }
        }

        return $return;
    }

    /**
     * {@inheritdoc}
     */
    public function goBack($defaultUrl = null)
    {
        return Yii::$app->getResponse()->redirect(Yii::$app->{$this->userComponent}->getReturnUrl($defaultUrl));
    }    

}