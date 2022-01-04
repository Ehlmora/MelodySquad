<section class="bg-primary p-5">
    <div class="container bg-white border py-4 px-5 ms-rounded my-3">
        <h1>Se connecter</h1>
        <hr>
        <form name="login_form" method="POST" action="api/connect">
            <div class="form-floating mb-3">
                <input type="email" name="login_mail" id="login_mail" class="form-control" required>
                <label for="login_mail" class="form-label">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="login_password" id="login_password" class="form-control" required>
                <label for="login_password" class="form-label">Mot de passe</label>
            </div>
            <button type="submit" name="login_send" class="btn btn-lg btn-primary w-100">Se connecter</button>
        </form>
    </div>
</section>