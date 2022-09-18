<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    /*[
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['canAdmin'],
                    ],*/
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'role'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRole()
    {
        /*$role = Yii::$app->authManager->createRole('admin');
        $role->description = ('Admin');
        Yii::$app->authManager->add($role);

        $contentManager = Yii::$app->authManager->createRole('content_manager');
        $contentManager->description = ('Content Manager');
        Yii::$app->authManager->add($contentManager);

        $ban = Yii::$app->authManager->createRole('banned');
        $ban->description = ('Ban');
        Yii::$app->authManager->add($ban);

        $permit = Yii::$app->authManager->createPermission('canAdmin');
        $permit->description = ('Log in admin');
        Yii::$app->authManager->add($permit);

        $roleA = Yii::$app->authManager->getRole('admin');
        $roleC = Yii::$app->authManager->getRole('content_manager');
        $permit = Yii::$app->authManager->getPermission('canAdmin');
        Yii::$app->authManager->addChild($roleA, $permit);
        Yii::$app->authManager->addChild($roleC, $permit);*/

        $userRole = Yii::$app->authManager->getRole('admin');
        Yii::$app->authManager->assign($userRole, Yii::$app->user->id);

        return 101001;
    }
}
