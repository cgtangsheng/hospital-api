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
class RoleController extends Controller {

    public $layout = "/blank";

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionPermision(){
        return $this->render('permision');
    }
    public function actionList(){
        $user_name =  Yii::$app->request->post("user_name",false);
        if($user_name != false){
            return $this->render('index');
        }
        return $this->render('list');
    }
}