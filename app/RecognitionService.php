// app/RecognitionService.php

namespace App;

use Illuminate\Http\UploadedFile;
use TensorFlow;

class RecognitionService
{
    public static function predict(UploadedFile $image)
    {
        $model = new TensorFlow\Model();
        $model->loadModel(storage_path('../flask_app/flowers_recognition_model.h5'));

        $imageData = file_get_contents($image->getRealPath());
        $predictionResult = $model->predict($imageData);
        $predictedClassIndex = array_search(max($predictionResult), $predictionResult);

        return self::getClassLabel($predictedClassIndex);
    }

    private static function getClassLabel($classIndex)
    {
        $classLabels = ['DAISY', 'ROSE', 'SUNFLOWER'];

        return isset($classLabels[$classIndex]) ? $classLabels[$classIndex] : 'UNKNOWN';
    }
}
