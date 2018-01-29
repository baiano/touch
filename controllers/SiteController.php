<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\Session;
use yii\data\ArrayDataProvider;
use yii\data\Sort;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Repos;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
     * Displays users lists.
     *
     * @return string
     */
    public function actionUsers($userName)
    {
        $user = new User();
        $user = $user->getUser($userName);
        $u = [];
        if (!empty($user)){
            $temp = ArrayHelper::toArray($user, [
                'app\models\User' => [
                    'username',
                    'avatar',
                    'email',
                    'following',
                    'followers',
                    'bio'
                ],
            ]);

            $u[] = $temp;
        }

        $dataProvider =  new ArrayDataProvider([
            'allModels' => $u,
            'sort' => [
                'attributes' => ['id'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);


        return $this->render('users', [
            'dataProvider'  => $dataProvider,
            'userName'      => $userName
        ]);
    }

    /**
     * Redirect to users action
     *
     * @return string
     */
    public function actionUser()
    {
        return $this->redirect('/users/' . Yii::$app->request->post('user'));
    }

    /**
     * View user's repositories
     *
     * @return string
     */
    public function actionRepos($userName)
    {
        $repos = new User();
        $repos = $repos->getRepos($userName);

        ArrayHelper::multisort($repos, ['stars'], [SORT_DESC]);
        $dataProvider =  new ArrayDataProvider([
            'key'=>'stars',
            'allModels' => $repos,
            'sort' => [
                'attributes' => ['stars', 'name', 'fullName', 'htmlUrl'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        return $this->render('repos', [
            'dataProvider'  => $dataProvider,
            'userName'      => $userName
        ]);
    }

    /**
     * View repository details
     *
     * @return string
     */
    public function actionRepoView($userName, $repo)
    {
        $r = new Repos();
        $r = $r->getRepoDetails($userName,$repo);
        // echo '<pre>';print_r($r);exit;
        $dataProvider =  new ArrayDataProvider([
            'key'=>'stars',
            'allModels' => [$r],
            'sort' => [
                'attributes' => ['stars', 'name', 'description'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        return $this->render('repo', [
            'dataProvider' => $dataProvider,
            'userName'     => $userName,
            'repo'         => $repo
        ]);
    }
}
