<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ImageFile;
use app\models\ImageFileSearch;
use app\models\UploadImageForm;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


/**
 * ImagesController implements the CRUD actions for ImageFile model.
 */
class ImagesController extends BaseController
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
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
     * Lists all ImageFile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImageFileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ImageFile model.
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
     * Creates a new ImageFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UploadImageForm();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if (!$model->upload(new ImageFile())) {
                    throw new \LogicException('File upload error!');
                }

                $transaction->commit();

                return $this->redirect(['view', 'id' => $model->image->id]);
            } catch (\LogicException $e) {
                $transaction->rollBack();

                $this->sendExceptionFlash($e, 'Изображение не сохранено');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ImageFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new UploadImageForm();
        $image = $this->findModel($id);
        $model->id = $image->id;
        $model->description = $image->description;
        $model->title = $image->title;

        if (!$image) {
            throw new NotFoundHttpException('Not found image file with ID ' . $id);
        }

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if (!$image->softDelete()) {
                    throw new \LogicException('Error while file model delete!');
                }

                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if (!$model->upload(new ImageFile())) {
                    throw new \LogicException('File upload error!');
                }

                $transaction->commit();

                return $this->redirect(['view', 'id' => $model->image->id]);
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
     * Deletes an existing ImageFile model.
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
     * Finds the ImageFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ImageFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ImageFile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
