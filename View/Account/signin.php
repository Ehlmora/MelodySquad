<section class="bg-primary p-5">
    <div class="container bg-white border py-5 px-5 ms-rounded my-3">
        <h1>S'inscrire</h1>
        <hr>
        <form name="signin_form" id="signin_form">
            <div class="form-floating mb-3">
                <input type="text" name="signin_username" id="signin_username" class="form-control" placeholder="name@example.fr" oninput="usernameValidator()" required>
                <label for="signin_username" class="form-label">Nom d'utilisateur</label>
                <div id="signin_username_feedback"></div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="signin_mail" id="signin_mail" class="form-control" placeholder="Username" oninput="mailValidator()" required>
                <label for="signin_mail" class="form-label">E-mail</label>
                <div id="signin_mail_feedback"></div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="signin_password" id="signin_password" class="form-control" placeholder="Password" oninput="passwordValidator()" required>
                <label for="signin_password" class="form-label">Mot de passe</label>
                <div id="signin_password_feedback"></div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="signin_password_confirmation" id="signin_password_confirmation" placeholder="Password Confirmation" class="form-control" oninput="passwordConfirmationValidator()" required>
                <label for="signin_password_confirmation" class="form-label">Retapez votre mot de passe</label>
                <div id="signin_password_confirmation_feedback"></div>
            </div>
        </form>
        <button type="button" name="login_send" class="btn btn-lg w-100 btn-primary" onclick="store()">S'inscrire</button>
    </div>
</section>

<script>
    // Form
    let form = document.getElementById("signin_form");

    // Fields
    let usernameField = document.getElementById("signin_username");
    let mailField = document.getElementById("signin_mail");
    let passwordField = document.getElementById("signin_password");
    let passwordConfirmationField = document.getElementById("signin_password_confirmation");

    // Feedbacks
    let usernameFeedback = document.getElementById("signin_username_feedback");
    let mailFeedback = document.getElementById("signin_mail_feedback");
    let passwordFeedback = document.getElementById("signin_password_feedback");
    let passwordConfirmationFeedback = document.getElementById("signin_password_confirmation_feedback");

    function usernameValidator() {

        let regex = /(?!.*[\.\-\_]{2,})^[a-zA-Z0-9\.\-\_]{3,24}$/gm;
        let username = usernameField.value;
        let isValid = regex.test(username);

        usernameField.classList.toggle("is-valid", isValid);
        usernameField.classList.toggle("is-invalid", !isValid);

        usernameFeedback.classList.toggle("valid-feedback", isValid);
        usernameFeedback.classList.toggle("invalid-feedback", !isValid);

        usernameFeedback.innerText =
            isValid ?
            "C'est bon !" :
            "Doit avoir une longueur de 3 à 24 caractères. Peut contenir : lettres, nombres, caractères spéciaux (._-).";

        return isValid;
    }

    function mailValidator() {

        let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        let mail = mailField.value;
        let isValid = regex.test(mail);

        mailField.classList.toggle("is-valid", isValid);
        mailField.classList.toggle("is-invalid", !isValid);

        mailFeedback.classList.toggle("valid-feedback", isValid);
        mailFeedback.classList.toggle("invalid-feedback", !isValid);

        mailFeedback.innerText =
            isValid ?
            "C'est bon !" :
            "Doit avoir le format : nom@exemple.fr";

        return isValid;
    }

    function passwordValidator() {

        let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm;
        let password = passwordField.value;
        let isValid = regex.test(password);

        passwordField.classList.toggle("is-valid", isValid);
        passwordField.classList.toggle("is-invalid", !isValid);

        passwordFeedback.classList.toggle("valid-feedback", isValid);
        passwordFeedback.classList.toggle("invalid-feedback", !isValid);

        passwordFeedback.innerText =
            isValid ?
            "C'est bon !" :
            "Doit avoir au moins 8 caractères. Doit contenir au moins 1 lettre majuscule, 1 lettre minuscule et 1 nombre. Peut contenir des caractères spéciaux.";

        passwordConfirmationValidator();

        return isValid;
    }

    function passwordConfirmationValidator() {

        let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm;
        let isValid = passwordField.value == passwordConfirmationField.value && regex.test(passwordConfirmationField.value);

        passwordConfirmationField.classList.toggle("is-valid", isValid);
        passwordConfirmationField.classList.toggle("is-invalid", !isValid);

        passwordConfirmationFeedback.classList.toggle("valid-feedback", isValid);
        passwordConfirmationFeedback.classList.toggle("invalid-feedback", !isValid);

        passwordConfirmationFeedback.innerText =
            isValid ?
            "C'est bon !" :
            "Les mots de passe sont différents.";

        return isValid;
    }

    function store() {

        if(usernameValidator() && mailValidator() && passwordValidator() && passwordConfirmationValidator()) {

            $.ajax({
                method: "POST",
                url: "api/signin",
                dataType: "json",
                data: {
                    signin_username: usernameField.value,
                    signin_mail: mailField.value,
                    signin_password: passwordField.value,
                    signin_password_confirmation: passwordConfirmationField.value,
                    permission: "api"
                },
                success: function (response) {


                    if (response.success) window.location.replace("/");
                    else {
                        let error = document.createElement("div");
                        error.id = "signin_error";
                        error.classList.add("alert", response.success ? "alert-success" : "alert-danger", "alert-dismissible", "fade", "show");
                        error.innerText = response.data;
                        error.innerHTML += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        if (document.getElementById("signin_error") != null) form.removeChild(error);
                        form.appendChild(error);
                    }
                }
            });
        }

    }

</script>