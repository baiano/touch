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

        $user = [];
        $user[] = $temp;

        $dataProvider =  new ArrayDataProvider([
            'allModels' => $user,
            'sort' => [
                'attributes' => ['id'],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);


        return $this->render('users', [
            'dataProvider' => $dataProvider
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

        $sort = new Sort([
            'attributes' => [
                'stars' => SORT_DESC,
            ],
        ]);
        // ArrayHelper::multisort($repos, ['stars'], [SORT_DESC]);
        $dataProvider =  new ArrayDataProvider([
            'key'=>'stars',
            'allModels' => $repos,
            'sort' => [
                'attributes' => ['stars', 'name', 'fullName', 'htmlUrl'],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        return $this->render('repos', [
            'dataProvider' => $dataProvider,
            'sort' => $sort
        ]);
    }

    /**
     * View repository details
     *
     * @return string
     */
    public function actionRepoView($userName, $repo)
    {
        $repo = new Repos();
        $repo = $repos->getRepoDetails($userName,$repo);

        $sort = new Sort([
            'attributes' => [
                'stars' => SORT_DESC,
            ],
        ]);
        // ArrayHelper::multisort($repos, ['stars'], [SORT_DESC]);
        $dataProvider =  new ArrayDataProvider([
            'key'=>'stars',
            'allModels' => $repos,
            'sort' => [
                'attributes' => ['stars', 'name', 'fullName', 'htmlUrl'],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        return $this->render('repos', [
            'dataProvider' => $dataProvider,
            'sort' => $sort
        ]);
    }
}
