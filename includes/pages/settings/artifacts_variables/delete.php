<div class="title">
    Delete <?= $artifacts_variable['name']; ?> From <?= $artifact['name']; ?>
</div> <!-- TITLE -->

<section>
    Do you want to delete "<?= $artifacts_variable['name']; ?>" from <?= $artifact['name']; ?>?

    <a class="button yes" href="index.php?page=7&sub=1&action=8&artifacts_id=<?= $artifact['id']; ?>&delete=<?= $artifacts_variable['id']; ?>">Yes</a>
    <a class="button no" href="index.php?page=7&sub=1&action=8&artifacts_id=<?= $artifact['id']; ?>">No</a>
</section>