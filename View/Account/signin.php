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
    let form = {
        id: document.getElementById("signin_form"),
        fields: {
            username: document.getElementById("signin_username"),
            mail: document.getElementById("signin_mail"),
            password: document.getElementById("signin_password"),
            passwordConfirmation: document.getElementById("signin_password_confirmation")
        },
        feedbacks: {
            username: document.getElementById("signin_username_feedback"),
            mail: document.getElementById("signin_mail_feedback"),
            password: document.getElementById("signin_password_feedback"),
            passwordConfirmation: document.getElementById("signin_password_confirmation_feedback")
        }
    };

    function usernameValidator() {

        let regex = /(?!.*[\.\-\_]{2,})^[a-zA-Z0-9\.\-\_]{3,24}$/gm;
        let field = form.fields.username;
        let feedback = form.feedbacks.username;
        let isValid = regex.test(field.value);

        field.classList.toggle("is-valid", isValid);
        field.classList.toggle("is-invalid", !isValid);

        feedback.classList.toggle("valid-feedback", isValid);
        feedback.classList.toggle("invalid-feedback", !isValid);

        feedback.innerText =
            isValid ?
            "C'est bon !" :
            "Doit avoir une longueur de 3 à 24 caractères. Peut contenir : lettres, nombres, caractères spéciaux (._-).";

        return isValid;
    }

    function mailValidator() {

        let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        let field = form.fields.mail;
        let feedback = form.feedbacks.mail;
        let isValid = regex.test(field.value);

        field.classList.toggle("is-valid", isValid);
        field.classList.toggle("is-invalid", !isValid);

        feedback.classList.toggle("valid-feedback", isValid);
        feedback.classList.toggle("invalid-feedback", !isValid);

        feedback.innerText =
            isValid ?
            "C'est bon !" :
            "Doit avoir le format : nom@exemple.fr";

        return isValid;
    }

    function passwordValidator() {

        let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm;
        let field = form.fields.password;
        let feedback = form.feedbacks.password;
        let isValid = regex.test(field.value);

        field.classList.toggle("is-valid", isValid);
        field.classList.toggle("is-invalid", !isValid);

        feedback.classList.toggle("valid-feedback", isValid);
        feedback.classList.toggle("invalid-feedback", !isValid);

        feedback.innerText =
            isValid ?
            "C'est bon !" :
            "Doit avoir au moins 8 caractères. Doit contenir au moins 1 lettre majuscule, 1 lettre minuscule et 1 nombre. Peut contenir des caractères spéciaux.";

        passwordConfirmationValidator();

        return isValid;
    }

    function passwordConfirmationValidator() {

        let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm;
        let field = form.fields.passwordConfirmation;
        let feedback = form.feedbacks.passwordConfirmation;
        let isValid = form.fields.password.value == field.value && regex.test(field.value);

        field.classList.toggle("is-valid", isValid);
        field.classList.toggle("is-invalid", !isValid);

        feedback.classList.toggle("valid-feedback", isValid);
        feedback.classList.toggle("invalid-feedback", !isValid);

        feedback.innerText =
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
    }

</script>