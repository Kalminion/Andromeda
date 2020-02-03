<div class="title">
    Add <?= $artifact['name']; ?> Variable
</div> <!-- TITLE -->

<section>
<?php
    $forms->add('artifacts_variables', 'index.php?page=7&sub=1&action=8&artifacts_id='.$artifact['id']);
?>
</section>