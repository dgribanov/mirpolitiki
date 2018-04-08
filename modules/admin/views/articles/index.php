<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Article;

/**
 * @var $this yii\web\View
 * @var $searchModel app\models\ArticleSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Редактировать расположение статей', ['select-article-placement'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            //'description',
            //'text:ntext',
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'type',
                'filter' => Article::getTypesList(),
                'value' => function (Article $model, $key, $index, $column) {
                    return Article::getTypesList()[$model->type];
                },
            ],
            'is_deleted:boolean',
            'created_at:date',
            'updated_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
