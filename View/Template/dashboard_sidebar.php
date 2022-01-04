<nav class="d-flex flex-column flex-shrink-0 bg-white border ms-rounded m-3 px-3 py-5 position-sticky">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="courses-taken" class="nav-link <?php echo ROUTE[1] == "courses-taken" ? "active" : ""; ?>">Cours suivis</a>
        </li>
        <li class="nav-item">
            <a href="courses" class="nav-link <?php echo ROUTE[1] == "courses" ? "active" : ""; ?>">Mes rédactions</a>
        </li>
        <li class="nav-item">
            <a href="formations" class="nav-link <?php echo ROUTE[1] == "formations" ? "active" : ""; ?>">Gestion des formations</a>
        </li>
        <li class="nav-item">
            <a href="accounts" class="nav-link <?php echo ROUTE[1] == "accounts" ? "active" : ""; ?>">Gestion des comptes</a>
        </li>
    </ul>
</nav>