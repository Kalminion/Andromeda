<div class="title">
    Delete <?= $artifacts_static['name']; ?> From <?= $artifact['name']; ?>
</div> <!-- TITLE -->

<section>
    Do you want to delete "<?= $artifacts_static['name']; ?>" from <?= $artifact['name']; ?>?

    <a class="button yes" href="index.php?page=7&sub=1&action=4&artifact_id=<?= $artifact['id']; ?>&delete=<?= $artifacts_static['id']; ?>">Yes</a>
    <a class="button no" href="index.php?page=7&sub=1&action=4&artifact_id=<?= $artifact['id']; ?>">No</a>
</section>