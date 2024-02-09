<?php

namespace app\models;

use Yii;
use yii\helpers\VarDumper;

class Person extends \yii\db\ActiveRecord
{
    public $saveImage;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'age'], 'integer'],
            [['picture'], 'string'],
            [['name', 'surname'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public static function getPersonById($id)
    {
        return self::find()->where(['user_id'=>$id])->one();
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function getAge()
    {
        return $this->age;
    }

    public function editProfile()
    {
        var_dump($this->name);
        $person = Person::find()->where(['user_id'=>Yii::$app->user->id])->one();
            if($this->saveImage)
            {
                $path = $this->uploadPath() . Yii::$app->user->id . "." . $this->saveImage->extension;
                $this->saveImage->saveAs($path);
                $person->picture = Yii::$app->user->id . "." . $this->saveImage->extension;
            }
            $person->name = $this->name;
            $person->surname = $this->surname;
            $person->age = $this->age;

            if ($person->save()) {
                return true;
            }
        \Yii::error("User wasn't saved. " . VarDumper::dumpAsString($person->errors));

        return true;
    }
}
