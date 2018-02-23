<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 18-1-15
 * Time: 下午11:43
 */
namespace app\components\ocr;


use app\components\ocr\AipOcr;
use app\components\ocr\FormatHandler;

class OcrTest{

    const APPID = "10697104";
    const APPKEY = "yFlkY0bvyYajPMT0ACRTXfez";
    const SECRET_KEY = "LkbyA2InTHNdvObSQUGETBlbrke2R2T7";
    const URL = "http://127.0.0.1/images/1.jpg";
    const OFFSET = 3;

    public static $digitSet = array("0","1","2","3","4","5","6","7","8","9");



    public static function checkByGeneral($url){
        $image = file_get_contents($url);

        $client = new AipOcr(self::APPID, self::APPKEY, self::SECRET_KEY);


// 如果有可选参数
        $options = array();
        $options["recognize_granularity"] = "big";
        $options["detect_direction"] = "true";
        $options["vertexes_location"] = "true";
        $options["probability"] = "true";

        // 带参数调用通用文字识别, 图片参数为远程url图片
        $res = $client->accurate($image, $options);
        $response = array();
        foreach($res["words_result"] as $key=>$value){
            $response[]=array(
                "location"=>$value["location"],
                "words"=>$value["words"]
            );
        }
        // $response = self::format($response);
        usort($response,array("self","compare"));
        $response = self::filterByDistance($response);

        $response = FormatHandler::formatNewStrage($response);
        // var_dump(json_encode($response));
        $response = self::format($response);
        return $response;
    }



    public static function compare($a,$b){
        if($a["location"]["top"]>$b["location"]["top"]){
            return 1;
        }else if($a["location"]["top"] == $b["location"]["top"]){
            if($a["location"]["left"]>$b["location"]["left"]){
                return 1;
            }{
                return -1;
            }
        }else{
            return -1;
        }
    }

    public static function recognize(){
        $res = OcrTest::check();
        $result = array();
        if($res["words_result"]!=false){
            foreach ($res["words_result"] as $key=>$value){
                $result[]=array(
                    "location"=>$value["location"],
                    "words"=>$value["words"],
                );
            }
        }
        usort($result,array('self','compare'));
        return $result;
    }

    public static function formatSingle($value,&$response){
        $strkey = "";
        $tmpData = explode(":",$value);
        if(count($tmpData)>1){
            $response[$tmpData[0]]=$tmpData[1];
        }else{
            if(self::checkIncludeChinese($value)){
                $value = self::filterChars($value);
                if(!self::checkIncludeDigit($value)){
                    if($strkey!=false){
                        $response[$strkey]="";
                    }
                    $strkey = $value;
                }else{
                    $start = 0;
                    $end = mb_strlen($value);
                    $lock_start = 0;
                    for($i=0;$i<mb_strlen($value);$i++){
                        $tmp = mb_substr($value,$i,1);
                        if(in_array($tmp,self::$digitSet)){
                            if($lock_start == 0){
                                $start = $i;
                                $lock_start = 1;
                            }
                            if($lock_start == 1 && $tmp !="." && !in_array($tmp,self::$digitSet)){
                                $end = $i;
                                break;
                            }
                        }
                    }
                    $strkey = mb_substr($value,0,$start);
                    //    echo sprintf("digit format ,start is %s,end is %s,strkey is %s\n",$start,$end,$strkey);
                    if($end>$start){
                        $response[$strkey]=mb_substr($value,$start,($end-$start));
                        $strkey = "";
                    }
                    //处理扔掉的信息
                    $strTail = mb_substr($value,$start);
                    if(self::checkIncludeChinese($strTail)){
                        self::formatSingle($strTail,$response);
                    }

                }
            }else{
                if($strkey!=""){
                    $response[$strkey]=$value;
                    $strkey="";
                }else{
                    // var_dump($value);
                }
            }
        }
    }

