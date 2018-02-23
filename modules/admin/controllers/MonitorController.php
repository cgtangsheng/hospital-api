<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-30
 * Time: 下午10:37
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii;
class MonitorController extends Controller {

    public $layout = "/blank";

    public function actionIndex(){
        
        return $this->render('index');
    }
}
