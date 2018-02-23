<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-30
 * Time: 下午10:46
 */

namespace app\modules\user\controllers;
use yii\web\Controller;
use app\models\LoginForm;
use yii;
class LoginController extends Controller {
    public $layout = "/blank";
    public function actionIn() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        $post = \Yii::$app->request->post();
        if(!isset($post["username"])||!isset($post["password"])){
            return $this->goHome();
        }else{
            $model->username = $post["username"];
            $model->password = $post["password"];
        }
        if ($model->login()) {
            return $this->goBack();
        }
        return $this->render('login-in', [
            'model' => $model,
        ]);
    }

    public function actionOut() {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}