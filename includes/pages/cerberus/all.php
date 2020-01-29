<?php
    if (isset($_GET['delete']) && $_GET['delete'] != NULL) {
        $cerberus->delete($_GET['delete']);
    }

    $cerbs->request();
?>

<div class="title">
    All Cerberus
</div> <!-- END TITLE -->

<section id="cerberusContent">
</section>

<script>
    $.getJSON('includes/json/results.json', function(json) {
        $('#cerberusContent').append(json);
    });
</script>