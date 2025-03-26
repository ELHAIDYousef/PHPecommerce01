
<!-- includes/nav.php -->

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <!-- Brand Name -->
        <a class="navbar-brand fw-bold" href="/Php_Storm/ecommerce/connection.php">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navigation Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Php_Storm/ecommerce/index.php">Ajouter utilisateur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produit</a>
                </li>
            </ul>
            <!-- Search Form -->
<!--            <form class="d-flex">-->
<!--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                <button class="btn btn-outline-success" type="submit">Search</button>-->
<!--            </form>-->
            <div class="dropdown">
                <button class="btn btn-danger ms-2 dropdown-toggle" type="button"data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['Utilisateur']['login']?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>

        </div>
    </div>
</nav>

