<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 18-2-3
 * Time: 上午12:46
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii;

class DoctorController extends Controller {

    public $layout = "/blank";

    public function actionIndex() {
        $data[] = [
            "name"=>"周大夫",
            "hospital"=>"中医院",
            "tel"=>"150908871234",
            "wx"=>"xxxxxx",
            "identify"=>"1277393828378723782",
            "level"=>"专家",
            "count"=>10
        ];
        $data[] = [
            "name"=>"王大夫",
            "hospital"=>"广安门医院",
            "tel"=>"150908871234",
            "wx"=>"xxxxxx",
            "identify"=>"1277393828378723782",
            "level"=>"专家",
            "count"=>10
        ];
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