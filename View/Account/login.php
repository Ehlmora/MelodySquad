<section class="bg-primary p-5">
    <div class="container bg-white border py-4 px-5 ms-rounded my-3">
        <h1>Se connecter</h1>
        <hr>
        <form name="login_form" id="login_form" method="POST" action="api/connect">
            <div class="form-floating mb-3">
                <input type="email" name="login_mail" id="login_mail" class="form-control" required>
                <label for="login_mail" class="form-label">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="login_password" id="login_password" class="form-control" required>
                <label for="login_password" class="form-label">Mot de passe</label>
            </div>
        </form>
        <button type="button" name="login_send" class="btn btn-lg btn-primary w-100" onclick="connect()">Se connecter</button>
    </div>
</section>

<script>

    function connect() {

        let form = document.getElementById("login_form");
        let mail = document.getElementById("login_mail");
        let password = document.getElementById("login_password");

        let error = document.getElementById("error");

        $.ajax({
            method: "POST",
            url: "api/connect",
            dataType: "text",
            data: {
                login_mail: mail.value,
                login_password: password.value,
                permission: "api"
            },
            success: function(data) {

                if(data == true) window.location.replace("/");
                else {
                    let error = document.createElement("div");
                    error.classList.add("alert", "alert-danger");
                    error.innerText = "Combinaison adresse mail/mot de passe incorrect !";
                    form.appendChild(error);
                }
            }
        });
    }
</script>