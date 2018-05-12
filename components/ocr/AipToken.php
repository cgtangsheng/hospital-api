<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 18-1-15
 * Time: 下午11:13
 */

namespace app\components\ocr;

class AipToken{

    const APPID = "10697104";
    const APPKEY = "yFlkY0bvyYajPMT0ACRTXfez";
    const SECRET_KEY = "LkbyA2InTHNdvObSQUGETBlbrke2R2T7";

    const ACCESS_TOKEN = "24.eff7572be1c41ae95ab57a5590b1300b.2592000.1518622841.282335-10697104";

    public static function request_post($url="",$param){
        if (empty($url) || empty($param)) {
            return false;
        }

        $postUrl = $url;
        $curlPost = $param;
        $curl = curl_init();//初始化curl
        curl_setopt($curl, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($curl, CURLOPT_HEADER, 0);//设置header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_POST, 1);//post提交方式
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($curl);//运行curl
        curl_close($curl);

        return $data;
    }

    public static function getToken(){
        $url = 'https://aip.baidubce.com/oauth/2.0/token';
        $post_data['grant_type']       = 'client_credentials';
        $post_data['client_id']      = self::APPKEY;
        $post_data['client_secret'] = self::SECRET_KEY;
        $o = "";
        foreach ( $post_data as $k => $v )
        {
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $post_data = substr($o,0,-1);

        $res = self::request_post($url, $post_data);

        return $res;

    }
}
echo "afdasdfsa";

print_r(json_decode(AipToken::getToken(),true));

