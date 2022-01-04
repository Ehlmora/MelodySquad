        </main>
        <footer class="container-fluid border-top bg-white">
            <div class="d-flex flex-wrap align-items-top justify-content-evenly py-3">
                <div>
                    <a href="/">
                        <img src="/Public/img/logo/logo_black.png" alt="MelodySquad Logo" width="250">
                    </a>
                    <hr class="footer-hr" size>
                    <p class="text-wrap" style="width: 250px">Site de formation musicale gratuit ! Théorie musicale, mixage, mastering, droit, production... Tout est là pour vous !</p>
                </div>
                <nav>
                    <h4>Plan</h4>
                    <hr class="footer-hr" size>
                    <ul class="list-unstyled">
                        <li><a href="/formations" class="ms-footer-link link-dark">Formations</a></li>
                        <li><a href="/courses" class="ms-footer-link link-dark">Cours</a></li>
                        <li><a href="/dashboard" class="ms-footer-link link-dark">Tableau de bord</a></li>
                        <?php if(isset($_SESSION['user'])) { ?>
                            <li><a href="/disconnect" class="ms-footer-link link-dark">Se déconnecter</a></li>
                        <?php } else { ?>
                            <li><a href="/connect" class="ms-footer-link link-dark">Se connecter</a></li>
                            <li><a href="/signin" class="ms-footer-link link-dark">S'inscrire</a></li>
                        <?php } ?>
                    </ul>
                </nav>
                <div>
                    <h4>Contact</h4>
                    <hr class="footer-hr" size>
                    <ul class="list-unstyled">
                        <li>L3 MIAGE</li>
                        <li>Programmation Web</li>
                        <li>Olivier Da Pozzo</li>
                        <li>Tanguy Goho</li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
</html>