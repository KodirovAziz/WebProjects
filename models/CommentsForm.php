<?php

namespace app\models;


use Yii;
use yii\base\Model;
use app\models\User;
use yii\db\Expression;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Response;
use yii\web\UploadedFile;

class CommentsForm extends Model
{
    public $id;
    public $content;
    public $user_id;
    public $is_deleted;

    public function rules()
    {
        return [
            [['content'], 'string'],
           ];
    }

    public function postComment()
    {
        $create_time = new Expression('NOW()');
        $comment = new Comments();
        $comment->content = $this->content;
        $this->user_id = Yii::$app->user->id;
        $comment->created_by = $this->user_id;
        $comment->updated_by = $this->user_id;
        $comment->created_at = $create_time;
        $comment->updated_at = $create_time;
        if ($comment->save()) {
            return true;
        }
        \Yii::error("User wasn't saved. " . VarDumper::dumpAsString($comment->errors));

        return true;
    }
    public function editComment($id)
    {
        $comment = Comments::findCommById($id);
        $comment->content = $this->content;
        $this->user_id = Yii::$app->user->id;
        $comment->updated_by = $this->user_id;
        $comment->updated_at = new Expression('NOW()');
        if ($comment->save()) {
            return true;
        }
        \Yii::error("User wasn't saved. " . VarDumper::dumpAsString($comment->errors));

        return true;
    }

    public function deleteComment($id)
    {
        $comment = Comments::findCommById($id);
        $comment->is_deleted = 1;
        $this->user_id = Yii::$app->user->id;
        $comment->updated_by = $this->user_id;
        $comment->updated_at = new Expression('NOW()');
        if ($comment->save()) {
            return true;
        }
        \Yii::error("User wasn't saved. " . VarDumper::dumpAsString($comment->errors));

        return true;
    }

}