    public static function format($result){
        $response = array();
        $strkey = "";
        foreach ($result as $key=>$item){
            $value = $item["words"];
            $tmpData = explode(":",$value);
            if(count($tmpData)>1){
                $response[$tmpData[0]]=$tmpData[1];
                $strkey = "";
                continue;
            }else{
                if(self::checkIncludeChinese($value)){
                    $value = self::filterChars($value);
                    if(!self::checkIncludeDigit($value)){
                        if($strkey!=false){
                            $response[$strkey]="";
                        }
                        $strkey = $value;
                        continue;
                    }else{
                        $start = 0;
                        $end = mb_strlen($value);
                        $lock_start = 0;
                        for($i=0;$i<mb_strlen($value);$i++){
                            $tmp = mb_substr($value,$i,1);
                            if(in_array($tmp,self::$digitSet)){
                                if($lock_start == 0){
                                    $start = $i;
                                    $lock_start = 1;
                                }
                                if($lock_start == 1 && $tmp !="." && !in_array($tmp,self::$digitSet)){
                                    $end = $i;
                                    break;
                                }
                            }
                        }
                        $strkey = mb_substr($value,0,$start);
                        //    echo sprintf("digit format ,start is %s,end is %s,strkey is %s\n",$start,$end,$strkey);
                        if($end>$start){
                            $response[$strkey]=mb_substr($value,$start,($end-$start));
                            $strkey = "";
                        }
                        //处理扔掉的信息
                        $value = mb_substr($value,$start);
                        if(self::checkIncludeChinese($value)){
                            self::formatSingle($value,$response);
                        }

                    }
                }else{
                    if($strkey!=""){
                        $response[$strkey]=$value;
                        $strkey="";
                    }else{
                        // var_dump($value);
                    }
                }
            }
        }
        foreach ($response as $key=>$value){
            $dotPos = mb_strpos($value,".");
            if($dotPos === false){
                continue;
            }else{
                $response[$key]=mb_substr($value,0,$dotPos+3);
            }
        }
        foreach ($response as $key=>$value){
            if($value == false)
            {
                unset($response[$key]);
            }
            if(self::isIllegle($key)){
                unset($response[$key]);
            }
            if($key=="↓" || $key=="↑"){
                unset($response[$key]);
            }
        }
        return $response;
    }

    public static function checkIncludeChinese($text){
        $pattern = '/[\x7f-\xff]/';
        if(preg_match($pattern,$text)){
            return true;
        }else{
            return false;
        }
    }
    public static function checkIncludeDigit($text){
        $pattern = '/[0~9]/';
        if(preg_match($pattern,$text)){
            return true;
        }else{
            return false;
        }
    }
    public static function checkIncludeDot($text){
        return  mb_strpos($text,".");

    }

    public static function request_post($url = '', $param = '')
    {
        if (empty($url) || empty($param)) {
            return false;
        }

        $postUrl = $url;
        $curlPost = $param;
        // 初始化curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $postUrl);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        // 要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // post提交方式
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        // 运行curl
        $data = curl_exec($curl);
        curl_close($curl);

        return $data;
    }

    public static function checkGeneral(){
        $token = '#####调用鉴权接口获取的token#####';
        $url = 'https://aip.baidubce.com/rest/2.0/ocr/v1/general?access_token=' . $token;
        $img = file_get_contents('########本地文件路径########');
        $img = base64_encode($img);
        $bodys = array(
            "image" => $img
        );
        $res = request_post($url, $bodys);

        var_dump($res);
    }

    public static function filterChars($data){
        for($i=0;$i<strlen($data);$i++){
            if(ord($data[$i])>=32 && ord($data[$i])<=127){
                continue;
            }else{
                break;
            }
        }
        return substr($data,$i);
    }

    public static function filterByDistance($data){
        for($i=0;$i<count($data)-2;$i++){
            $distance2 = self::computeDistance($data[$i]["location"],$data[$i+1]["location"]);
            $distance3 = self::computeDistance($data[$i]["location"],$data[$i+2]["location"]);
//            echo sprintf("%s,distance2:%s,distance3:%s\n",$data[$i]["words"],$distance2,$distance3);
            if($distance2>$distance3 && $data[$i+1]["location"]["left"]>$data[$i]["location"]["left"] && $data[$i+2]["location"]["left"]>$data[$i]["location"]["left"]){
                $data = self::exchange($data,$i+1,$i+2);
            }
            $data[$i]["location"]["distance1"]=$distance2;
            $data[$i]["location"]["distance2"]=$distance3;
        }

        for($i=0;$i<count($data)-2;$i++){
            $distance2 = self::computeDistance($data[$i]["location"],$data[$i+1]["location"]);
            $distance3 = self::computeDistance($data[$i]["location"],$data[$i+2]["location"]);
            $data[$i]["location"]["distance3"]=$distance2;
            $data[$i]["location"]["distance4"]=$distance3;
        }

        //   var_dump(json_encode($data));
        return $data;
    }

    public static function computeDistance($a,$b){
        return abs($a["top"]-$b["top"])*abs($a["top"]-$b["top"])+abs($a["left"]-$b["left"])*abs($a["left"]-$b["left"]);
    }
    public static function exchange($data,$i,$j){
        $tmp= $data[$j];
        $data[$j]=$data[$i];
        $data[$i]=$tmp;
        return $data;
    }
    public static function isIllegle($str){
        for($i=0;$i<mb_strlen($str);$i++){
            if(self::checkIncludeChinese($str[$i]) || self::checkIncludeDigit($str[$i]) || self::checkIncludeChar($str[$i])){
                continue;
            }else{
                return true;
            }
        }
        return false;
    }
    public static function checkIncludeChar($str){
        if(ord($str)>=65 && ord($str)<=90 ||ord($str)>=97 && ord($str)<=122  ) {
            return true;
        }
        return false;
    }

}

//$filename = "3b62fc5f6b53380f244b8119c034c756.jpg";
//
//var_dump(json_encode(OcrTest::checkByGeneral($filename)));
