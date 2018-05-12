<?php

namespace app\controllers;

use app\models\DmInfo;
use app\models\DmOther;
use app\models\DmRecord;
use app\models\UserBmi;
use app\models\UserDmHistory;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\LoginForm;
use app\components\Login;

class DmController extends Controller{


    public function actionDmCheck(){
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
        $model = new DmInfo();
        $model->health_id = $_REQUEST["health_id"];
        $model->diagnose_hospital = $_REQUEST["diagnose_hospital"];
        $model->diagnose_time = $_REQUEST["diagnose_time"];
        $model->is_diabetes = $_REQUEST["is_diabetes"];
        $model->fasting_blood_glucose = $_REQUEST["fasting_blood_glucose"];
        $model->anytime_blood_glucose =$_REQUEST["anytime_blood_glucose"];
        $model->postprandial_blood_glucose=$_REQUEST["postprandial_blood_glucose"];
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

    }

    public function actionHistorySave(){
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
        $model = new UserDmHistory();
        $model->health_id = $_REQUEST["health_id"];
        $model->is_ketoacidosis = intval($_REQUEST["is_ketoacidosis"]);
        $model->ketoacidosis_frequency = intval($_REQUEST["ketoacidosis_frequency"]);
        $model->ketoacidosis_reason = strval($_REQUEST["ketoacidosis_reason"]);
        $model->is_hypoglycemia = intval($_REQUEST["is_hypoglycemia"]);
        $model->hypoglycemia_frequency = intval($_REQUEST["hypoglycemia_frequency"]);
        $model->hypoglycemia_reason = strval($_REQUEST["hypoglycemia_reason"]);
        $model->hypoglycemia_severity = intval($_REQUEST["hypoglycemia_severity"]);
        $model->is_cerebrovascular = intval($_REQUEST["is_cerebrovascular"]);
        $model->is_cardiovascular = intval($_REQUEST["is_cardiovascular"]);
        $model->is_peripheral_vascular = intval($_REQUEST["is_peripheral_vascular"]);
        $model->is_nephrosis = intval($_REQUEST["is_nephrosis"]);
        $model->is_fundus_lesions = intval($_REQUEST["is_fundus_lesions"]);
        $model->is_peripheral_neuropathy = intval($_REQUEST["is_peripheral_neuropathy"]);
        $model->is_diabetic_foot = intval($_REQUEST["is_diabetic_foot"]);
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
    }

    public function actionOtherSave(){
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
        $model = new DmOther();
        $model->health_id = $_REQUEST["health_id"];
        $model->hbalc = floatval($_REQUEST["hbalc"]);
        $model->high_blood_pressure = floatval($_REQUEST["high_blood_pressure"]);
        $model->low_blood_pressure = floatval($_REQUEST["low_blood_pressure"]);
        $model->tg = floatval($_REQUEST["tg"]);
        $model->tc = floatval($_REQUEST["tc"]);
        $model->ldl_c = floatval($_REQUEST["ldl_c"]);
        $model->hdl_c = floatval($_REQUEST["hdl"]);
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
    }

    public function actionCheck(){
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
        $model = new DmRecord();
        $model->health_id = intval($_REQUEST["health_id"]);
        $model->is_diabetes = intval($_REQUEST["is_diabetes"]);
        $model->hypoglycemia_frequency = intval($_REQUEST["hypoglycemia_frequency"]);
        $model->hypoglycemia_reason = strval($_REQUEST["hypoglycemia_reason"]);
        $model->hypoglycemia_severity = intval($_REQUEST["hypoglycemia_severity"]);
        $model->is_ketoacidosis = intval($_REQUEST["is_ketoacidosis"]);
        $model->ketoacidosis_frequency = intval($_REQUEST["ketoacidosis_frequency"]);
        $model->ketoacidosis_reason= strval($_REQUEST["ketoacidosis_frequency"]);
        $model->is_cardiovascular = intval($_REQUEST["is_cardiovascular"]);
        $model->is_cerebrovascular = intval($_REQUEST["is_cerebrovascular"]);
        $model->is_fundus_lesions = intval($_REQUEST["is_fundus_lesions"]);
        $model->is_hypoglycemia = intval($_REQUEST["is_hypoglycemia"]);
        $model->is_nephrosis = intval($_REQUEST["is_nephrosis"]);
        $model->is_peripheral_neuropathy = intval($_REQUEST["is_peripheral_neuropathy"]);
        $model->is_peripheral_vascular = intval($_REQUEST["is_peripheral_vascular"]);
        $model->is_diabetic_foot= strval($_REQUEST["is_diabetic_foot"]);
        $model->hbalc = intval($_REQUEST["hbalc"]);
        $model->postprandial_blood_glucose = intval($_REQUEST["postprandial_blood_glucose"]);
        $model->anytime_blood_glucose = intval($_REQUEST["anytime_blood_glucose"]);
        $model->fasting_blood_glucose = intval($_REQUEST["fasting_blood_glucose"]);
        $model->high_blood_pressure = intval($_REQUEST["fasting_blood_glucose"]);
        $model->low_blood_pressure = intval($_REQUEST["low_blood_pressure"]);
        $model->hdl_c = floatval($_REQUEST["hdl"]);
        $model->tg = floatval($_REQUEST["tg"]);
        $model->ldl_c = floatval($_REQUEST["ldl_c"]);
        $model->diagnose_time = strval($_REQUEST["diagnose_time"]);
        $model->diagnose_hospital = strval($_REQUEST["diagnose_hospital"]);
        $advice_text = array();
        if($model->high_blood_pressure>=130 || $model->low_blood_pressure>=80){
            $advice_text[]="患有糖尿病合并高血压,建议做血压监控";
        }
        $info = array();
        $resGlugose = $model->checkGluCoseInfo($_REQUEST);
        if($resGlugose!=false){
            $info = array_merge($info,$resGlugose);
        }
        $advice_goals = $model->getAdviceGoals();
        if($model->save()){
            $response=array(
                "ret"=>0,
                "msg"=>"update success",
                "info"=>$info,
                "advice_text"=>$advice_text,
                "advice_goals"=>$advice_goals
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
}