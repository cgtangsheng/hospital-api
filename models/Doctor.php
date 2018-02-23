<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Doctor extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_doctor = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
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
        if (!$this->hasErrors()) {
            $user = $this->getDoctor();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getDoctor(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getDoctor()
    {
        if ($this->_doctor === false) {
            $this->_doctor = Doctor::findByUsername($this->username);
        }
        return $this->_doctor;
    }

    public static function findByUsername($username){
        $sql = "select * from doctor where username=:username";
        $data = Yii::$app->db->createCommand($sql)->bindParam(":username",$username)->queryOne();
        return $data;
    }

    public function getDoctorInfo($health_id){
        $sql = "select * from doctor where id = :id";
        $data = Yii::$app->db->createCommand($sql)->bindParam(":id",$id)->queryOne();
        return $data;
    }
}
