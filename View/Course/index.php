<section class="container bg-white border py-4 px-5 ms-rounded my-3">
    <div class="ms-rounded ms-gradient mb-3 d-flex flex-wrap align-items-center justify-content-between p-3 border-orange">
        <h1 class="col-12 col-md-auto me-lg-auto mb-2 justify-content-start mb-md-0 text-white">Cours</h1>
        <div class="row g-2">
            <div class="col">
                <select class="form-select ms-rounded">
                    <option selected>Catégorie</option>
                </select>
            </div>
            <div class="col">
                <select class="form-select ms-rounded">
                    <option selected>Difficulté</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row-cols-1">
        <?php foreach($courses as $course) { ?>
            <a href="#" class="card text-decoration-none link-dark mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $course['pictureURL']; ?>" class="img-fluid ms-rounded">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100">
                            <h5 card="card-title"><?= $course['title']; ?></h5>
                            <p class="card-category" style="color: #<?= $course['color']; ?>"><?= $course['category']; ?></p>
                            <p class="text-nowrap text-truncate h-100"><?= $course['description']; ?></p>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</section>