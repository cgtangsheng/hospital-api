<?php

namespace app\controllers;

use app\models\UserEatInfo;
use app\models\UserInfo;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\LoginForm;
use app\components\Login;
use app\models\UserBmi;


class UserController extends Controller{

    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
////                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionBaseSave(){
        $response = array();
        header("Access-Control-Allow-Origin: *");

        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Login::checkLogin()){$response=array(
            "ret"=>-1,
            "msg"=>"need login"
        );
            Yii::$app->response->data = $response;
            return ;
        }
        $model = new UserInfo();
        $resData = $model->getUserInfo($_REQUEST["health_id"]);
        if($resData == false){
            $model->health_id = strval($_REQUEST["health_id"]);
            $model->name = strval($_REQUEST["name"]);
            $model->work = strval($_REQUEST["work"]);
            $model->tel = strval($_REQUEST["tel"]);
            $model->birthday = $_REQUEST["birthday"];
            $model->sex = intval($_REQUEST["sex"]);
            if($model->save()){
                $response=array(
                    "ret"=>0,
                    "msg"=>"update success"
                );
                Yii::$app->response->data = $response;
                return ;
            }else{
                $response=array(
                    "ret"=>-2,
                    "msg"=>"update fail"
                );
                Yii::$app->response->data = $response;
                return ;
            }
        }else{
            $sql = "update user_info set name=:name,work=:work,tel=:tel,sex=:sex,birthday=:birthday where health_id=:health_id";
            $res = Yii::$app->db->createCommand($sql)
                ->bindParam(":name",$_REQUEST["name"])
                ->bindParam(":work",$_REQUEST["work"])
                ->bindParam(":tel",$_REQUEST["tel"])
                ->bindParam(":health_id",$_REQUEST["health_id"])
                ->bindParam(":birthday",$_REQUEST["birthday"])
                ->bindParam("sex",$_REQUEST["sex"])
                ->execute();
            $response=array(
                "ret"=>0,
                "msg"=>"update success"
            );
            Yii::$app->response->data = $response;
            return ;
        }



    }

    public function actionRegister(){
        $request = Yii::$app->request->queryParams;
        $model = new User();
        $res = User::findByUsername($request["username"]);
        if ($res == false) {
            $model->username = $request["username"];
            $model->password = $request["password"];
            if($model->save()){
                $response=array(
                    "status"=>1,
                );
            }else{
                $response=array(
                    "status"=>0,
                );
            }
        } else {
            $response = array(
                "status"=>1,
            );
        }

        header("Access-Control-Allow-Origin: *");

        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $response;
    }

    public function actionLogin(){
        $request = Yii::$app->request->queryParams;
        $response = array();
        if($request["username"]==false || $request["password"]==false){
            $response = array(
                "ret"=>-1,
                "msg"=>"param not correct"
            );
        }else{
            $res = User::findByUsername($request["username"]);
            if($res == false){
                $response = array(
                    "ret"=>-2,
                    "msg"=>"need login"
                );
            }else if($res["password"]!=$request["password"]){
                $response = array(
                    "ret"=>-3,
                    "msg"=>"password not correct"
                );
            }else{
                $model = new LoginForm();
                $data = array("LoginForm"=>$request);
                if ($model->load($data) && $model->login()) {
                    $response = array(
                        "ret"=>0,
                        "msg"=>"login success",
                    );
                    $token = md5(Yii::$app->security->generateRandomString());
                    Yii::$app->cache->set($token,$res->getId(),86400*7);
                    $response["token"]=$token;
                    $response["health_id"]=$res->getId();
                }else{
                    $response = array(
                        "ret"=>-4,
                        "msg"=>"login fail"
                    );
                }
            }
        }
        header("Access-Control-Allow-Origin: *");

        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $response;
    }


    public function actionBmiSave(){
        $response = array();
        header("Access-Control-Allow-Origin: *");

        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Login::checkLogin()){
            $response=array(
                "ret"=>-1,
                "msg"=>"need login"
            );
            Yii::$app->response->data = $response;
            return ;
        }
        $model = new UserBmi();
        $model->health_id = $_REQUEST["health_id"];
        $model->height = intval($_REQUEST["height"]);
        $model->weight = floatval($_REQUEST["weight"]);
        $model->hip = floatval($_REQUEST["hip"]);
        $model->waist = floatval($_REQUEST["waist"]);

        $result=$model->checkBmiInfo($_REQUEST);
        $standardModel=$model->getBmiModel();
        if($model->save()){
            $response=array(
                "ret"=>0,
                "msg"=>"update success",
                "info"=>$result["data"],
                "advice_text"=>$standardModel[$result["status"]]["advice_text"],
                "advice_goals"=>$standardModel[$result["status"]]["advice_goals"],
            );
            Yii::$app->response->data = $response;
            return ;
        }else{
            $response=array(
                "ret"=>-2,
                "msg"=>"update fail"
            );
            Yii::$app->response->data = $response;
            return ;
        }
    }

    public function actionEatSave(){
        $response = array();
        header("Access-Control-Allow-Origin: *");

        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Login::checkLogin()){$response=array(
                "ret"=>-1,
                "msg"=>"need login"
            );
            Yii::$app->response->data = $response;
            return ;
        }

        $model = new UserEatInfo();
        $model->health_id = intval($_REQUEST["health_id"]);
        $model->staple_food = floatval($_REQUEST["diet"]);
        $model->work_type = intval($_REQUEST["work_type"]);
        $model->vegetables = intval($_REQUEST["vegetables"]);
        $model->milk = floatval($_REQUEST["milk"]);
        $model->egg = intval($_REQUEST["egg"]);
        $model->meet = floatval($_REQUEST["meet"]);
        $model->bean = floatval($_REQUEST["bean"]);
        $model->oil = floatval($_REQUEST["oil"]);
        $model->salt = floatval($_REQUEST["salt"]);
        $model->sports_type = intval($_REQUEST["sports_type"]);
        $model->sports_intensity = intval($_REQUEST["sports_intensity"]);
        $model->sports_time = intval($_REQUEST["sports_time"]);
        $model->sports_frequency = floatval($_REQUEST["sports_frequency"]);
        $model->is_smoke = floatval($_REQUEST["is_smoke"]);
        $model->smoke_num = floatval($_REQUEST["smoke_num"]);
        $model->is_drink = floatval($_REQUEST["is_drink"]);
        $model->drink_num = floatval($_REQUEST["drink_num"]);
        $model->high_blood_pressure = floatval($_REQUEST["high_blood_pressure"]);
        $model->low_blood_pressure = floatval($_REQUEST["low_blood_pressure"]);
        $model->high_blood_pressure = floatval($_REQUEST["high_blood_pressure"]);
        $model->blood_pressure_addr = floatval($_REQUEST["blood_pressure_addr"]);
        $dietRes = $model->checkDietInfo($_REQUEST);
        $sportRes = $model->checkSportInfo($_REQUEST);

        $advice_text = "";
        $advice_text = "建议饮食要少油少盐,不要超过标准值.";

        if($model->is_drink>0){
            $advice_text.="糖尿病患者每日不超过1～2份标准量(一份标准量为：啤酒285 ml，清淡啤酒375ml，红酒100 ml或白酒30 ml，各含酒精约10 g).";
        }
        if($sportRes!=false){
            $advice_text .= "每周3~5次中强度运动,运动心率计算公式（220-年龄）*60%～70%,可以选择快走,慢跑,游泳等有氧运动";
        }

        if($model->save()){
            $response=array(
                "ret"=>0,
                "msg"=>"update success",
                "info"=>array_merge($dietRes,$sportRes),
                "advice_text"=>$advice_text,
                "advice_goals"=>"",

            );
            Yii::$app->response->data = $response;
            return ;
        }else{
            $response=array(
                "ret"=>-2,
                "msg"=>"update fail"
            );
            Yii::$app->response->data = $response;
            return ;
        }
    }

    public function actionLogout(){
        $response = array();
        $request = Yii::$app->request->queryParams;
        header("Access-Control-Allow-Origin: *");

        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $token = $request["token"];
        Yii::$app->cache->delete($token);
        $response=array(
            "ret"=>0
        );
        Yii::$app->response->data=$response;
    }


}