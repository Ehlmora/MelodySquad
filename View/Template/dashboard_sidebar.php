<nav class="d-flex flex-column flex-shrink-0 bg-white border ms-rounded m-3 px-3 py-5 position-sticky">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="courses-taken" class="nav-link <?php echo ROUTE[0] == "courses-taken" ? "active" : ""; ?>">Cours suivis</a>
        </li>
        <li class="nav-item">
            <a href="my-writing" class="nav-link <?php echo ROUTE[0] == "my-writing" ? "active" : ""; ?>">Mes rédactions</a>
        </li>
        <li class="nav-item">
            <a href="formations-management" class="nav-link <?php echo ROUTE[0] == "formations-management" ? "active" : ""; ?>">Gestion des formations</a>
        </li>
        <li class="accounts-management">
            <a href="#" class="nav-link <?php echo ROUTE[0] == "accounts-management" ? "active" : ""; ?>">Gestion des comptes</a>
        </li>
    </ul>
</nav>