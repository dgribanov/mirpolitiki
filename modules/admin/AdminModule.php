<?php

namespace app\modules\admin;

use Yii;
use yii\base\Module;

/**
 * Admin module class
 */
class AdminModule extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        /**
         * Set the layout
         */
        $this->layoutPath = Yii::getAlias('@app/modules/admin/views/layouts');
        $this->layout = 'main';
    }
}
