<?php

namespace app\controllers;

use Yii;
use app\models\Media;
use yii\web\UploadedFile;
use yii\web\Controller;

class MediaController extends Controller
{
    public function actionIndex()
    {
        $data = Media::find()->all();
        return $this->render('index', ['medias' => $data]);
    }

    public function actionUpload()
    {
        $model = new Media();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                $names = UploadedFile::getInstances($model, 'filename');
                foreach ($names as $name) {
                    $path = 'uploads/' . md5($name->baseName) . '.' . $name->extension;
                    if ($name->saveAs($path)) {
                        $filename = $name->baseName . '.' . $name->extension;
                        $filepath = $path;
                        Yii::$app->db->createCommand()->insert('media', ['filename' => $filename, 'filepath' => $filepath])->execute();
                    }
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('upload', [
            'model' => $model,
        ]);
    }
}
