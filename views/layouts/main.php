<?php

/**
 * @var $this \yii\web\View
 * @var $content string
 */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\models\Article;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="ru">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Геополитика, терроризм, война с Ираном, мировая политика, ЦРУ, цветные революции, арабская весна, экономика, общество, культура, видео, США, Россия, Украина, СНГ, НАТО" name="keywords">
    <meta content="Геополитика и мировая политика, проводимая сверхдержавами, сформировала методы управления человечеством. Современная геополитика России и США влияет" name="description">
    <meta name="robots" content="ALL,FOLLOW">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <script id="facebook-jssdk" src="//connect.facebook.net/ru_RU/all.js#xfbml=1"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <link rel="alternate" type="application/rss+xml" title="Геополитика и мировая политика" href="http://mirpolitiki.net/rss.xml">
    <script type="text/javascript">
        $(function(){
            var	scrollup = '<a href="#" id="scrollup01" class="scrollup" title="Вверх страницы">^Вверх^</a>';
            scrollup+= '<a href="#" id="scrollup02" class="scrollup" title="Вверх страницы">^Вверх^</a>';
            $('body').append( scrollup );
            $('.scrollup').css('display', 'none');
            $('.scrollup').css('width', '48px');
            $('.scrollup').css('height', '50px');
            $('.scrollup').css('position', 'fixed');
            $('.scrollup').css('bottom', '50px');
            $('.scrollup').css('text-indent', '-9999px');
            $('.scrollup').css('background-image', "url('/imgs/up.png')");
            $('.scrollup').css('background-repeat', "no-repeat");
            $('#scrollup01').css('left', '3px');
            $('#scrollup02').css('right', '3px');
            $(window).scroll(function(){if ($(this).scrollTop() > 100) {$('.scrollup').fadeIn();} else {$('.scrollup').fadeOut();}});
            $('.scrollup').click(function(){$("html, body").animate({ scrollTop: 0 }, 600);return false;});
        });
    </script>
    <script type="text/javascript" async="" src="//s1.rotaban.ru/rotaban.js?v=1515790800000"></script>
    <script type="text/javascript" src="http://www.google.com/uds/?file=elements&amp;v=1&amp;packages=inputtools&amp;async=2&amp;sig=7ded0ef8ee68924d96a6f6b19df266a8&amp;have=transliteration"></script>
    <style type="text/css">
        .highslide img {cursor: url(/_js/highslide/graphics/zoomin.cur), pointer !important;}.highslide-viewport-size {position: fixed; width: 100%; height: 100%; left: 0; top: 0}
    </style>
    <script type="text/javascript" src="http://www.google.com/uds/api/elements/1.0/7ded0ef8ee68924d96a6f6b19df266a8/inputtools.js"></script>
    <style type="text/css">
        .fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_reposition{overflow:hidden;position:relative}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}.fb_link img{border:none}@keyframes fb_transform{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}.fb_animate{animation:fb_transform .3s forwards}
        .fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_reset .fb_dialog_legacy{overflow:visible}.fb_dialog_advanced{padding:10px;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px}.fb_dialog_content{background:#fff;color:#333}.fb_dialog_close_icon{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{top:5px;left:5px;right:auto}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent}.fb_dialog_close_icon:active{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent}.fb_dialog_loader{background-color:#f6f7f9;border:1px solid #606060;font-size:24px;padding:20px}.fb_dialog_top_left,.fb_dialog_top_right,.fb_dialog_bottom_left,.fb_dialog_bottom_right{height:10px;width:10px;overflow:hidden;position:absolute}.fb_dialog_top_left{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;left:-10px;top:-10px}.fb_dialog_top_right{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;right:-10px;top:-10px}.fb_dialog_bottom_left{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;bottom:-10px;left:-10px}.fb_dialog_bottom_right{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;right:-10px;bottom:-10px}.fb_dialog_vert_left,.fb_dialog_vert_right,.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{position:absolute;background:#525252;filter:alpha(opacity=70);opacity:.7}.fb_dialog_vert_left,.fb_dialog_vert_right{width:10px;height:100%}.fb_dialog_vert_left{margin-left:-10px}.fb_dialog_vert_right{right:0;margin-right:-10px}.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{width:100%;height:10px}.fb_dialog_horiz_top{margin-top:-10px}.fb_dialog_horiz_bottom{bottom:0;margin-bottom:-10px}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #365899;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{-webkit-transform:none;height:100%;margin:0;overflow:visible;position:absolute;top:-10000px;left:0;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{width:auto;height:auto;min-height:initial;min-width:initial;background:none}.fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner{width:100%}.fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content{background:none}.loading.centered #fb_dialog_loader_close{color:#fff;display:block;padding-top:20px;clear:both;font-size:18px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .45);position:absolute;bottom:0;left:0;right:0;top:0;width:100%;min-height:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_content .dialog_header{-webkit-box-shadow:white 0 1px 1px -1px inset;background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));border-bottom:1px solid;border-color:#1d4088;color:#fff;font:14px Helvetica, sans-serif;font-weight:bold;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{-webkit-font-smoothing:subpixel-antialiased;height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));border:1px solid #29487d;-webkit-background-clip:padding-box;-webkit-border-radius:3px;-webkit-box-shadow:rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;display:inline-block;margin-top:3px;max-width:85px;line-height:18px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{border:none;background:none;color:#fff;font:12px Helvetica, sans-serif;font-weight:bold;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #555;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f6f7f9;border:1px solid #555;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}#fb_dialog_loader_spinner{animation:rotateSpinner 1.2s linear infinite;background-color:transparent;background-image:url(https://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);background-repeat:no-repeat;background-position:50% 50%;height:24px;width:24px}@keyframes rotateSpinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
        .fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_hide_iframes iframe{position:relative;left:-10000px}.fb_iframe_widget_loader{position:relative;display:inline-block}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}.fb_iframe_widget_loader iframe{min-height:32px;z-index:2;zoom:1}.fb_iframe_widget_loader .FB_Loader{background:url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat;height:32px;width:32px;margin-left:-16px;position:absolute;left:50%;z-index:4}
        .fb_invisible_flow{display:inherit;height:0;overflow-x:hidden;width:0}.fb_mobile_overlay_active{height:100%;overflow:hidden;position:fixed;width:100%}.fb_shrink_active{opacity:1;transform:scale(1, 1);transition-duration:200ms;transition-timing-function:ease-out}.fb_shrink_active:active{opacity:.5;transform:scale(.75, .75)}
    </style>
