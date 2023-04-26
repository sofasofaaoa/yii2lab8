<?php

namespace app\modules;

use app\models\User;
use Yii;

/**
 * 1 module definition class
 */
class admin extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors(){
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->login);
                        }
                    ],
                ],
            ],
        ];
    }
}
