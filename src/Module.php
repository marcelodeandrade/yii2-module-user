<?php

namespace M91\UserModule;

use Yii;

/**
 * rbac module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $defaultRoute = 'user/index';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'M91\UserModule\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->setLoginUrl();
        $this->registerTranslations();
    }

    public function setLoginUrl()
    {
        Yii::$app->user->loginUrl = ['/user-module/auth/login'];
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['module.user'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'forceTranslation' => true,
            'sourceLanguage' => 'pt-br',
            'basePath' => '@vendor/M91/yii2-module-user/src/messages',
            'fileMap' => [
                'module.user' => 'app.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('module.user', $message, $params, $language);
    }
}
