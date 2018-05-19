<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 2018/5/17
 * Time: 17:52
 */

namespace app\components;

class HttpHelper {


    public static  function httpRequest($url,$method="POST",$data=array(),$header=array()){
        $s = curl_init();
        curl_setopt($s,CURLOPT_URL,$url);
        curl_setopt($s,CURLOPT_TIMEOUT,30);
        curl_setopt($s, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($s, CURLOPT_COOKIE , self::getVerifyCookieString() );
        if($method == "POST")
        {
            curl_setopt($s,CURLOPT_POST,true);
            curl_setopt($s,CURLOPT_POSTFIELDS,$data);
        }
        if($header!=false){
            curl_setopt($s,CURLOPT_HTTPHEADER,$header);
        }
        $res =  curl_exec($s);
        curl_close($s);
        return $res;
    }

    public static function getVerifyCookieString()
    {
        $str = '';
        foreach($_COOKIE as $one=>$value){
            $str .= "{$one}=".$_COOKIE[$one].";";
        }
        return $str;
    }

}