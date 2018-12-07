    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigatie</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand animated tada anim_timing" href="../../index.php">Bas Blog</a>
            </div>
            <ul class="nav navbar-right top-nav">
              <!--   <li><a href="">Gebruikers Online: <?php //echo users_online(); ?></a></li> -->
                <li><a href="">Gebruikers Online: <span class="usersonline"></span></a></li>
               <li><a href="../index.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
<?php
if(isset($_SESSION['username'])) {
    echo $_SESSION['username'];
}
?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profiel</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Top menu administratie  -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="../posts.php"> Alle Berichten</a>
                            </li>
                            <li>
                                <a href="../posts.php?source=add_post">Berichten Toevoegen</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../categories.php"><i class="fa fa-fw fa-wrench"></i> Categorieën</a>
                    </li>
                    <li class="">
                        <a href="../comments.php"><i class="fa fa-fw fa-file"></i> Commentaar</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="../users.php">Alle gebruikers bekijken</a>
                            </li>
                            <li>
                                <a href="../users.php?source=add_user">Voeg gebruiker toe</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
        </nav>
