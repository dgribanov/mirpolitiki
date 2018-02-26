<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Article;
use app\models\Tag;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\db\Expression;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays index page.
     *
     * @param $type integer
     * @param $tag integer
     *
     * @return mixed
     */
    public function actionIndex($type = null, $tag = null)
    {
        $query = Article::find();

        if ($type && \in_array((int)$type, Article::getTypes())) {
            $query->andWhere(['type' => $type]);
        }

        if ($tag && isset(Tag::getAllTagsList()[$tag])) {
            $query
                ->joinWith(['articleTags'], false, 'INNER JOIN')
                ->andWhere(['articles_tags.tag_id' => $tag]);
        }

        $articlesDataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'articlesDataProvider' => $articlesDataProvider
        ]);
    }

    /**
     * Displays detail page.
     *
     * @param $id integer
     *
     * @return mixed
     */
    public function actionDetail($id = null)
    {
        $article = $this->findModel($id);

        $tags = $article->tagsList;
        $select = new Expression(
            'id,
            title,
            (SELECT Count(*) FROM articles as articles_count WHERE articles_count.is_deleted = false AND articles_count.type = articles.type) as typeCount,
            (SELECT Count(*) FROM articles_tags WHERE articles_tags.is_deleted = false AND articles.id = articles_tags.article_id AND articles_tags.tag_id IN (' . \implode(', ', $tags) . ')) as tagsCount'
        );
        $similarArticles =
            (new Query())
                ->select($select)
                ->from('articles')
                ->where(['articles.is_deleted' => false])
                ->andWhere(['not', ['articles.id' => $id]])
                ->orderBy(['tagsCount' => SORT_DESC, 'typeCount' => SORT_DESC])
                ->limit(5)
                ->all();

        return $this->render('detail', [
            'article' => $article,
            'similarArticles' => $similarArticles
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
