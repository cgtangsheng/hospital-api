<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 18-2-6
 * Time: 下午11:44
 */

namespace app\modules\doctor\controllers;
use app\models\Doctor;
use app\models\User;
use yii\web\Controller;
use yii;
class AccountController extends Controller
{
    public $layout = "/blank";

    public function actionCreate(){
        $model = new User();
        $id = Yii::$app->request->get("id");
        $request = Yii::$app->request->post();
        if($request!=false){
            $data = User::findOne(["username"=>$request["username"]]);
            if($data == false){
                $model->username = $request["username"];
                $model->password = $request["password"];
                $model->type = 1;
                if ($model->save()) {
                    return $this->redirect(['/doctor/login/in', 'id' => $id]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                        'error'=>false
                    ]);
                }
            }else{
                return $this->render('create', [
                    'error' => "当前手机号已经存在"
                ]);
            }
        }
        return $this->render('create', [
            'model' => $model,
            'error'=>false
        ]);
    }
}