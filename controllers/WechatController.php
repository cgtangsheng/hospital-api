<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 18-3-10
 * Time: 上午10:07
 */
namespace app\controllers;
use yii\web\Controller;
use app\models\Article;
use Yii;
use app\components\HttpHelper;
use yii\web\Response;

class WechatController extends Controller{
    public function actionAuth()
    {
        $response = array();
        header("Access-Control-Allow-Origin: *");
        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(!isset($_REQUEST["code"])){
            $response["errcode"] = -1;
            $response["errmsg"] = "code deny";
            Yii::$app->response->data = $response;
            return ;
        }
        $url = sprintf("%s?grant_type=authorization_code&appid=%s&secret=%s&code=%s",Yii::$app->params["wxUrl"],Yii::$app->params["appid"],Yii::$app->params["app_secret"],$_REQUEST["code"]);
        $res = HttpHelper::httpRequest($url,"GET",array());
        if($res == false){
            $response["errcode"] = -2;
            $response["errmsg"] = "get access token fail";
            Yii::$app->response->data = $response;
            return ;
        }
        $resData = json_decode($res,true);
        if(isset($resData["errcode"])){
            Yii::$app->response->data = $response;
            return ;
        }
        Yii::$app->response->data = $resData;

       var_dump($url,$resData);
       exit;
    }
}