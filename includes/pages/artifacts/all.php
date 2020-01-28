<?php
    if (isset($_GET['delete']) && $_GET['delete'] != NULL) {
        $artifacts->delete($_GET['delete']);
    }
?>

<div class="title">
    All Artifacts
</div> <!-- END TITLE -->

<section>
<?php
    if ($artifacts->count() > 0) {

        foreach($artifacts->all() as $artifact_key => $artifact_value) {
?>
            <div class="tablerow">
                <div class="tablecell namecell"><?= $artifact_value['name']; ?></div> <!-- END TABLE CELL -->
                <div class="tablecell buttoncell"><a href="index.php?page=7&sub=1&action=4&artifacts_id=<?= $artifact_value['id']; ?>">Statics</a></div> <!-- END TABLE CELL -->
                <div class="tablecell buttoncell"><a href="index.php?page=7&sub=1&action=8&artifacts_id=<?= $artifact_value['id']; ?>">Variables</a></div> <!-- END TABLE CELL -->
                <div class="tablecell buttoncell"><a href="index.php?page=7&sub=1&action=2&artifacts_id=<?= $artifact_value['id']; ?>">Edit</a></div> <!-- END TABLLE CELL -->
                <div class="tablecell buttoncell"><a href="index.php?page=7&sub=1&action=3&artifacts_id=<?= $artifact_value['id']; ?>">Delete</a></div> <!-- END TABLE CELL -->
            </div> <!-- END TABLEROW -->
<?php
        }
    } else {
        echo 'No artifacts';
    }
?>
    <a class="button add" href="index.php?page=7&sub=1&action=1">Add Artifact</a>
</section>