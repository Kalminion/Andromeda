<?php
    $cerbs->find($_GET['cerberus_id']);
?>

<div class="title">
    Edit cerberus
</div> <!-- END TITLE -->

<section id="cerberusEdit">
</section>

<script>
function editPage(result) {
    // Items to skip in form display
    var skip = ["id", "added_by", "added_on", "editted_by", "editted_on", "deleted_by", "deleted_on"];

    for(var item in result) {
        // skip items
        if (!skip.includes(item)) {
            document.getElementById('cerberusEdit').append(item);
            document.getElementById('cerberusEdit').append(result[item]);
        }
    }
}

grabJson('edit');
</script>