<div class="title">
    Add <?= $artifact['name']; ?> Level
</div> <!-- END TITLE -->

<section>
<?php
    $forms->add('artifacts_values', 'index.php?page=7&sub=1&action=8&artifacts_id='.$artifact['id']);
?>
</section>