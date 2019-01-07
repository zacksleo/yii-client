<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use zacksleo\yii2\client\Module;
use zacksleo\yii2\client\models\Client;

$css = <<<CSS
.file-preview-image{max-width:200px;max-height:200px;}
CSS;
$this->registerCss($css);

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\client\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-position-form">

    <div class="row">
        <div class="col-md-5">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <?= $form->field($model, 'position_id')->dropDownList(ArrayHelper::map(Client::findAll(['status' => Client::STATUS_ACTIVE]), 'id', 'name')) ?>
            <?= $form->field($model, 'name') ?>

            <?= \nemmo\attachments\components\AttachmentsInput::widget([
                'id' => 'file-input',
                'model' => $model,
                'options' => [
                    'multiple' => false
                ],
                'pluginOptions' => [
                    'maxFileCount' => 1
                ]
            ]) ?>

            <?= $form->field($model, 'url') ?>
            <?= $form->field($model, 'status')->dropDownList($model::getStatusList()) ?>
            <?= $form->field($model, 'order')->input('number') ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Module::t('ad', 'Create') : Module::t('ad', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
