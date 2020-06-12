<?php

namespace denis909\backend;

use Yii;

class BackendLoginForm extends \yii\base\Model
{

    const REMEMBER_TIME = 3600 * 24 * 30;

    public $username;
    
    public $password;
    
    public $rememberMe = true;

    protected $userComponent = 'user';

    private $_user;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors())
        {
            $user = $this->getUser();
            
            if (!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute, Yii::t('backend', 'Incorrect username or password.'));
            }
        }
    }

    public function login()
    {
        if ($this->validate())
        {
            return Yii::$app->{$this->userComponent}->login($this->getUser(), $this->rememberMe ? $this->rememberTime : 0);
        }
        
        return false;
    }

    protected function getUser()
    {
        if ($this->_user === null)
        {
            $class = Yii::$app->{$this->userComponent}->identityClass;

            $this->_user = $class::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function getUserComponent() : string
    {
        return $this->userComponent;
    }

    public function setUserComponent(string $userComponent)
    {
        $this->userComponent = $userComponent;
    }

    public function getRememberTime()
    {
        return static::REMEMBER_TIME;
    }

}