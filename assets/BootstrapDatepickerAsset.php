<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author ZhangJin <jin.zhang@xiaomi.com>
 * @since 2.0
 */
class BootstrapDatepickerAsset extends AssetBundle
{
    public $sourcePath = '@webroot/js/plugins/bootstrap-datepicker';

    public $css = [
        'bootstrap-datepicker.css',
    ];

    public function init()
    {
        $lang = \Yii::$app->language;
        $this->js = [
            'bootstrap-datepicker.js',
            "locales/bootstrap-datepicker.$lang.js",
        ];
    }
}