</head>
<body>
<?php $this->beginBody() ?>

    <div id="fb-root" class=" fb_reset">
        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
            <div>
                <iframe name="fb_xdm_frame_http" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" style="border: medium none;" src="http://staticxx.facebook.com/connect/xd_arbiter/r/lY4eZXm_YWu.js?version=42#channel=f29a4e65b73f004&amp;origin=http%3A%2F%2Fmirpolitiki.net" frameborder="0"></iframe><iframe name="fb_xdm_frame_https" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" style="border: medium none;" src="https://staticxx.facebook.com/connect/xd_arbiter/r/lY4eZXm_YWu.js?version=42#channel=f29a4e65b73f004&amp;origin=http%3A%2F%2Fmirpolitiki.net" frameborder="0"></iframe>
            </div>
        </div>
        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
            <div></div>
        </div>
    </div>

    <script>
        (
            function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk')
        );
    </script>
    <!-- RotaBan.ru Ad Code -->
    <script type="text/javascript">
        (
            function() {
                var rb = document.createElement('script');
                d = new Date();
                d.setHours(0);
                d.setMinutes(0);
                d.setSeconds(0);
                d.setMilliseconds(0);
                rb.type = 'text/javascript';
                rb.async = true;
                rb.src = '//s1.rotaban.ru/rotaban.js?v=' + d.getTime();
                (
                    document.getElementsByTagName('head')[0] ||
                    document.getElementsByTagName('body')[0]
                ).appendChild(rb);
            }
        )();
    </script>

    <!-- END RotaBan.ru Ad Code -->
    <div id="main_container">
        <div id="topmenulinks2" class="main">
            <div style="text-align: right;">
                <div id="user_log_form">
                    <?php
                        if (Yii::$app->user->isGuest) {
                            echo Html::a('Вход', Url::to(['site/login']), ['title' => 'Вход']);
                        } else {
                            echo Html::a('Выход', Url::to(['site/logout']), ['title' => 'Выход']);

                            if (Yii::$app->user->identity->isAdmin) {
                                echo Html::a('Админка', Url::to(['admin/articles']), ['title' => 'Админка']);
                            }
                        }
                    ?>

                    <!--<a href="/users/register/" title="Регистрация">Регистрация</a>-->

                    <!--<a href="/rss.xml" id="rss" title="rss"></a>-->
                </div>
            </div>
            <div class="clearer"></div>
        </div>

        <div id="topmenulinks" class="main2">
            <div class="fleft">
                <a href="/">
                    <img src="/imgs/logo.jpg" alt="Геополитика и мировая политика" title="Геополитика и мировая политика" id="logo" width="350" height="90">
                </a>
            </div>
            <div class="fright" style="width: 748px; height:90px;"><center>
                    <script type="text/javascript"><!--
                        google_ad_client = "ca-pub-9812722480628202";
                        /* Геополитика 728x90 */
                        google_ad_slot = "3872106370";
                        google_ad_width = 728;
                        google_ad_height = 90;
                        //-->
                    </script>
                    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                    </script></center>
            </div>
            <div class="clearer"></div>
        </div>

        <div id="topmenu" class="main">
            <div class="topmenu-holder">
                <ul class="topmenu-list">
                    <li>
                        <?= Html::a(
                                'Главная',
                                Url::to(
                                    [
                                        'site/index',
                                    ]
                                ),
                                [
                                    'title' => 'Геополитика и мировая политика',
                                    'class' => !\Yii::$app->request->get('type') ?
                                        'current' :
                                        null,
                                ]
                            );
                        ?>
                    </li>
                    <li>
                        <?= Html::a(
                                'Политика',
                                Url::to(
                                    [
                                        'site/index',
                                        'type' => Article::TYPE_POLITICS
                                    ]
                                ),
                                [
                                    'title' => 'Политика',
                                    'class' => \Yii::$app->request->get('type') == Article::TYPE_POLITICS ?
                                        'current' :
                                        null,
                                ]
                            );
                        ?>
                    </li>
                    <li>
                        <?= Html::a(
                                'Экономика',
                                Url::to(
                                    [
                                        'site/index',
                                        'type' => Article::TYPE_ECONOMICS
                                    ]
                                ),
                                [
                                    'title' => 'Экономика',
                                    'class' => \Yii::$app->request->get('type') == Article::TYPE_ECONOMICS ?
                                        'current' :
                                        null,
                                ]
                            );
                        ?>
                    </li>
                    <li>
                        <?= Html::a(
                                'События',
                                Url::to(
                                    [
                                        'site/index',
                                        'type' => Article::TYPE_EVENTS
                                    ]
                                ),
                                [
                                    'title' => 'События',
                                    'class' => \Yii::$app->request->get('type') == Article::TYPE_EVENTS ?
                                        'current' :
                                        null,
                                ]
                            );
                        ?>
                    </li>
                    <li>
                        <?= Html::a(
                                'Общество',
                                Url::to(
                                    [
                                        'site/index',
                                        'type' => Article::TYPE_SOCIETY
                                    ]
                                ),
                                [
                                    'title' => 'Общество',
                                    'class' => \Yii::$app->request->get('type') == Article::TYPE_SOCIETY ?
                                        'current' :
                                        null,
                                ]
                            );
                        ?>
                    </li>
                    <li>
                        <?= Html::a(
                                'История и культура',
                                Url::to(
                                    [
                                        'site/index',
                                        'type' => Article::TYPE_HISTORY
                                    ]
                                ),
                                [
                                    'title' => 'История и культура',
                                    'class' => \Yii::$app->request->get('type') == Article::TYPE_HISTORY ?
                                        'current' :
                                        null,
                                ]
                            );
                        ?>
                    </li>
                    <li>
                        <?= Html::a(
                                'Видео',
                                Url::to(
                                    [
                                        'site/index',
                                        'type' => Article::TYPE_VIDEO
                                    ]
                                ),
                                [
                                    'title' => 'Видео',
                                    'class' => \Yii::$app->request->get('type') == Article::TYPE_VIDEO ?
                                        'current' :
                                        null,
                                ]
                            );
                        ?>
                    </li>
                </ul>
                <div class="clearer"></div>
            </div>
        </div>

        <div id="contentwrapper">
            <div id="contentcolumn">
                <div class="innertube">
                    <?= $content; ?>
                    <br><center>
                    <div id="rotaban_210930" class="rbrocks rotaban_71285625ee044a959298bb14f59dc2cc"></div></center>
                    <br>
                </div>	<!-- innertube -->
            </div>	<!-- contentcolumn -->
        </div>	<!-- contentwrapper -->


        <div id="leftcolumn">
            <div class="innertube">
                <div class="box">
                    <div>
                        <?php
                            /**
                             * @var $mainArticle Article
                             */
                            $mainArticle = Article::find()
                                ->orderBy(['created_at' => SORT_DESC])
                                ->limit(1)
                                ->one();
                        ?>
                        <center>
                            <a href="<?= Url::to(['site/detail', 'id' => $mainArticle->id]); ?>">
                                <img src="<?= $mainArticle->headerImage->path; ?>" alt="<?= $mainArticle->title; ?>" title="<?= $mainArticle->title; ?>" width="200" vspace="10">
                            </a>
                            <a href="<?= Url::to(['site/detail', 'id' => $mainArticle->id]); ?>" title="<?= $mainArticle->description; ?>" class="link1">
                                <br><?= $mainArticle->title; ?>
                            </a>
                        </center>
                        <p class="jj">
                            <?= $mainArticle->description; ?>
                        </p>
                    </div>
                </div>

                <div class="box">
                    <div id="bn_e6fcadf498">
                        <div style="margin:0 !important;padding:0 !important;position:relative !important;overflow:hidden !important;width:100% !important;">
                            <table style="width:100% !important;border-spacing:1px !important;table-layout:auto !important;background-color:#FFFFFF !important;-webkit-hyphens:auto !important;-moz-hyphens:auto !important;-ms-hyphens:auto !important;hyphens:auto !important;word-break:break-word !important;border-collapse:separate !important;">
                                <tbody>
                                <tr>
                                    <td style="text-align:center !important;padding:3px !important;background-color:#FFFFFF !important;vertical-align:top !important;line-height:0 !important;width:100% !important;" data-i="0">
                                        <a href="//recreativ.ru/go.php?p=eJwBpABb%2F7Sk2OLc2bpWrt1PBJtXcXKPGtaOM2l3perztj5O%2Bmyq3vHp%2BOjR0naC6%2F5r4KxE6JB0064VN%2BtoGsUySma1VI5dhRj9e6gK4b97mR%2FSB8%2Bd4txau3YQbMRinTX%2BwbW4avyxKwKthFfg8CAhyGxScRfmhEUGqzcvfbevq5ctagy5ohBRpS7QG%2BgfODWQPvElz%2BOZtA%2Fr9kdSNCKvJycPyGS%2BxaFY8blXPA%3D%3D" target="_blank" rel="nofollow" style="text-decoration:none !important;display:block !important;margin:0 !important;padding:0 !important;text-indent:0 !important;text-align:center !important;" data-i="0"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center !important;padding:3px !important;background-color:#FFFFFF !important;vertical-align:top !important;line-height:0 !important;width:100% !important;" data-i="1">
                                        <a href="//recreativ.ru/go.php?p=eJwBpABb%2F7Sk2OLc2bpWrt1PBJtXcXKPGtaOM2l3perztj5O%2Bmyq3vHp%2BOjR0naC6%2F5r4KxE6JB0064VN%2BtoGsUySma1VI5dhRj9e6gK4b97mR%2FSB8%2Bd4txau3YQbMRinTX%2BwbW4avyxKwKthFfg8CAhyGxScRfmhEUGqzcvfbevq5ctagy5ohBRpS7QG%2BgfODWQOfokze6UtQLr9kdSNCKvJycPyGS%2BxaFY8YJXNw%3D%3D" target="_blank" rel="nofollow" style="text-decoration:none !important;display:block !important;margin:0 !important;padding:0 !important;text-indent:0 !important;text-align:center !important;" data-i="1"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center !important;padding:3px !important;background-color:#FFFFFF !important;vertical-align:top !important;line-height:0 !important;width:100% !important;" data-i="2">
                                        <a href="//recreativ.ru/go.php?p=eJwBpABb%2F7Sk2OLc2bpWrt1PBJtXcXKPGtaOM2l3perztj5O%2Bmyq3vHp%2BOjR0naC6%2F5r4KxE6JB0064VN%2BtoGsUySma1VI5dhRj9e6gK4b97mR%2FSB8%2Bd4txau3YQbMRinTX%2BwbW4avyxKwKthFfg8CAhyGxScRfmhEUGqzcvfbevq5ctagy5ohBRpS7QG%2BgfODWQP%2F8iwOqVtwzr9kdSNCKvJycPyGS%2BxaFY8dlXPA%3D%3D" target="_blank" rel="nofollow" style="text-decoration:none !important;display:block !important;margin:0 !important;padding:0 !important;text-indent:0 !important;text-align:center !important;" data-i="2"></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="//recreativ.ru" style="width:61px !important;height:18px !important;padding:0px !important;display:block !important;background:left top url(//recreativ.ru/img/logo.png) no-repeat !important;position:absolute !important;top:0 !important;right:-23px;overflow:hidden !important;" onmouseover="this.setAttribute('data-r','18px');this.style.right='18px'" onmouseout="this.setAttribute('data-r','-23px');setTimeout((function(){this.style.right=this.getAttribute('data-r');}).bind(this),1000)" title="Рекламная сеть Recreativ - с нами Вас заметят!" target="_blank"></a>
                            <a href="#" style="width:18px !important;height:18px !important;padding:0px !important;display:block !important;background:left top url('//recreativ.ru/img/x.png') no-repeat !important;position:absolute !important;top:0 !important;right:0px !important;overflow:hidden !important;" data-i="z" title="скрыть рекламу"></a>
                        </div>
                    </div>
                    <script type="text/javascript" src="http://recreativ.ru/rcode.e6fcadf498.js"></script>
                </div>

                <div class="box">
                    <div class="block-head">
                        События
                    </div>
                    <div class="clearer"></div>
                    <?php
                        /**
                         * @var $eventsArticles Article[]
                         */
                        $eventsArticles = Article::find()
                            ->andWhere(['type' => Article::TYPE_EVENTS])
                            ->orderBy(['created_at' => SORT_DESC])
                            ->limit(5)
                            ->all();

                        foreach ($eventsArticles as $eventsArticle):
                    ?>
                        <div style="margin-bottom: 5px; border: 1px solid #EEEEEE;">
                            <img src="<?= $eventsArticle->headerImage->path; ?>" alt="<?= $eventsArticle->title; ?>" title="<?= $eventsArticle->title; ?>" class="fleft" width="70" hspace="2">
                            <div style="height: 56px; overflow: hidden; ">
                                <a href="<?= Url::to(['site/detail', 'id' => $eventsArticle->id]); ?>" title="<?= $eventsArticle->title; ?>">
                                    <?= $eventsArticle->title; ?>
                                </a>
                            </div>
                        </div>
                        <div class="clearer"></div>
                    <?php endforeach; ?>
                </div>

                <div class="box">
                    <div class="block-head">
                        Общество
                    </div>
                    <div class="clearer"></div>
                    <?php
                        /**
                         * @var $societyArticles Article[]
                         */
                        $societyArticles = Article::find()
                            ->andWhere(['type' => Article::TYPE_SOCIETY])
                            ->orderBy(['created_at' => SORT_DESC])
                            ->limit(5)
                            ->all();

                        foreach ($societyArticles as $societyArticle):
                    ?>
                        <div style="margin-bottom: 5px; border: 1px solid #EEEEEE;">
                            <img src="<?= $societyArticle->headerImage->path; ?>" alt="<?= $societyArticle->title; ?>" title="<?= $societyArticle->title; ?>" class="fleft" width="70" hspace="2">
                            <div style="height: 56px; overflow: hidden; ">
                                <a href="<?= Url::to(['site/detail', 'id' => $societyArticle->id]); ?>" title="<?= $societyArticle->title; ?>">
                                    <?= $societyArticle->title; ?>
                                </a>
                            </div>
                        </div>
                        <div class="clearer"></div>
                    <?php endforeach; ?>
                </div>
                <div class="box"></div>
            </div>
        </div>
        <div id="rightcolumn">
            <div class="innertube">
                <div class="box">
                    <form action="http://mirpolitiki.net/search/" id="cse-search-box">
                        <div>
                            <input name="cx" value="partner-pub-9812722480628202:6268022372" type="hidden">
                            <input name="cof" value="FORID:10" type="hidden">
                            <input name="ie" value="UTF-8" type="hidden">
                            <input name="q" size="23" style="background: rgb(255, 255, 255) url(&quot;https://www.google.com/cse/static/images/1x/googlelogo_lightgrey_46x16dp.png&quot;) no-repeat scroll left center; text-indent: 48px;" placeholder="Пользовательского поиска" type="text">
                            <input name="sa" value="Поиск" type="submit">
                        </div>
                        <input name="siteurl" value="mirpolitiki.net/" type="hidden"><input name="ref" type="hidden"><input name="ss" type="hidden"></form>

                    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
                    <script type="text/javascript">google.load("elements", "1", {packages: "transliteration"});</script><script src="http://www.google.com/uds/?file=elements&amp;v=1&amp;packages=transliteration" type="text/javascript"></script><link href="http://www.google.com/uds/api/elements/1.0/7ded0ef8ee68924d96a6f6b19df266a8/transliteration.css" type="text/css" rel="stylesheet"><script src="http://www.google.com/uds/api/elements/1.0/7ded0ef8ee68924d96a6f6b19df266a8/transliteration.I.js" type="text/javascript"></script>
                    <script type="text/javascript" src="http://www.google.com/cse/t13n?form=cse-search-box&amp;t13n_langs=en"></script>

                    <script type="text/javascript" src="http://www.google.ru/coop/cse/brand?form=cse-search-box&amp;lang=ru"></script>
                </div>


                <div class="box">
                    <script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- blok-1 240x400 -->
                    <ins class="adsbygoogle" style="display:inline-block;width:240px;height:400px" data-ad-client="ca-pub-9812722480628202" data-ad-slot="1483085100"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>


                <div class="box">
                    <div class="block-head">
                        Популярное
                    </div>
                    <div class="clearer"></div>
                    <?php
                        /**
                         * @var $popularArticles Article[]
                         */
                        $popularArticles = Article::find()
                            ->orderBy(['created_at' => SORT_DESC])
                            ->limit(5)
                            ->all();

                        foreach ($popularArticles as $popularArticle):
                    ?>
                        <div style="margin-bottom: 5px; border: 1px solid #EEEEEE;">
                            <img src="<?= $popularArticle->headerImage->path; ?>" alt="<?= $popularArticle->title; ?>" title="<?= $popularArticle->title; ?>" class="fleft" width="70" hspace="2">
                            <div style="height: 56px; overflow: hidden; ">
                                <a href="<?= Url::to(['site/detail', 'id' => $popularArticle->id]); ?>" title="<?= $popularArticle->title; ?>">
                                    <?= $popularArticle->title; ?>
                                </a>
                            </div>
                        </div>
                        <div class="clearer"></div>
                    <?php endforeach; ?>
                </div>

                <div class="box">
                    <div class="block-head">
                        Рекомендованное видео
                    </div>
                    <div class="clearer"></div>
                    <?php
                        /**
                         * @var $videoArticles Article[]
                         */
                        $videoArticles = Article::find()
                            ->andWhere(['type' => Article::TYPE_VIDEO])
                            ->orderBy(['created_at' => SORT_DESC])
                            ->limit(5)
                            ->all();

                        foreach ($videoArticles as $videoArticle):
                    ?>
                        <div style="margin-bottom: 5px; border: 1px solid #EEEEEE;">
                            <img src="<?= $videoArticle->headerImage->path; ?>" alt="<?= $videoArticle->title; ?>" title="<?= $videoArticle->title; ?>" class="fleft" width="70" hspace="2">
                            <div style="height: 56px; overflow: hidden; ">
                                <a href="<?= $videoArticle->title; ?>" title="<?= $videoArticle->title; ?>">
                                    <?= $videoArticle->title; ?>
                                </a>
                            </div>
                        </div>
                        <div class="clearer"></div>
                    <?php endforeach; ?>
                </div>

                <div class="box">
                    <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?48"></script>

                    <!-- VK Widget -->
                    <div id="vk_groups" style="width: 240px; height: 250px; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;">
                        <iframe name="fXD58654" src="https://vk.com/widget_community.php?app=0&amp;width=240px&amp;_ver=1&amp;gid=35647432&amp;mode=0&amp;color1=&amp;color2=&amp;color3=&amp;class_name=&amp;height=250&amp;url=http%3A%2F%2Fmirpolitiki.net%2F&amp;referrer=&amp;title=%D0%93%D0%B5%D0%BE%D0%BF%D0%BE%D0%BB%D0%B8%D1%82%D0%B8%D0%BA%D0%B0%20%D0%B8%20%D0%BC%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%BF%D0%BE%D0%BB%D0%B8%D1%82%D0%B8%D0%BA%D0%B0&amp;160d62e8c86" scrolling="no" id="vkwidget1" style="overflow: hidden; height: 250px;" width="240" height="250" frameborder="0"></iframe>
                    </div>
                    <script type="text/javascript">
                        VK.Widgets.Group("vk_groups", {mode: 0, width: "240", height: "250"}, 35647432);
                    </script>
                </div>

            </div>
        </div>
        <div class="clearer"></div>
    </div>

    <iframe style="display: none;"></iframe>
    <!-- div maincontainer -->

    <div id="footer" class="main2 r">
        <div class="fleft footer-left">Геополитика и мировая политика</div>
        <div class="fright footer-right">
            <div class="fleft footer-right">
                &nbsp;|&nbsp;
                <a href="feedback/" title="Обратная связь">Обратная связь</a>
            </div>
            &nbsp;&nbsp;<!--LiveInternet counter-->
            <script type="text/javascript"><!--
                document.write("<a href='http://www.liveinternet.ru/click' "+
                    "target=_blank><img src='//counter.yadro.ru/hit?t22.1;r"+
                    escape(document.referrer)+((typeof(screen)=="undefined")?"":
                        ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
                        screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
                    ";"+Math.random()+
                    "' alt='' title='LiveInternet: показано число просмотров за 24"+
                    " часа, посетителей за 24 часа и за сегодня' "+
                    "border='0' width='88' height='31'></a>")
                //-->
            </script>
            <a href="http://www.liveinternet.ru/click" target="_blank">
                <img src="//counter.yadro.ru/hit?t22.1;r;s1366*768*24;uhttp%3A//mirpolitiki.net/;0.35947383680896383" alt="" title="LiveInternet: показано число просмотров за 24 часа, посетителей за 24 часа и за сегодня" width="88" border="0" height="31">
            </a>
            <!--/LiveInternet-->
        </div>
    </div>

    <!-- This page was generated by STWCMS -->
    <a href="#" id="scrollup01" class="scrollup" title="Вверх страницы" style="display: none; width: 48px; height: 50px; position: fixed; bottom: 50px; text-indent: -9999px; background-image: url(&quot;/imgs/up.png&quot;); background-repeat: no-repeat; left: 3px;">^Вверх^</a>
    <a href="#" id="scrollup02" class="scrollup" title="Вверх страницы" style="display: none; width: 48px; height: 50px; position: fixed; bottom: 50px; text-indent: -9999px; background-image: url(&quot;/imgs/up.png&quot;); background-repeat: no-repeat; right: 3px;">^Вверх^</a>
    <div class="highslide-container" style="padding: 0px; border: medium none; margin: 0px; position: absolute; left: 0px; top: 0px; width: 100%; z-index: 1001; direction: ltr;">
        <a class="highslide-loading" title="Нажмите для отмены" href="javascript:;" style="position: absolute; top: -9999px; opacity: 0.75; z-index: 1;">Загружается...</a>
        <div style="display: none;"></div>
        <div class="highslide-viewport highslide-viewport-size" style="padding: 0px; border: medium none; margin: 0px; visibility: hidden;"></div>
        <table style="padding: 0px; border: medium none; margin: 0px; visibility: hidden; position: absolute; border-collapse: collapse; width: 0px;" cellspacing="0">
            <tbody style="padding: 0px; border: medium none; margin: 0px;">
            <tr style="padding: 0px; border: medium none; margin: 0px; height: auto;">
                <td style="padding: 0px; border: medium none; margin: 0px; line-height: 0; font-size: 0px; background: rgba(0, 0, 0, 0) url(&quot;http://mirpolitiki.net/_js/highslide/graphics/outlines/rounded-white.png&quot;) repeat scroll 0px 0px; height: 20px; width: 20px;"></td>
                <td style="padding: 0px; border: medium none; margin: 0px; line-height: 0; font-size: 0px; background: rgba(0, 0, 0, 0) url(&quot;http://mirpolitiki.net/_js/highslide/graphics/outlines/rounded-white.png&quot;) repeat scroll 0px -40px; height: 20px; width: 20px;"></td>
                <td style="padding: 0px; border: medium none; margin: 0px; line-height: 0; font-size: 0px; background: rgba(0, 0, 0, 0) url(&quot;http://mirpolitiki.net/_js/highslide/graphics/outlines/rounded-white.png&quot;) repeat scroll -20px 0px; height: 20px; width: 20px;"></td>
            </tr>
            <tr style="padding: 0px; border: medium none; margin: 0px; height: auto;">
                <td style="padding: 0px; border: medium none; margin: 0px; line-height: 0; font-size: 0px; background: rgba(0, 0, 0, 0) url(&quot;http://mirpolitiki.net/_js/highslide/graphics/outlines/rounded-white.png&quot;) repeat scroll 0px -80px; height: 20px; width: 20px;"></td>
                <td style="padding: 0px; border: medium none; margin: 0px; position: relative;" class="rounded-white highslide-outline"></td>
                <td style="padding: 0px; border: medium none; margin: 0px; line-height: 0; font-size: 0px; background: rgba(0, 0, 0, 0) url(&quot;http://mirpolitiki.net/_js/highslide/graphics/outlines/rounded-white.png&quot;) repeat scroll -20px -80px; height: 20px; width: 20px;"></td>
            </tr>
            <tr style="padding: 0px; border: medium none; margin: 0px; height: auto;">
                <td style="padding: 0px; border: medium none; margin: 0px; line-height: 0; font-size: 0px; background: rgba(0, 0, 0, 0) url(&quot;http://mirpolitiki.net/_js/highslide/graphics/outlines/rounded-white.png&quot;) repeat scroll 0px -20px; height: 20px; width: 20px;"></td>
                <td style="padding: 0px; border: medium none; margin: 0px; line-height: 0; font-size: 0px; background: rgba(0, 0, 0, 0) url(&quot;http://mirpolitiki.net/_js/highslide/graphics/outlines/rounded-white.png&quot;) repeat scroll 0px -60px; height: 20px; width: 20px;"></td>
                <td style="padding: 0px; border: medium none; margin: 0px; line-height: 0; font-size: 0px; background: rgba(0, 0, 0, 0) url(&quot;http://mirpolitiki.net/_js/highslide/graphics/outlines/rounded-white.png&quot;) repeat scroll -20px -20px; height: 20px; width: 20px;"></td>
            </tr>
            </tbody>
        </table>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
