<div class="title">
    Add <?= $artifact['name']; ?> Static
</div> <!-- TITLE -->

<section>
<?php
    $forms->add('artifacts_statics','index.php?page=7&sub=1&action=4&artifacts_id='.$artifact['id']);
?>
</section>