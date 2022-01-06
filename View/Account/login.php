<section class="bg-primary p-5">
    <div class="container bg-white border py-4 px-5 ms-rounded my-3">
        <h1>Se connecter</h1>
        <hr>
        <form name="login_form" id="login_form" method="POST" action="api/connect">
            <div class="form-floating mb-3">
                <input type="email" name="login_mail" id="login_mail" class="form-control" placeholder="name@example.fr" required>
                <label for="login_mail" class="form-label">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="login_password" id="login_password" class="form-control" placeholder="Mot de passe" required>
                <label for="login_password" class="form-label">Mot de passe</label>
            </div>
        </form>
        <button type="button" name="login_send" class="btn btn-lg btn-primary w-100" onclick="connect()">Se connecter</button>
    </div>
</section>

<script>

    let form = document.getElementById("login_form");
    let mail = document.getElementById("login_mail");
    let password = document.getElementById("login_password");

    function connect() {

        $.ajax({
            method: "POST",
            url: "api/connect",
            dataType: "json",
            data: {
                login_mail: mail.value,
                login_password: password.value,
                permission: "api"
            },
            success: function(response) {

                if(response.success) window.location.replace("/");
                else {
                    let error = document.createElement("div");
                    error.id = "login_error";
                    error.classList.add("alert", response.success ? "alert-success" : "alert-danger", "alert-dismissible", "fade", "show");
                    error.innerText = response.data;
                    error.innerHTML += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    if(document.getElementById("login_error") != null) form.removeChild(error);
                    form.appendChild(error);
                }
            }
        });
    }
</script>