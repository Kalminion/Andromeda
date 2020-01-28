<div class="title">
    Edit <?= $artifacts_static['name']; ?> From <?= $artifact['name']; ?>
</div> <!-- TITLE -->

<section>
    <form method="post" action="index.php?page=7&sub=1&action=4&artifact_id=<?= $artifact['id']; ?>">
        <div><label for="artifacts_statics_name">Name</label>       <input type="text" name="name" id="artifacts_statics_name" value="<?= $artifacts_static['name']; ?>" /></div>
        <div><label for="artifacts_statics_value">Value</label>     <input type="text" name="value" id="artifacts_statics_value" value="<?= $artifacts_static['value']; ?>" /></div>
        <div>                                                       <input type="submit" value="Save" /></div>
                                                                    <input type="hidden" name="form" value="artifacts_statics_edit" />
                                                                    <input type="hidden" name="static" value="<?= $artifacts_static['id']; ?>" />
    </form>
</section>