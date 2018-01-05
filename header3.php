<div class="bs-example">
    <nav role="navigation" class="navbar navbar-default" style="margin-bottom: 0px;">
        <!-- Brand and toggle get grouped for better mobile display -->


        <a href="index.php" class="logoMd"><img src="img/logo.png" class="logo"></a>
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="imgToggle1" href="index.php"><img  src="img/logo.png" class="logo"></a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse" aria-expanded="true">
            <ul class="nav navbar-nav">
                <!-- <li><a href="index.php"><img src="img/logo.png" class="logo"></a></li> -->

                <li><a href="index.php" style="padding: 0px;"><img src="img/logo.png" class="logo logo-sm-hidden"></a></li>
                <li><a href="oxProgramme.php">Programme</a></li>
                <li><a href="partenaires.php">Nos partenaires</a></li>
                <li><a href="blogGrossesse1.php?cat=8">Grossesse</a></li>
                <li><a href="blogGrossesse1.php?cat=6">Maman</a></li>
                <li><a href="blogGrossesse1.php?cat=7">Bébé</a></li>
                <li><a href="contact.php">Contactez-nous</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    if (isset($_SESSION['nom'])) {
                        echo "<a href=\"user/logout.php\">Déconnexion</a>";
                    } else {
                        echo '<a href="login.php">S\'identifier</a>';
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['nom'])) {
                        echo '<a href="espace.php" style="padding: 10px 0px;">Bienvenue ' . $_SESSION["nom"] . ',</a>';
                    } else {
                        echo '<a href="register.php">S\'inscrire</a>';
                    }

                    ?>
                </li>


            </ul>

        </div>
    </nav>
</div>
