<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $content
 * @property int|null $created_by
 *
 * @property User $createdBy
 */
class Comments extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['created_by'], 'integer'],
            [['content'], 'string', 'max' => 1024],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'created_by' => 'Created By',
        ];
    }

    public static function findComm()
    {
        return self::find(['created_by'=>Yii::$app->user->id])->orderBy(['id'=>SORT_DESC])->all();
    }
    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
