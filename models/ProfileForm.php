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
            ['age', 'integer'],
            [['name', 'surname'], 'string'],
            ['saveImage', 'file', 'skipOnEmpty'=>true,'extensions' => 'png, jpg' ]
        ];
    }

    public function editProfile()
    {

        $user = User::findOne(Yii::$app->user->id);
        if($this->saveImage)
        {
        $path = $this->uploadPath() . Yii::$app->user->id . "." . $this->saveImage->extension;
        $this->saveImage->saveAs($path);
        $user->picture = Yii::$app->user->id . "." . $this->saveImage->extension;
        }
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->age = $this->age;

        if ($user->save()) {
            return true;
        }
        \Yii::error("User wasn't saved. " . VarDumper::dumpAsString($user->errors));

        return true;
    }
    public function uploadPath()
    {
        return Url::to('@app/web/uploads/');
    }
}