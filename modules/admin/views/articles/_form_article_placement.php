<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MainArticle;
use app\models\Article;
use kartik\select2\Select2;

/**
 * @var $this yii\web\View
 * @var $form yii\widgets\ActiveForm
 * @var $mainArticle app\models\MainArticle
 * @var $popularArticles app\models\PopularArticle[]
 * @var $recommendedArticles app\models\RecommendedArticle[]
 */

$articlesList = Article::getAllArticlesList();
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($mainArticle, 'article_id')
        ->widget(Select2::classname(),
            [
                'data' => $articlesList,
                'options' => [
                    'placeholder' => $mainArticle->getAttributeLabel('article_id'),
                ],
                'pluginOptions' => [
                    'allowClear' => false,
                ],
            ]
        );
    ?>

    <?php foreach ($recommendedArticles as $index => $recommendedArticle): ?>

    <?= $form->field($recommendedArticle, 'article_id')
        ->widget(Select2::classname(),
            [
                'data' => $articlesList,
                'options' => [
                    'id' => 'recommended-article-' . (string)$index,
                    'name' => 'RecommendedArticle[' . (string)$index . '][article_id]',
                    'placeholder' => $recommendedArticle->getAttributeLabel('article_id') . ' ' . (string)$index,
                ],
                'pluginOptions' => [
                    'allowClear' => false,
                ],
            ]
        );
    ?>

    <?php endforeach; ?>

    <?php foreach ($popularArticles as $index => $popularArticle): ?>

        <?= $form->field($popularArticle, 'article_id')
            ->widget(Select2::classname(),
                [
                    'data' => $articlesList,
                    'options' => [
                        'id' => 'popular-article-' . (string)$index,
                        'name' => 'PopularArticle[' . (string)$index . '][article_id]',
                        'placeholder' => $popularArticle->getAttributeLabel('article_id') . ' ' . (string)$index,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false,
                    ],
                ]
            );
        ?>

    <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>