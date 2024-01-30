<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\ProfileForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Edit ProfileForm';
?>
<div class="site-edit">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'profile-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ]
            ]); ?>

            <?= $form->field($model, 'name')->textInput(['value'=>Yii::$app->user->identity->getName()]) ?>
            <?= $form->field($model, 'surname')->textInput(['value'=>Yii::$app->user->identity->getSurname()]) ?>
            <?= $form->field($model, 'age')->textInput(['value'=>Yii::$app->user->identity->getAge()]) ?>
            <?= $form->field($model, 'saveImage')->fileInput() ?>


            <div class="form-group">
                <div>
                    <?= Html::submitButton('Edit', ['class' => 'btn btn-primary', 'name' => 'edit-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
