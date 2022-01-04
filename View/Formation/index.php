<section class="container bg-white border py-4 px-5 ms-rounded my-3">
    <h1>Nos formations</h1>
    <hr class="">
    <div class="row row-cols-2 row-cols-lg-3 g-4">
        <?php foreach($formations as $formation) { ?>
        <div class="col">
            <a href="#" class="card text-decoration-none link-dark h-auto">
                <img src="<?= $formation['pictureURL']; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 card="title"><?= $formation['title']; ?></h5>
                    <p class="card-category" style="color: #<?= $formation['color']; ?>"><?= $formation['category']; ?></p>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</section>