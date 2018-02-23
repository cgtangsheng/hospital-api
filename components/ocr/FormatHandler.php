<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 18-1-18
 * Time: 下午11:42
 */
namespace app\components\ocr;

class FormatHandler{

    const CONST_TAN_LIMIT = 0.01;
    public static $flag = 0;



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

    public static function formatByAngle($data){
        foreach ($data as $key=>$value){
            $location = $value["location"];
            $data[$key]["center"]=array(
                "x"=>$location["left"]+$location["width"]/2,
                "y"=>$location["top"]+$location["height"]/2,
            );
        }
        usort($data,array('self','compare'));
        $level = 0;
        for($i=0;$i<count($data)-1;$i++){
            if(self::computeTan($data[$i]["location"],$data[$i+1]["location"])){
                $data[$i]["level"]=$level;
            }else{
                $level++;
                $data[$i]["level"]=$level;
            }
        }
        return $data;
    }

    public static function computeTan($a,$b){
        if($b["left"] == $a["left"]){
            //说明两个框是在同一个水平线上，元素应该有对应关系
            return true;
        }
        $tan = ($b["top"]-$a["top"]-$a["height"])/($b["left"]-$a["left"]-$a["width"]);
        if($tan < 0){
            //小于0,说明数据错行了，两者肯定在不同的行
            return false;
        }
        if($tan<self::CONST_TAN_LIMIT){
            return true;
        }
        return false;
    }
    public static function computeRate($a,$b){
        if($a["location"]["left"]-$b["location"]["left"] == 0){
            return array(
                "rate"=>0,
                "flag"=>0
            );
        }
        $rate =  ($b["location"]["top"]-$a["location"]["top"])/($b["location"]["left"]-$a["location"]["left"]);
        $res = array(
            "rate"=>$rate
        );
        if($rate>0){
            $res["flag"]=1;
        }else{
            $res["flag"]=-1;
        }
        return $res;
    }

    public static function checkSimlar($a,$b){
        if($a["flag"]!=$b["flag"]){
            return false;
        }
        $tmp = abs($a["rate"])-abs($b["rate"]);
        if(abs($tmp)<=self::CONST_TAN_LIMIT){
            return true;
        }else{
            return false;
        }
    }


    public static function formatNewStrage($data){
        $result = array();
        $result["title"]=$data[0]["words"];
        $result["title2"]=$data[1]["words"];
        $result["title3"]=$data[2]["words"];
        $rate = self::computeRate($data[2],$data[1]);
        $result["rate"]=$rate;
        $length = count($data);
        $level = 2;
        for($i=3;$i<$length;$i++){
            $tmpRate = self::computeRate($data[$i],$data[$i-1]);
            if(self::checkSimlar($tmpRate,$rate)){
                $data[$i]["level"]=$level;
                $data[$i]["rate"]=$tmpRate;
                $result["data"][]=$data[$i];
            }else{
                $level++;
                $data[$i]["level"]=$level;
                $data[$i]["rate"]=$tmpRate;
                $result["data"][]=$data[$i];
            }
        }
        return $result["data"];

    }



}