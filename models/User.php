<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $email
 * @property string $login
 * @property string $password
 * @property string $image
 * @property int $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */

    public $repeat_password;
    public $file;
    const ROLE_ADMIN = 1;
    const ROLE_USER = 0;


    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'email', 'login', 'password', 'repeat_password'], 'required'],
            ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],
            [['fio', 'email', 'login'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 255],
            [['fio'], 'match', 'pattern' => '/^[а-яА-ЯёЁ ]+$/u'],
            [['email'], 'email'],
            [['login'], 'unique'],
            [
                ['password'],'match',
                'pattern'=> '/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}$/u'
            ],
            [['repeat_password'], 'compare', 'compareAttribute' => 'password'],
            [
                ['file'], 'file',
                'skipOnEmpty' => false,
                'extensions' => 'jpg, png, jpeg, bmp', 'maxSize' => 1024 * 1024 * 10
            ]
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'email' => 'Почта',
            'login' => 'Логин',
            'password' => 'Пароль',
            'image' => 'Аватар',
        ];
    }

    public function upload()
    {
        if (!$this->file)
            return false;
        $name = '/web/uploads' . time() . rand(0, 100) . '.' . $this->file->extension;
        $filename = Yii::getAlias('@webroot') . $name;
        $url = Yii::getAlias('@web') . $name;
        if ($this->file->saveAs($filename))
            return $url;
        return false;
    }

    public function validatePassword($password)
    {
        return $this->password == $password;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {

    }
    public function validateAuthKey($authKey)
    {

    }

    public static function isUserAdmin($login)
    {
        if (static::findOne(['login' => $login, 'role' => self::ROLE_ADMIN]))
        {
            return true;
        } else {
            return false;
        }
    }
}
