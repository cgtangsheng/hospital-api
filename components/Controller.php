<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\components;

/**
 * Controller is the base class of web controllers.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Controller extends \yii\web\Controller
{
    public $layout = '@app/views/layouts/main_frame.php';

    protected $debugInfo = [];
    
    public function __contruct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function afterAction($action, $result) {
        $result = parent::afterAction($action, $result);
        if(!empty($this->debugInfo)) {
            $msg = implode("\n", $this->debugInfo);
            echo "<!-- DEBUG \n",$msg,"\n DEBUG END -->\n";
        }
        return $result;
    }
}
