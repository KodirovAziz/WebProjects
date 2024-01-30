<?php

namespace app\models;


use Yii;
use yii\base\Model;
use app\models\User;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Response;
use yii\web\UploadedFile;

class CommentsForm extends Model
{
    public $id;
    public $content;
    public $user_id;

    public function rules()
    {
        return [
            [['content'], 'string'],
           ];
    }

    public function postComment()
    {
        $comment = new Comments();
        $comment->content = $this->content;
        $this->user_id = Yii::$app->user->id;
        $comment->created_by = $this->user_id;
        if ($comment->save()) {
            return true;
        }
        \Yii::error("User wasn't saved. " . VarDumper::dumpAsString($comment->errors));

        return true;
    }
}