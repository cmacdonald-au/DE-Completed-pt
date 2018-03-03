<?php
/* @var $this yii\web\View */

use yii\grid\GridView;

$formatter = \Yii::$app->formatter;
$this->title = 'NSW government school enrolments by head count';
?>
<div class="site-index">
    <h1>School Data</h1>

    <?php if (!Yii::$app->user->isGuest) { ?>
        <h2>Statistics</h2>
        <ul>
            <li><strong>Last Fetched At:</strong> <?php echo $formatter->asDateTime($lastFetchedAt, 'long') ?></li>
            <li><strong>Total Records Synced:</strong> <?php echo count($schools->getAll()) ?></li>
        </ul>
    <?php } ?>

    <p class="lead">See below the available school's and a total head count of enrolments recorded.</p>
    <?php
        echo GridView::widget([
            'dataProvider' => $data,
            'columns' => [
                'name' => [
                    'label' => 'School Name',
                    'value' => function ($data) {
                        return $data->getName();
                    }
                ],
                'headcount' => [
                    'label' => 'Total Headcount',
                    'value' => function ($data) {
                        return $data->getTotalHeadCount();
                    }
                ],
            ],
        ]);
    ?>
</div>
