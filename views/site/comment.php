<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\ProfileForm $model */

use app\models\Comments;
use app\models\Person;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
$this->title = 'Edit comment';
?>
<div class="site-comment">
    <h6 style="margin-top: 15px;">Please fill out the following fields:</h6>
    <div class="card" style="margin-top: 30px">
        <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 15px;" >

            <?php $form = ActiveForm::begin([
                'id' => 'comments-form'
            ])?>
            <?= $form->field($model, 'content')->textInput(['placeholder'=>(Comments::findCommById($_GET))->content])->label(''), Html::submitButton('EDIT', ['class' => 'btn btn-primary', 'name' => 'comment-button']) ?>
            <?php ActiveForm::end(); ?>

        </div>

</div>
