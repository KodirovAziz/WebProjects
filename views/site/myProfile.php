<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\CommentsForm $model */

use app\models\Comments;
use app\models\Person;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <?=  isset((Person::getPersonById(Yii::$app->user->id))->picture)? Html::img('@web/uploads/'.(Person::getPersonById(Yii::$app->user->id))->picture, ['alt' => 'pic not found','style' => 'width:150px;height: 150px']): Html::img('@web/uploads/guest.png', ['alt' => 'pic not found','style' => 'width:150px;height: 150px']) ?>
                            <div class="mt-3">
                                <p class="text-secondary mb-1">User name: </p>
                                <h4><?=  ucfirst(Yii::$app->user->identity->username) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?=  isset((Person::getPersonById(Yii::$app->user->id))->name)?ucfirst((Person::getPersonById(Yii::$app->user->id))->name): "None" ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Surname</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?=  isset((Person::getPersonById(Yii::$app->user->id))->surname)?ucfirst((Person::getPersonById(Yii::$app->user->id))->surname): "None" ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Age</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?=  isset((Person::getPersonById(Yii::$app->user->id))->age)?(Person::getPersonById(Yii::$app->user->id))->age: "None" ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-outline-secondary " href="/site/edit">EDIT PROFILE</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <div class="col">
        <div class="card">
                <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 15px;" >

                    <?php $form = ActiveForm::begin([
                        'id' => 'comments-form'
                    ])?>
                    <?= $form->field($model, 'content')->textInput(['placeholder'=>"WRITE YOUR COMMENT HERE"])->label(''), Html::submitButton('SUBMIT', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
                    <?php ActiveForm::end(); ?>

                </div>
            <?php foreach (Comments::findComm() as $comment): ?>

            <div class="card-body">
                <div class="card">
                    <div class="small" style="margin-left: 15px; margin-top: 15px;"><?= $comment->created_at ?></div><hr>
                <div class="d-flex flex-column align-items-center text-center">
                    <div class="col-md-10">

                        <div class="card-body">
                        <?= $comment->content ?>
                        </div>

                    </div>
                    </div>

                    <div align="right" class="inline"><a class="btn" href="/site/delete?id=<?= $comment->id ?>">DELETE</a><a class="btn" href="/site/comment?id=<?= $comment->id ?>">EDIT</a></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

