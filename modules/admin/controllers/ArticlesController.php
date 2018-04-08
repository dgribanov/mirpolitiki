<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use app\models\ArticleTag;
use app\models\Tag;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\MainArticle;
use app\models\PopularArticle;
use app\models\RecommendedArticle;


/**
 * ArticlesController implements the CRUD actions for Article model.
 */
class ArticlesController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'select-article-placement'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $currentUser = Yii::$app->user->identity;
                            return $currentUser->isAdmin;
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if (!$model->load(Yii::$app->request->post()) || !$model->save()) {
                    throw new \LogicException('ошибка при сохранении статьи');
                }

                if (
                    isset(Yii::$app->request->post('Article')['tagsList']) &&
                    !empty(Yii::$app->request->post('Article')['tagsList'])
                ) {
                    $tagsList = Yii::$app->request->post('Article')['tagsList'];

                    foreach ($tagsList as $tagId) {
                        $tag = Tag::findOne($tagId);

                        if ($tag) {
                            $model->link('tags', $tag);
                        }
                    }
                } else {
                    throw new \LogicException('необходимо выбрать хотя бы один тег');
                }

                $transaction->commit();

                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\LogicException $e) {
                $transaction->rollBack();

                $this->sendExceptionFlash($e, 'Статья не создана');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        /**
         * @var $model Article
         */
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if (!$model->load(Yii::$app->request->post()) || !$model->save()) {
                    throw new \LogicException('ошибка при сохранении статьи');
                }

                $updatedIds = [];
                $articleTags = $model->articleTags;


                if (
                    isset(Yii::$app->request->post('Article')['tagsList']) &&
                    !empty(Yii::$app->request->post('Article')['tagsList'])
                ) {
                    $tagsList = Yii::$app->request->post('Article')['tagsList'];

                    foreach ($tagsList as $tagId) {
                        /**
                         * Find record (including deleted) or create new
                         */
                        $articleTag = ArticleTag::find()->where([
                            'tag_id' => $tagId,
                            'article_id' => $model->id,
                        ])->one() ? : new ArticleTag();

                        $articleTag->setAttributes([
                            'tag_id' => $tagId,
                            'article_id' => $model->id,
                        ]);

                        if ($articleTag->id) {
                            $updatedIds[] = $articleTag->id;
                        }

                        /**
                         * Restore record if it was deleted
                         */
                        if ($articleTag->is_deleted) {
                            $articleTag->restore();
                        } else {
                            if (! $articleTag->save()) {
                                throw new \LogicException('ошибка при сохранении нового тега');
                            }
                        }
                    }
                } else {
                    throw new \LogicException('необходимо выбрать хотя бы один тег');
                }

                foreach ($articleTags as $articleTag) {
                    if (! \in_array($articleTag->id, $updatedIds)) {
                        if (! $articleTag->softDelete()) {
                            throw new \LogicException('ошибка при удалении старого тега');
                        }
                    }
                }

                $transaction->commit();

                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\LogicException $e) {
                $transaction->rollBack();

                $this->sendExceptionFlash($e, 'Изменения не сохранены');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->softDelete();

        return $this->redirect(['index']);
    }

    /**
     * Select article placement.
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSelectArticlePlacement()
    {
        /**
         * @var $mainArticle MainArticle
         */
        $mainArticle = MainArticle::find()->one();

        /**
         * @var $popularArticles PopularArticle[]
         */
        $popularArticles = PopularArticle::find()->all();

        /**
         * @var $recommendedArticles RecommendedArticle[]
         */
        $recommendedArticles = RecommendedArticle::find()->all();

        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if (!$mainArticle->load(Yii::$app->request->post()) || !$mainArticle->save()) {
                    throw new \LogicException('ошибка при сохранении основной статьи');
                }

                foreach ($popularArticles as $index => $popularArticle) {
                    $popularArticle->article_id = (int)Yii::$app->request->post('PopularArticle')[$index]['article_id'];
                    if (!$popularArticle->save()) {
                        throw new \LogicException('ошибка при сохранении популярной статьи');
                    }
                }

                foreach ($recommendedArticles as $index => $recommendedArticle) {
                    $recommendedArticle->article_id = (int)Yii::$app->request->post('RecommendedArticle')[$index]['article_id'];
                    if (!$recommendedArticle->save()) {
                        throw new \LogicException('ошибка при сохранении рекомендованной статьи');
                    }
                }

                $transaction->commit();

                return $this->redirect(['index']);
            } catch (\LogicException $e) {
                $transaction->rollBack();

                $this->sendExceptionFlash($e, 'Изменения не сохранены');
            }
        }

        return $this->render('article_placement', [
            'mainArticle' => $mainArticle,
            'popularArticles' => $popularArticles,
            'recommendedArticles' => $recommendedArticles,
        ]);
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
