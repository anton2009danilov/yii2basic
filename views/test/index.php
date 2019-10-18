<?php
/* @var $this yii\web\View */
/* @var $text string */
/* @var $product Product */

use app\models\Product;

?>
    <p>
        Test: <?=$text?>

    </p>

<?php
echo \yii\widgets\DetailView::widget(['model' => $product]);
