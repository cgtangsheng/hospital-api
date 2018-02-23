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
class CenterController extends Controller {

    public $layout = "blank";

    public function actionIndex() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        return $this->render('/center/index', [
            'model' => $model,
        ]);
    }


}