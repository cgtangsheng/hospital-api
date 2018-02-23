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
class ZeroClipboardAsset extends AssetBundle
{
    public $sourcePath = '@bower/zeroclipboard/dist';

    public $css = [
    ];

    public $js = [
        'ZeroClipboard.js',
    ];
}
