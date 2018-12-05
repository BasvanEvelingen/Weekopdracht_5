<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
<?php
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
    $search_query = mysqli_query($connection, $query);
    if (!$search_query) {
        die("Query mislukt." . mysqli_error($connection));
    }
    $count = mysqli_num_rows($search_query);
    if ($count == 0) {
        echo "<h4>Geen resultaat</h4>";
    } else {
        while ($row = mysqli_fetch_assoc($search_query)) {
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            ?>
                <h1 class="page-header">Blog Bericht</h1>
                <h2><a href="#"><?php echo $post_title ?></a></h2>
                <p class="lead">door <a href="index.php"><?php echo $post_author ?></a></p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-success" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
<?php   }
    }
}
?>
            </div>
            <!-- zijmenu -->
            <?php include "includes/sidebar.php";?>
        </div>
        <hr>
<?php include "includes/footer.php";?>
