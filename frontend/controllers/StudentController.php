<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Student;
use frontend\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
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
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $file = UploadedFile::getInstance($model, 'std_pic');
            $fn = date('dmY') . rand(1, 999) . substr(time(), 7, 11) . rand(1, 999);
            $filename = ($fn) . '.' . $file->extension;
            $realFileName = iconv('utf-8', 'WINDOWS-874', $fn) . '.' .
                $file->extension;
            $file->saveAs(Yii::getAlias('@webroot') . './' .
                'photo' . '/' . $realFileName);
            $model->std_pic = $filename;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->std_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_photo = $model->std_pic;
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'std_pic');
            if ($file) {
                if (!empty($old_photo)) {
                    @unlink(Yii::getAlias('@webroot') . './' .
                        'photo' . '/' . $old_photo);
                }
                $fn = date('dmY') . rand(1, 999) . substr(time(), 7, 11) . rand(1, 999);
                $filename = ($fn) . '.' . $file->extension;
                $realFileName = iconv('utf-8', 'WINDOWS-874', $fn) . '.' .
                    $file->extension;
                $file->saveAs(Yii::getAlias('@webroot') . './' .
                    'photo' . '/' . $realFileName);
                $model->std_pic = $filename;
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->std_id]);
                }
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->std_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $old_photo = $model->std_pic;
        if (!empty($old_photo)) {
            @unlink(Yii::getAlias('@webroot') . './' .
                'photo' . '/' . $old_photo);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
