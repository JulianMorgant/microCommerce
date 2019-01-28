<a class="navbar-brand" href="index.php">Home</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php?page=products">Produits <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=quiz">Quiz</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=upload">Upload</a>
        </li>

        <!-- MENU ADMIN -->
        <?php if ((isset($_SESSION["user"])) && $_SESSION["user"]["account"] == "admin") { ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Admin Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?page=adminProduct">Admin Produit</a>
                    <a class="dropdown-item" href="index.php?page=tabledemultiplication.php&num=6">Ajout Client</a>
                    <a class="dropdown-item" href="index.php?page=tabledemultiplication.php&num=7">Ajout Admin</a>
                </div>
            </li>
        <?php } else { ?> <!-- MENU USER -->


            <li class="nav-item">
                <a class="nav-link" href="index.php?page=basket">Pannier</a>
            </li>

        <?php } ?>


        <li class="nav-item">
            <a class="nav-link" href="index.php?page=userAccount">Mon Compte</a>
        </li>







        <!-- CONNEXION OU DECO -->
        <?php if (isset($_SESSION["user"])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=deconnection">Deconnexion</a>
            </li>
            <li class="nav-item">
                <a class='nav-link'>
                    <?php
                    echo $_SESSION["user"]["account"]." : ". $_SESSION["user"]["pseudo"]??"" ?>
                </a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=login">Connexion</a>
            </li>
        <?php } ?>




    </ul>
</div>



