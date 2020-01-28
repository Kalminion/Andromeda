<div class="title">
    Edit <?= $artifact['name']; ?>
</div> <!-- TITLE -->

<section>
    <form method="post" action="index.php?page=7&sub=1">
        <div><label for="artifacts_name">Name</label>               <input type="text" name="name" id="artifacts_name" value="<?= $artifact['name']; ?>" /></div>
        <div><label for="artifacts_description">Description</label> <textarea name="description" id="artifacts_description"><?= $artifact['description']; ?></textarea></div>
        <div><label for="artifacts_image">Image</label>             <input type="text" name="image" id="artifacts_image" value="<?= $artifact['image']; ?>" /></div>
        <div>                                                       <input type="submit" value="Save" /></div>
                                                                    <input type="hidden" name="form" value="artifacts_edit" />
                                                                    <input type="hidden" name="id" value="<?= $_GET['artifact']; ?>" />
    </form>
</section>