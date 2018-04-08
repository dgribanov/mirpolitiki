<?php

use yii\helpers\Html;


/**
 * @var $this yii\web\View
 * @var $mainArticle app\models\MainArticle
 * @var $popularArticles app\models\PopularArticle[]
 * @var $recommendedArticles app\models\RecommendedArticle[]
 */

$this->title = 'Редактировать расположение статей';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_article_placement', [
        'mainArticle' => $mainArticle,
        'popularArticles' => $popularArticles,
        'recommendedArticles' => $recommendedArticles,
    ]) ?>

</div>