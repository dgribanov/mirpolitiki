<?php
use yii\bootstrap\Alert;

foreach (\app\modules\admin\controllers\BaseController::getTypes() as $type => $class) {
    if (Yii::$app->session->hasFlash($type)) {
        echo Alert::widget([
            'options' => ['class' => $class],
            'body' => Yii::$app->session->getFlash($type),
        ]);
    }
}