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
            <a href="#" class="btn btn-primary mx-2">Modifier</a>
            <a href="#" class="link-danger mx-2">Supprimer mon compte</a>
        </div>
    </section>
</div>
