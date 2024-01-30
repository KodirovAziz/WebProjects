<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\CommentsForm $model */

use app\models\Comments;
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
                            <?=  isset(Yii::$app->user->identity->picture)? Html::img('@web/uploads/'.Yii::$app->user->identity->getImage(), ['alt' => 'pic not found','style' => 'width:150px;height: 150px']): Html::img('@web/uploads/guest.png', ['alt' => 'pic not found','style' => 'width:150px;height: 150px']) ?>
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
                                <?=  isset(Yii::$app->user->identity->name)?ucfirst(Yii::$app->user->identity->name): "None" ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Surname</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?=  isset(Yii::$app->user->identity->surname)?ucfirst(Yii::$app->user->identity->surname): "None" ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Age</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?=  isset(Yii::$app->user->identity->age)?Yii::$app->user->identity->age: "None" ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " href="/site/edit">Edit profile</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <div class="col">
        <div class="card">
                <div class="align-items-center text-center">

                    <?php $form = ActiveForm::begin([
                        'id' => 'comments-form'
                    ])?>
                    <?= $form->field($model, 'content')->textInput()->label('Write your comment here'), Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
                    <?php ActiveForm::end(); ?>

                </div>
            <?php foreach (Comments::findComm() as $comment): ?>

            <div class="card-body">

                <div class="d-flex flex-column align-items-center text-center">
                    <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                        <?= $comment->content ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

