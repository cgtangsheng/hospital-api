<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 18-3-10
 * Time: 上午10:07
 */
namespace app\controllers;
use app\models\User;
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
        file_put_contents("/home/work/logs/test.log",json_encode($_REQUEST)."\n",FILE_APPEND);
        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!isset($_REQUEST["code"])) {
            $response["errcode"] = -1;
            $response["errmsg"] = "code deny";
            Yii::$app->response->data = $response;
            return;
        }
        //获取token
        $url = sprintf("%s/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code", Yii::$app->params["wxUrl"], Yii::$app->params["appid"], Yii::$app->params["app_secret"], $_REQUEST["code"]);
        $res = HttpHelper::httpRequest($url, "GET", array());
        if ($res == false) {
            $response["errcode"] = -2;
            $response["errmsg"] = "get access token fail";
            Yii::$app->response->data = $response;
            return;
        }
        $resData = json_decode($res, true);
        if (isset($resData["errcode"])) {
            Yii::$app->response->data = $resData;
            return;
        } else {
            $model = new User();
            if (isset($resData["openid"])) {
                $data = $model->findUserByOpenId($resData["openid"]);
                if ($data == false) {
                    //如果用户之前没有注册过,则注册新的帐号
                    $model->openid = $resData["openid"];
                    if ($model->save()) {
                        $response = array(
                            "status" => 0,
                        );
                        $token = md5(Yii::$app->security->generateRandomString());
                        $userInfo = $model->findUserByOpenId();
                        Yii::$app->cache->set($token,$userInfo["id"],86400*7);
                        $response["token"]=$token;
                    } else {
                        $response = array(
                            "status" => 1,
                        );
                    }
                } else {
                    $response = array(
                        "status" => 0,
                    );
                }

            }
        }
        Yii::$app->response->data = $response;
    }
}