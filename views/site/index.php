<?php
/* @var $this yii\web\View */

$this->title = 'NSW government school enrolments by head count';
?>
<div class="site-index">
    <h1>School Data</h1>
    <?php if ($session->has('admin')) {
        // todo: Do some admin-y things
    }
    ?>
    <p class="lead">See below the available school's and a head count for each year.</p>
    <table>
        <thead>
            <th>School Name</th>
            <th>Head Count</th>
        </thead>
        <tbody>
            <?php foreach ($schools->getAll() as $school) { ?>
            <tr>
                <td><?php echo $school->getName() ?></td>
                <td><?php echo $school->getTotalHeadCount() ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
