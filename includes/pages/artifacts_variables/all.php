<?php
    if (isset($_GET['delete']) && $_GET['delete'] != NULL) {
        $artifacts_variables->delete($_GET['delete']);
    }
?>

<div class="title">
    All <?= $artifact['name']; ?> Variables
</div>

<section>
<?php
    if ($artifacts_variables->count() > 0) {

        $maxlevel = $artifacts_values->max_artifact_level($artifact['id']);
?>
        <table>
            <tr>
                <td>Name</td>
<?php
                for($level = 1; $level <= $maxlevel; $level++) {
?>
                    <td><a href="index.php?page=7&sub=1&action=13&artifacts_id=<?= $artifact['id']; ?>&level=<?= $level; ?>">Level <?= $level; ?></a></td>
<?php
                }
?>
            </tr>
<?php
            foreach($artifacts_variables->get_from_artifact($artifact['id']) as $variable_key => $variable_value) {
?>
                <tr>
                    <td><a href="index.php?page=7&sub=1&action=10&artifacts_id=<?= $artifact['id']; ?>&artifacts_variables_id=<?= $variable_value['id']; ?>"><?= $variable_value['name']; ?></a></td>
<?php
                    for($level = 1; $level <= $maxlevel; $level++) {
                        $value = $artifacts_values->from_variable_and_level($variable_value['id'], $level);
?>
                        <td><?= $value['value']; ?></td>
<?php                        
                    }
?>
                </tr>
<?php
            }
?>
        </table>

<?php
    } else {
        echo 'No artifact variables';
    }
?>

    <a class="button add" href="index.php?page=7&sub=1&action=9&artifacts_id=<?= $artifact['id']; ?>">Add <?= $artifact['name']; ?> Variable</a>
    <a class="button add" href="index.php?page=7&sub=1&action=12&artifacts_id=<?= $artifact['id']; ?>">Add <?= $artifact['name']; ?> Level</a>
</section>