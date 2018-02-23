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
class CleverTabAsset extends AssetBundle
{
    public $css = [
        'js/CleverTabs/context/themes/base/jquery-ui.css',
    ];

    public $js = [
        'js/CleverTabs/scripts/jquery-ui.js',
        'js/CleverTabs/scripts/jquery.contextMenu.js',
        'js/CleverTabs/scripts/jquery.cleverTabs.js',
    ];
}
