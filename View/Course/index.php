<section class="container bg-white border py-4 px-5 ms-rounded mt-3">
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
        <?php for($i = 0; $i < 11; ++$i) { ?>
            <a href="#" class="card text-decoration-none link-dark mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/Public/img/course_card_default.jpg" class="img-fluid ms-rounded">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100">
                            <h5 card="card-title">Apprendre l'égalisation</h5>
                            <p class="card-category">Mix & Mastering</p>
                            <p class="text-nowrap text-truncate h-100">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lorem tortor, porttitor et ipsum vitae, convallis ornare lorem. Ut iaculis, nunc in ullamcorper ullamcorper, nisi risus rhoncus leo, a congue eros metus non lorem. Duis vehicula cursus urna sit amet ullamcorper. Aenean semper ac diam in rhoncus. Nulla id nibh a risus luctus dictum. Fusce ac diam a justo malesuada pretium quis nec tortor. Praesent sit amet semper purus. Nunc pellentesque pellentesque nisi, feugiat pellentesque nulla fermentum vitae. Mauris mauris magna, efficitur pellentesque dui sit amet, vestibulum consectetur augue. Praesent venenatis leo sit amet nisl consequat blandit. Pellentesque erat ante, pharetra id eros a, iaculis eleifend nisl. Curabitur commodo sodales quam eget tincidunt. Donec facilisis dolor at dui hendrerit posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.

                                Mauris tincidunt, nisi nec aliquet ornare, turpis tortor elementum urna, eget pretium leo lectus eu mi. Vestibulum id imperdiet purus. Aenean tincidunt nisi vitae nisi elementum mollis. Nam a ex venenatis, rhoncus sem eu, mollis nulla. Donec diam mauris, cursus sed ultricies eu, accumsan at dolor. Nunc porttitor augue vitae est auctor, eu consectetur tellus placerat. Ut dolor diam, mattis in erat a, tempus gravida massa. Praesent scelerisque tellus vel purus dignissim, ut lacinia libero lacinia. Integer dictum, libero quis blandit blandit, nisl sapien eleifend nisi, nec laoreet dui ligula vel turpis.

                                Etiam odio nibh, laoreet ut massa sed, blandit elementum nisl. Maecenas a augue commodo, varius lacus at, accumsan est. Curabitur scelerisque ligula non lacus ullamcorper volutpat. Aenean lobortis purus nec volutpat molestie. Vestibulum tincidunt placerat semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed lacinia laoreet rutrum.

                                Integer elementum, lectus ac accumsan molestie, odio tellus vehicula sapien, eu luctus nulla lectus non erat. Vestibulum ullamcorper eleifend justo id blandit. Quisque ac lorem in massa hendrerit aliquam. Aenean in lorem vel massa finibus fermentum. Aliquam nisl metus, dapibus et placerat nec, sollicitudin maximus mi. Sed ac scelerisque orci, at vehicula nulla. Proin scelerisque eros at nibh vehicula tincidunt. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean sit amet venenatis odio. Nunc posuere nunc sed quam vehicula, eget venenatis augue imperdiet. Sed rutrum, mi facilisis euismod tincidunt, nunc justo elementum erat, maximus commodo nisi libero nec leo. Morbi eu ante quis ex molestie ornare. Aenean cursus eros nec libero ultrices, vel congue lorem cursus. In finibus tincidunt enim, in vestibulum diam semper nec. Vivamus sit amet mauris nulla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</section>