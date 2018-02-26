<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ImageFile */

$this->title = 'Добавление изображения';
$this->params['breadcrumbs'][] = ['label' => 'Изображения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
