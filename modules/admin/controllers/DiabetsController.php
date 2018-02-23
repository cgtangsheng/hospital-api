<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-30
 * Time: 下午10:37
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii;
use app\models\DmRecord;

class DiabetsController extends Controller {

    public $layout = "/blank";

    public function actionMonitor() {
        $sql = "select * from user_info";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($res as $key=>$value){
            $index = rand(0,100);
            if($index%2 == 0){
                $res[$key]["status"]=1;
            }else{
                $res[$key]["status"]=0;
            }
        }
        return $this->render('monitor',["data"=>$res]);
    }
    public function actionSendMonitor() {
        $sql = "select * from dm_record as dm left join user_info as u on dm.health_id=u.health_id";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('monitor',["data"=>$res]);
    }
    public function actionRecordDetail(){
        $id = Yii::$app->request->get("id",false);
        if($id == false){
            return ;
        }
        $sql = "select * from dm_record as dm left join user_info as u on dm.health_id=u.health_id order by create_time desc ";
        $res = Yii::$app->db->createCommand($sql)->bindParam(":id",$id)->queryOne();
        foreach ($res as $key=>$value){
            if($value == false){
                unset($res[$key]);
            }
        }
        $model = new DmRecord();
        //检查BMI指数
        $result = array();

        $data = $model->checkBmiInfo($res);
        $result = array_merge($result,$data);
        //评估饮食状况
        $data = $model->checkDietInfo($res);
        $result = array_merge($result,$data);
        //评估糖尿病综合指标
        $data = $model->checkGluCoseInfo($res);
        $result = array_merge($result,$data);

       // return $this->render('check',["data"=>$result]);
        return $this->render("record-detail",["data"=>$result,"id"=>$id]);
    }

    public function actionSearchMonitor() {
        $dateMin = Yii::$app->request->get("datemin",false);
        $dateMax = Yii::$app->request->get("datemax",false);
        $searchkey = Yii::$app->request->get("searchkey",false);
        $sql = "select * from dm_record as dm left join user_info as u on dm.health_id=u.health_id";
        if($dateMax == false && $dateMin==false && $searchkey==false){
            $res = Yii::$app->db->createCommand($sql)->queryAll();
        }else{
            $condition = array();
            if($dateMin !=false){
                $condition["dateMin"]=" create_time >=:dateMin";
            }
            if($dateMax !=false){
                $condition["dateMax"] = " create_time <=:dateMax";
            }
            $sql = $sql." where ".implode("and",$condition);

            if($searchkey !=false){
                if($dateMax == false && $dateMin == false){
                    $sql = $sql . " name like '%$searchkey%' or tel like '%$searchkey%' ";
                }else{
                    $sql = $sql . " and ( name like '%$searchkey%' or tel like '%$searchkey%' )";
                }
            }
            $handler = Yii::$app->db->createCommand($sql);
            foreach ($condition as $key=>$value){
                $handler = $handler->bindParam(":$key",$$key);
            }
            $res = $handler->queryAll();

        }
        return $this->render('search-monitor',["data"=>$res]);
    }
}