<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\VarDumper;

class SignupForm extends Model
{
public $username;
public $password;
public $password_repeat;

public function rules()
{
    return [
        [['username', 'password', 'password_repeat'], 'required'],
        ['username', 'string', 'min'=>4, 'max'=>16],
        [['password', 'password_repeat'],'string', 'min'=>5],
        ['password_repeat', 'compare', 'compareAttribute'=>'password']
    ];
}
public function signup()
{
    $user = new User();
    $user->username= $this->username;
    $user->password= \Yii::$app->security->generatePasswordHash($this->password);
    if($user->save())
    {
        return true;
    }
    \Yii::error("User wasn't saved. ". VarDumper::dumpAsString($user->errors));
}
}