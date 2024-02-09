<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */


use app\models\Person;
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

            <?= $form->field($model, 'name')->textInput() ?>
            <?= $form->field($model, 'surname')->textInput() ?>
            <?= $form->field($model, 'age')->textInput() ?>
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
