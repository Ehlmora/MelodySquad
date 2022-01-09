<section class="container bg-white border py-4 px-5 ms-rounded my-3">
    <h1><?= $course->getTitle(); ?></h1>
    <p><?= $course->getDescription(); ?></p>
    <h2>Parties :</h2>
    <ul>
        <?php foreach($course->getParts() as $part) { ?>
            <li><a href="#"><?= $part->getTitle(); ?></a></li>
        <?php } ?>
    </ul>
</section>