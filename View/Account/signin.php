<section class="bg-primary p-5">
    <div class="container bg-white border py-5 px-5 ms-rounded my-3">
        <h1>S'inscrire</h1>
        <hr>
        <form name="signin_form" method="POST" action="api/signin_store">
            <div class="form-floating mb-3">
                <input type="text" name="signin_username" id="signin_username" class="form-control" required>
                <label for="signin_username" class="form-label">Nom d'utilisateur</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="signin_mail" id="signin_email" class="form-control" required>
                <label for="signin_mail" class="form-label">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="signin_password" id="signin_password" class="form-control" required>
                <label for="signin_password" class="form-label">Mot de passe</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="signin_password_confirmation" id="signin_password_confirmation" class="form-control" required>
                <label for="signin_password_confirmation" class="form-label">Retapez votre mot de passe</label>
            </div>
            <button type="submit" name="login_send" class="btn btn-lg w-100 btn-primary">S'inscrire</button>
        </form>
    </div>
</section>