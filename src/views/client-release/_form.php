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
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(Client::findAll(['status' => Client::STATUS_ACTIVE]), 'id', 'name')) ?>
            <?= $form->field($model, 'version') ?>
            <?= $form->field($model, 'status')->dropDownList($model::getStatusList()) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Module::t('client', 'Create') : Module::t('client', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
