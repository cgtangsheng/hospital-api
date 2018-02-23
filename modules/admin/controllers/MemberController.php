<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-30
 * Time: 下午10:37
 */

namespace app\modules\admin\controllers;
use app\models\UserInfo;
use yii\web\Controller;
use yii;
class MemberController extends Controller {

    public $layout = "/blank";

    public function actionIndex() {
        $sql = "select * from user_info";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('index',["data"=>$data]);
    }

    public function actionStatistic(){
        return $this->render('statistic');
    }
    public function actionLogin(){
        $user_name =  Yii::$app->request->post("user_name",false);
        if($user_name != false){
            return $this->render('index');
        }
        return $this->render('login');
    }
    public function actionView(){
        return $this->render("view");
    }
}