<?php

use yii\helpers\Url;

/**
 * @var $this yii\web\View
 *
 * @var $article app\models\Article
 * @var $similarArticles array
 */
?>

<h1><?= $article->title; ?></h1>
<div class="content-block-news pad5 j">
    <?= $article->text; ?>
    <!--<p class="i">Статья написана специально для сайта «<a title="Геополитика и мировая политика" href="/" target="_blank">Геополитика и мировая политика</a>».<br> При полной или частичной перепечатке материала ссылка на сайт «<a title="Геополитика и мировая политика" href="/" target="_blank">Геополитика и мировая политика</a>» обязательна.</p>-->
    <br>
    <b>Дата публикации:</b> <?= $article->createdAt; ?> года
    <br>
    <br>
    <?= $article->tags ? '<b>Тэги: </b>' : ''; ?>
    <?php foreach ($article->tags as $tag): ?>
        <a href="<?= Url::to(['site/index', 'tag' => $tag->id]); ?>" title="<?= $tag->name; ?>"><?= $tag->name; ?></a>
    <?php endforeach; ?>
    <br>
</div>
<br><center>
<div id="bn_43b4f6798f" data-cw="580" style="margin: 0px;">
    <div style="margin:0 !important;padding:0 !important;position:relative !important;overflow:hidden !important;width:100% !important;" '="">
    <table style="width:100% !important;border-spacing:1px 1px !important;table-layout:auto !important;background-color:#FFFFFF !important;-webkit-hyphens:auto !important;-moz-hyphens:auto !important;-ms-hyphens:auto !important;hyphens:auto !important;word-break:break-word !important;border-collapse:separate !important;padding:0 0 0 0 !important;">
        <tbody>
        <tr>
            <td style="text-align: center !important; padding: 3px !important; background-color: rgb(255, 255, 255) !important; vertical-align: top !important; line-height: 0 !important; width: 33%; display: table-cell;" data-i="0">
                <a href="//recreativ.ru/go.php?p=eJwBowBc%2F7Sk2OLc375W%2F9hLU5wFIH%2BORNaOM2l3per3sW0d%2F2qh06Hi%2Bu2B1yLQuv5q4%2F4UvMV21PgRYuxoScUyQ2e9X4NfhiX9QqsC4LV7nB3bB86d4eVahHYWasRkljD%2Fx4i2VcCBJhiyjED88yI81GxRSSfrnloOvCssf6qzq5QVMQvlnRBu337uG9EmOA2RPvAgzO6fsTLSz3xoNCKWHh8N8l2HxaF7Lla4" target="_blank" rel="nofollow" style="text-decoration:none !important;display:block !important;margin:0 !important;padding:0 !important;text-indent:0 !important;text-align:center !important;" data-i="0"></a>
            </td>
            <td style="text-align: center !important; padding: 3px !important; background-color: rgb(255, 255, 255) !important; vertical-align: top !important; line-height: 0 !important; width: 33%; display: table-cell;" data-i="1">
                <a href="//recreativ.ru/go.php?p=eJwBpABb%2F7Sk2OLc375W%2F9hLU5wFIH%2BORNaOM2l3per3sW0d%2F2qh06Hi%2Bu2B1yLQuv5q4%2F4UvMV21PgRYuxoScUyQ2e9X4NfhiX9QqsC4LV7nB3bB86d4eVahHYWasRkljD%2Fx4i2VcCBJhiyjED88yI81GxRSSfrnloOvCssf6qzq5QVMQvlnRBu337uG9EmOA2TPvslwe%2BeuTLSz3pSNCKvJycPyGS%2BxaFY0%2BdXRw%3D%3D" target="_blank" rel="nofollow" style="text-decoration:none !important;display:block !important;margin:0 !important;padding:0 !important;text-indent:0 !important;text-align:center !important;" data-i="1"></a>
            </td>
            <td style="text-align: center !important; padding: 3px !important; background-color: rgb(255, 255, 255) !important; vertical-align: top !important; line-height: 0 !important; width: 33%; display: table-cell;" data-i="2">
                <a href="//recreativ.ru/go.php?p=eJwBpABb%2F7Sk2OLc375W%2F9hLU5wFIH%2BORNaOM2l3per3sW0d%2F2qh06Hi%2Bu2B1yLQuv5q4%2F4UvMV21PgRYuxoScUyQ2e9X4NfhiX9QqsC4LV7nB3bB86d4eVahHYWasRkljD%2Fx4i2VcCBJhiyjED88yI81GxRSSfrnloOvCssf6qzq5QVMQvlnRBu337uG9EmOA2VOv8myeuVsDLSz3pTNCKvJycPyGS%2BxaFY00NXPQ%3D%3D" target="_blank" rel="nofollow" style="text-decoration:none !important;display:block !important;margin:0 !important;padding:0 !important;text-indent:0 !important;text-align:center !important;" data-i="2"></a>
            </td>
        </tr>
        </tbody>
    </table>
<a href="//recreativ.ru" style="width:61px !important;height:18px !important;padding:0px !important;display:block !important;background:left top url(//recreativ.ru/img/logo.png) no-repeat !important;position:absolute !important;top:0 !important;right:-23px;overflow:hidden !important;" onmouseover="this.setAttribute('data-r','18px');this.style.right='18px'" onmouseout="this.setAttribute('data-r','-23px');setTimeout((function(){this.style.right=this.getAttribute('data-r');}).bind(this),1000)" title="Рекламная сеть Recreativ - с нами Вас заметят!" target="_blank"></a>
<a href="#" style="width:18px !important;height:18px !important;padding:0px !important;display:block !important;background:left top url('//recreativ.ru/img/x.png') no-repeat !important;position:absolute !important;top:0 !important;right:0px !important;overflow:hidden !important;" data-i="z" title="скрыть рекламу"></a>
</div>
</div>
<script type="text/javascript" src="http://recreativ.ru/rcode.43b4f6798f.js"></script></center>
<br>
<?php if ($similarArticles): ?>
<b class="c">Другие статьи по теме:</b>
<ul>
<?php foreach ($similarArticles as $similarArticle): ?>
    <li><a href="<?= Url::to([
            'site/detail',
            'type' => \app\models\Article::getTypeStringsList()[$similarArticle['type']],
            'url' => $similarArticle['url']
        ]); ?>"><?= $similarArticle['title']; ?></a></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<!--<script type="text/javascript" src="/_js/xmlhttp.js"></script><hr><h3>Комментарии</h3><b><a name="addcom">Добавить комментарий</a></b><center><span class="sh11">Чтобы добавить комментарий, <a href="/users/">Войдите</a> или <a href="/register/">Зарегистрируйтесь</a></span></center><hr><br>-->
