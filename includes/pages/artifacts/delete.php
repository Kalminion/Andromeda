<div class="title">
    Delete <?= $artifact['name']; ?>
</div> <!-- TITLE -->

<section>
    Do you want to delete "<?= $artifact['name']; ?>"?

    <a class="button yes" href="index.php?page=7&sub=1&delete=<?= $artifact['id']; ?>">Yes</a>
    <a class="button no" href="index.php?page=7&sub=1">No</a>
</section>