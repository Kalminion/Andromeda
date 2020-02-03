<div class="title">
    Edit <?= $artifacts_variable['name']; ?> from <?= $artifact['name']; ?>
</div> <!-- TITLE -->

<section>
    <form method="post" action="index.php?page=7&sub=1&action=8&artifacts_id=<?= $artifact['id']; ?>">
        <div><label for="artifacts_variables_name">Name</label>     <input type="text" name="name" id="artifacts_variables_name" value="<?= $artifacts_variable['name']; ?>" /></div>
        <div>                                                       <input type="submit" value="Save" /></div>
                                                                    <input type="hidden" name="form" value="artifacts_variables_edit" />
                                                                    <input type="hidden" name="variable" value="<?= $artifacts_variable['id']; ?>" />
    </form>

    <a class="button delete" href="index.php?page=7&sub=1&action=11&artifacts_id=<?= $artifact['id']; ?>&artifacts_variables_id=<?= $artifacts_variable['id']; ?>">Delete <?= $artifacts_variable['name']; ?></a>
</section>