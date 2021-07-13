<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = "Media Gallery";
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?php echo Html::encode($this->title) ?></h1>

<p>
    <?php echo Html::a('Upload File', ['upload'], ['class' => 'btn btn-primary']) ?>
</p>
<div class="row">
    <?php 
        foreach ($medias as $media) {
    ?>
    <div class="col-md-3">
        <div class="card">
            <img src="<?php echo Yii::getAlias('@web').'/'.$media->filepath; ?>" alt="" class="card-mg-top" width="100%">
            <div class="card-body">
                <h5 class="card-title"><?php echo $media->filename; ?></h5>
            </div>
        </div>
    </div>
    <?php 
        }
    ?>
</div>
