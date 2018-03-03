<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
$this->title = 'NSW government school enrolments by head count';
?>
<div class="site-index">
    <h1>School Data</h1>
    <?php if ($session->has('admin')) {
        // todo: Do some admin-y things
    }
    ?>
    <p class="lead">See below the available school's and a head count for each year.</p>
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
