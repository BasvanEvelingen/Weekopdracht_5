<?php include "includes/admin_header.php" ?>
<?php 
?>
    <div id="wrapper">
        <?php include "includes/admin_navigation.php" ?>
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Welkom in uw blogmenu
                <small><?php echo $_SESSION['username'] ?></small>
            </h1>
            <div class="col-xs-6">
            <?php insert_categories();  ?>
    <form action="" method="post">
      <div class="form-group">
         <label for="cat-title">Voeg Categorie Toe</label>
          <input type="text" class="form-control" name="cat_title">
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
      </div>
    </form>
    <?php 
    if(isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];
        include "includes/update_categories.php";
    }
    ?>
    </div>
            <div class="col-xs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Categorie Naam</th>
            </tr>
        </thead>
        <tbody>
        <?php 
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);  
    while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Verwijder</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Wijzig</a></td>";
    echo "</tr>";
    }
?>
        </tbody>
    </table>
                </div>        
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php 
deleteCategories();
 ?>
        <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php" ?>
