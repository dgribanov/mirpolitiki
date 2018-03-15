<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

/**
 * @var $this yii\web\View
 *
 * @var $articlesDataProvider yii\data\ActiveDataProvider
 */

$this->title = 'Геополитика и мировая политика';
?>

<h1><?= $this->title; ?></h1>

<?php
    /**
     * @var $article \app\models\Article
     */
    foreach ($articlesDataProvider->models as $article):
?>
    <div class="b1">
        <h2>
            <a href="<?= Url::to(['site/detail', 'id' => $article->id]); ?>" title="<?= $article->title; ?>">
                <?= $article->title; ?>
            </a>
        </h2>
        <img class="img_l" alt="<?= $article->title; ?>" title="<?= $article->title; ?>" src="<?= $article->headerImage->path; ?>" align="left" width="150" border="1">
        <div class="mh11">
            <p><?= $article->description; ?></p>
        </div>
        <div class="r">
            <a href="<?= Url::to(['site/detail', 'id' => $article->id]); ?>" title="<?= $article->title; ?>">
                подробнее...
            </a>
        </div>
    </div>
    <div class="clearer"></div>
<?php endforeach; ?>

<?php
    echo LinkPager::widget([
        'pagination' => $articlesDataProvider->pagination,
        'maxButtonCount' => 5,
        'nextPageLabel' => 'Следующая',
        'prevPageLabel' => 'Предыдущая',
    ]);
?>
<div class="clearer"></div>
