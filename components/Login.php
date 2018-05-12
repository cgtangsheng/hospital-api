<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 18-2-19
 * Time: 上午10:10
 */
namespace app\components;

use Yii;

class Login{


    public static function checkLogin(){
        $request = Yii::$app->request->queryParams;
        $response = array();
        if(!isset($request["token"])){
            return false;
        }else{
            $token = $request["token"];
            $res = Yii::$app->cache->get($token);
            if($res == $request){
                return true;
            }
        }
        return false;
    }
}