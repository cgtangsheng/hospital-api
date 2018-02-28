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
class HeadAsset extends AssetBundle
{
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

    public $js = [
        'js/jquery-2.1.1.min.js',
    ];
}
