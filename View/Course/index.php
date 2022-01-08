<section class="container bg-white border py-4 px-5 ms-rounded my-3">
    <div class="ms-rounded ms-gradient mb-3 d-flex flex-wrap align-items-center justify-content-between p-3 border-orange">
        <h1 class="col-12 col-md-auto me-lg-auto mb-2 justify-content-start mb-md-0 text-white">Cours</h1>
        <div class="row g-2">
            <div class="col">
                <div class="input-group">
                    <label class="input-group-text ms-rounded" for="select_category">Catégorie</label>
                    <select id="select_category" class="form-select ms-rounded" onchange="updateShownCourses()">
                        <option value="%" selected>Toutes</option>
                        <?php foreach($categories as $category) { ?>
                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <label class="input-group-text ms-rounded" for="select_difficulty">Difficulté</label>
                    <select id="select_difficulty" class="form-select ms-rounded" onchange="updateShownCourses()">
                        <option value="%" selected>Toutes</option>
                        <?php foreach($difficulties as $difficulty) { ?>
                            <option value="<?= $difficulty['id']; ?>"><?= $difficulty['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div id="courses_list" class="row-cols-1"></div>
</section>
<script>

    updateShownCourses();

    function updateShownCourses() {

        let categoryId = document.getElementById("select_category").value;
        let difficultyId = document.getElementById("select_difficulty").value;

        let coursesList = document.getElementById("courses_list");

        $.ajax({
            method: "POST",
            url: "api/filteredCourses",
            dataType: "json",
            data: {
                category: categoryId,
                difficulty: difficultyId,
                permission: "api"
            },
            success: function(response) {

                console.log(response.data);
                coursesList.innerText = "";
                response.data.forEach(course => {
                    let template = '' +
                        '<a href="/courses/' + course.slug + '" class="card text-decoration-none link-dark mb-3">' +
                            '<div class="row g-0">' +
                                '<div class="col-md-4">' +
                                '<img src="' + course.pictureURL + '" class="img-fluid ms-rounded">' +
                            '</div>' +
                            '<div class="col-md-8">' +
                                '<div class="card-body h-100">' +
                                    '<h5 card="card-title">' + course.title + '</h5>' +
                                    '<p class="card-category" style="color: #' + course.color + '">' + course.category + '</p>' +
                                    '<p class="text-nowrap text-truncate h-100">' + course.description + '</p>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</a>';

                    coursesList.innerHTML += template;
                });



            }
        });
    }
</script>