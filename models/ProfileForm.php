<?php

namespace app\models;


use Yii;
use yii\base\Model;
use app\models\User;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Response;
use yii\web\UploadedFile;

class ProfileForm extends Model
{
    public $name;
    public $surname;
    public $age;
    public $picture;
    /**
     * @var UploadedFile
     */
    public $saveImage;

    public function rules()
    {
        return [
            [['age, name, surname'], 'required'],
            ['age', 'integer'],
            [['name', 'surname'], 'string'],
            ['saveImage', 'file', 'skipOnEmpty'=>true,'extensions' => 'png, jpg' ]
        ];
    }

    public function editProfile()
    {
        if($this->validate())
        {$person = Person::find()->where(['user_id'=>Yii::$app->user->id])->one();
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
        }}
        \Yii::error("User wasn't saved. " . VarDumper::dumpAsString($user->errors));

        return true;
    }
    public function uploadPath()
    {
        return Url::to('@app/web/uploads/');
    }
}