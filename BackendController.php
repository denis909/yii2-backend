<?php

namespace denis909\yii\backend;

use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;

abstract class BackendController extends \yii\web\Controller
{

    public $userComponent = 'user';

    public $postActions = [];

//    public $layout = '/main';

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

    protected function redirectBack($defaultUrl = null)
    {   
        $returnUrl = Yii::$app->request->get('returnUrl');

        if ($returnUrl && Url::isRelative($returnUrl))
        {
            return $this->redirect($returnUrl);
        }

        if ($defaultUrl === null)
        {
            $defaultUrl = [$this->defaultAction];
        }  
    
        return $this->redirect($defaultUrl);
    }

}