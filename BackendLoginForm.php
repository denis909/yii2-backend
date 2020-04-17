<?php

namespace denis909\yii\backend;

use Yii;
/**
 * Login form
 */
class BackendLoginForm extends \yii\base\Model
{

    const REMEMBER_TIME = 3600 * 24 * 30;

    public $username;
    
    public $password;
    
    public $rememberMe = true;

    protected $userComponent = 'user';

    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
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

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate())
        {
            return Yii::$app->{$this->userComponent}->login($this->getUser(), $this->rememberMe ? $this->rememberTime : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
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