<?php

namespace app\modules\controllers;
use app\models\User;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $lastUsers = User::find()->orderBy('id desc')->limit(3)->all();

        return $this->render('index', [
            'lastUsers' => $lastUsers
        ]);
    }
}

