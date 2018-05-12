<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-30
 * Time: 下午10:37
 */

namespace app\modules\doctor\controllers;
use app\models\Doctor;
use app\models\LoginForm;
use yii\web\Controller;
use yii;
class LoginController extends Controller
{
    public $layout = "/blank";

    public function actionIn(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if($model->getUser()->getId()!=false){
                $userInfoModel = new Doctor();
                $userInfo = $userInfoModel->getDoctorInfo($model->getUser()->getId());
                if($userInfo == false){
                    return  $this->redirect("/user/edit");
                }
            }
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }
}