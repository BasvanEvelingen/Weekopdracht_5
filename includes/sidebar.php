            <!-- Zijmenu -->
            <div class="col-md-4">
                <!-- zoek menu -->
                <div class="well">
                    <h4>Blog Zoeken</h4>
                    <form action="../search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default animated bounceIn" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>
                    </div>
                    </form>
                    
                </div>
                <!-- login menu -->
                <div class="well">
<?php if(isset($_SESSION['user_role'])): ?>
                    <h4>Ingelogd als <?php echo $_SESSION['username'] ?></h4>
                    <a href="logout.php" class="btn btn-warning">Logout</a>
<?php else: ?>
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="gebruikersnaam">
                        </div>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="wachtwoord">
                            <span class="input-group-btn">
                                <button class="btn btn-success animated bounceIn" name="login" type="submit">log in</button>
                            </span>
                        </div>
                    </form>
<?php endif; ?>
                </div>
                <!-- categorie menu -->
                <div class="well">
<?php 
$query = "SELECT * FROM categories";
$select_categories_sidebar = mysqli_query($connection,$query);         
?>
                 <h4>Blog Categorieën</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                              <?php 
while($row = mysqli_fetch_assoc($select_categories_sidebar )) {
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];
                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
}
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
