<?php
    if (isset($_GET['delete']) && $_GET['delete'] != NULL) {
        $artifacts_statics->delete($_GET['delete']);
    }
?>

<div class="title">
    All <?= $artifact['name']; ?> Statics
</div> <!-- END TITLE -->

<section>
<?php
    if ($artifacts_statics->count() > 0) {

        foreach($artifacts_statics->all() as $static_key => $static_value) {
?>
            <div class="tablerow">
                <div class="tablecell namecell"><?= $static_value['name']; ?></div> <!-- END TABLE CELL -->
                <div class="tablecell buttoncell"><a href="index.php?page=7&sub=1&action=6&artifacts_id=<?= $artifact['id']; ?>&artifacts_statics_id=<?= $static_value['id']; ?>">Edit</a></div> <!-- END TABLLE CELL -->
                <div class="tablecell buttoncell"><a href="index.php?page=7&sub=1&action=7&artifacts_id=<?= $artifact['id']; ?>&artifacts_statics_id=<?= $static_value['id']; ?>">Delete</a></div> <!-- END TABLE CELL -->
            </div> <!-- END TABLEROW -->
<?php
        }
    } else {
        echo 'No artifact statics';
    }
?>
    <a class="button add" href="index.php?page=7&sub=1&action=5&artifacts_id=<?= $artifact['id']; ?>">Add <?= $artifact['name']; ?> Static</a>
</section>