<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Article;
use app\models\Tag;
use app\models\ImageFile;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;

/**
 * @var $this yii\web\View
 * @var $model app\models\Article
 * @var $form yii\widgets\ActiveForm
 */

dosamigos\ckeditor\CKEditorWidgetAsset::register($this);
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(Article::getTypesList()) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header_image_id')
        ->widget(Select2::classname(),
            [
                'data' => ImageFile::getAllImagesList(),
                'options' => [
                    'placeholder' => $model->getAttributeLabel('header_image_id'),
                ],
                'pluginOptions' => [
                    'allowClear' => false,
                ],
            ]
        );
    ?>

    <?= $form->field($model, 'tagsList')
        ->widget(Select2::classname(),
            [
                'data' => Tag::getAllTagsList(),
                'options' => [
                    'multiple' => true,
                    'placeholder' => $model->getAttributeLabel('tagsList'),
                ],
                'pluginOptions' => [
                    'allowClear' => false,
                ],
            ]
        );
    ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => [
            'rows' => 6
        ],
        'preset' => 'full'
    ]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'options' => [
            'rows' => 12,
        ],
        'preset' => 'full'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
