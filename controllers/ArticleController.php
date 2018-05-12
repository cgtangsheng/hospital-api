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
use yii\web\Response;

class ArticleController extends Controller{

    public function actionPublish(){
        $response = array();
        header("Access-Control-Allow-Origin: *");

        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Article();
        $article_id = $model->getArticleId();
        $model->id = $article_id;
        $model->title = strval($_REQUEST["title"]);
        $model->source = strval($_REQUEST["source"]);
        $model->content = strval($_REQUEST["content"]);
        $model->images = strval($_REQUEST["images"]);
        $model->classify = strval($_REQUEST["classify"]);
        if($model->save()){
            $response=array(
                "ret"=>0,
                "msg"=>"publish success"
            );
            Yii::$app->response->data = $response;
            return $response;
        }
    }

    public function actionIndex(){
        $response = array();
        header("Access-Control-Allow-Origin: *");

        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = strval($_REQUEST["id"]);
        $response = Article::findOne(["id"=>$id])->toArray();
        if ($response == false){
            Yii::$app->response->data["ret"]=-1;
            return ;
        }
        $response["update_time"] = date("Y-m-d",strtotime($response["update_time"]));
        $response["ret"]=0;
        Yii::$app->response->data = $response;
        return $response;
    }

    public function actionImageUpload(){
        $response = array();
        header("Access-Control-Allow-Origin: *");

        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $fileObj=$_FILES['upload_file'];
        $fileName = md5(date("Y-m-d H:i:s"));
        $imgInfo = explode(".",$fileObj["name"]);
        $type = $imgInfo[1];
        $fileName = $fileName.".".$type;
        $res=move_uploaded_file($fileObj["tmp_name"],Yii::$app->params["imagePath"]."/".$fileName);
        $url = Yii::$app->params["hostUrl"]."/images/".$fileName;
        Yii::$app->response->data = array("url"=>$url);
    }

    public function actionGetArticleList(){
        $response = array();
        header("Access-Control-Allow-Origin: *");
        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Article();
        $res = $model->getArticleList();
        foreach($res as $key=>$value){
            if(isset($value["images"])&&$value["images"]!=false){
                $images = json_decode($value["images"]);
            }
            if(count($images)==0){
                $images = array("http://zldzbl.cn/images/veer-141866457.jpg");
            }
            $res[$key]["img"]=$images[0];
            $res[$key]["abstract"]=$value["title"];
            $res[$key]["read"]=rand(0,200);
            $res[$key]["url"]="/article/index?id=".$value["id"];
        }
        Yii::$app->response->data = array("info"=>$res);
    }

    public function actionGetAllArticles(){
        $response = array();
        header("Access-Control-Allow-Origin: *");
        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $page = intval($_REQUEST["page"]);
        $model = new Article();
        $res = $model->getAllArticles($page);
        foreach($res as $key=>$value){
            if(isset($value["images"])&&$value["images"]!=false){
                $images = json_decode($value["images"]);
            }
            if(count($images)==0){
                $images = array("http://zldzbl.cn/images/veer-141866457.jpg");
            }

            $res[$key]["img"]=$images[0];
            $res[$key]["abstract"]=$value["title"];
            $res[$key]["read"]=rand(0,200);
            $res[$key]["url"]="/article/index?id=".$value["id"];
        }
        $resTotal = $model->getArticleCount();
        Yii::$app->response->data = array("info"=>$res,"ret"=>0,"totalCount"=>intval($resTotal["count"]));
    }

    public function actionEdit(){
        $response = array();
        header("Access-Control-Allow-Origin: *");
        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Article();
        $model->id = $_REQUEST["id"];
        $model->content = $_REQUEST["content"];
        $model->title = $_REQUEST["title"];
        $model->classify = $_REQUEST["classify"];
//        $model->images = $_REQUEST["images"];
        $res = $model->editArticle();
        if($res == false){
            Yii::$app->response->data = array("ret"=>-1);
        }else{
            Yii::$app->response->data = array("ret"=>0);
        }
    }
}