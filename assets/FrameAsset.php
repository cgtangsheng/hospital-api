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
class FrameAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/bootstrap.min.js',
        'js/fastclick.min.js',
        'js/nifty.js',
        'js/common.function.js',
    ];
    
    public $css = [
        'css/bootstrap.min.css',
        // 'css/nifty.min.css',
        'css/nifty.css',
        'css/font-awesome.min.css',
        'css/animate-css/animate.min.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'app\assets\HeadAsset',
    ];
}
