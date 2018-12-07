<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
<?php
if (isset($_GET['category'])) {
    $post_category_name = $_GET['category'];
    // administrator mag alles zien van een categorie
    if (isset($_SESSION['username']) && is_admin($_SESSION['username'])) {
        $catSql = "SELECT p.post_id, p.post_title, p.post_author, p.post_date, p.post_image, p.post_content FROM post_category pc JOIN posts p ON pc.post_id = p.post_id JOIN categories c ON pc.cat_id = c.cat_d WHERE cat_title = ?";
        $stmt1 = mysqli_prepare($connection, $catSql);
    // bloglezer alleen de gesaniteerde berichten
    } else {
        $catSql2 = "SELECT p.post_id, p.post_title, p.post_author, p.post_date, p.post_image, p.post_content FROM post_category pc JOIN posts p ON pc.post_id = p.post_id JOIN categories c ON pc.cat_id = c.cat_d WHERE cat_title = ? AND post_status = ?";
        $stmt2 = mysqli_prepare($connection, $catSql2);
        $published = 'published';
    }
    if (isset($stmt1)) {
        mysqli_stmt_bind_param($stmt1, "s", $post_category_name);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
        $stmt = $stmt1;
    } else {
        mysqli_stmt_bind_param($stmt2, "ss", $post_category_name, $published);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
        $stmt = $stmt2;
    }
    // if(mysqli_stmt_num_rows($stmt) < 1) {
    // echo "<h1 class='text-center'>Geen bericht in deze categorie</h1>";
    // } else
    while (mysqli_stmt_fetch($stmt)) {
?>
        <h1 class="page-header">categorie pagina</h1>
        <h2><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h2>
        <p class="lead">door <a href="index.php"><?php echo $post_author ?></a></p>
        <p><i class="far fa-clock"></i> <?php echo $post_date ?></p>
        <hr>
        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
        <hr>
        <p><?php echo $post_content ?></p>
        <a class="btn btn-warning" href="#">Read More <i class="fas fa-angle-double-right"></i></a>
        <hr>
<?php }} else {
    header("Location: index.php");
}?>
            </div>
            <!-- zijmenu -->
            <?php include "includes/sidebar.php";?>
        </div>
        <hr>
<?php include "includes/footer.php";?>
