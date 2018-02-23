<?php
/**
 * Created by PhpStorm.
 * User: tomstang
 * Date: 17-10-30
 * Time: 下午10:37
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
class SiteController extends Controller {

    public function actionLogin() {
        $this->layout = "/blank";
        return $this->render('login');
    }
}