<div class="d-flex flex-row">
    <div class="d-flex flex-column flex-shrink-0 bg-white border py-4 px-5 align-items-center text-center">
        <img src="<?= $user->getProfilePictureURL(); ?>" alt="Profile picture" width="150" height="150" class="img-thumbnail rounded-circle mb-2">
        <div class="mb-5">
            <p class="fw-bold"><?= $user->getUsername(); ?></p>
            <p class="text-muted"><?= $user->getRole()->getName(); ?></p>
        </div>
        <div class="mb-5">
            <p class="text-muted">Compte crée le: <?= $user->getCreatedAt(); ?></p>
            <p class="text-muted">Dernière connexion: <?= $user->getLastConnection(); ?></p>
        </div>
    </div>
    <section class="flex-fill bg-white py-4 px-5 border">
        <h1 class="mb-3">Votre profil</h1>
        <div class="row">
            <div class="col-6">
                <p class="fw-bold">Prénom</p>
                <p><?= StringManipulator::emptyAsSlash($user->getFirstname()); ?></p>
            </div>
            <div class="col-6">
                <p class="fw-bold">Nom</p>
                <p><?= StringManipulator::emptyAsSlash($user->getLastname()); ?></p>
            </div>
        </div>
        <div class="row">
            <p class="fw-bold">Date de naissance</p>
            <p><?= StringManipulator::emptyAsSlash($user->getBirthDate()); ?></p>
        </div>
        <div class="row">
            <p class="fw-bold">Adresse mail</p>
            <p><?= $user->getMail(); ?></p>
        </div>
        <div class="d-flex flex-row justify-content-center align-items-center">
            <a href="/profile/edit" class="btn btn-primary mx-2">Modifier</a>
            <a href="#" class="link-danger mx-2" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Supprimer mon compte</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Suppression du compte</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="deleteAccount()">Oui, adieu !</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    let modal = document.getElementById("deleteAccountModal");

    function deleteAccount() {

        $.ajax({
            method: "POST",
            url: "api/signin",
            dataType: "json",
            data: {
                username            : form.fields.username.value,
                mail                : form.fields.mail.value,
                password            : form.fields.password.value,
                passwordConfirmation: form.fields.passwordConfirmation.value,
                permission          : "api"
            },
            success: function (response) {
                if (response.success) window.location.replace("/");
                else {
                    if(typeof response.options.failedField !== undefined) {
                        let field       = form.fields[response.options.failedField];
                        let feedback    = form.feedbacks[response.options.failedField];

                        field.classList.replace("is-valid", "is-invalid");
                        feedback.classList.replace("valid-feedback", "invalid-feedback");
                        feedback.innerText = response.data;
                    }
                }
            }
        });

    }
</script>
