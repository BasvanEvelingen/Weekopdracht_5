<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">
        <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Welkom in uw blogmenu
                            <small> <?php 
                            if(isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                            }
                            // definieer meer rollen?
                            // if(is_admin($_SESSION['username'])){
                            //     echo " -- ook admin";
                            // } else {
                            //     echo " -- geen admin ";
                            // }
                            ?></small>
                        </h3>
                    </div>
                </div>

                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="far fa-file-alt fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <?php 
                        $query = "SELECT * FROM posts";
                        $select_all_post = mysqli_query($connection,$query);
                        $post_count = mysqli_num_rows($select_all_post);
                      echo  "<div class='huge'>{$post_count}</div>"
                        ?>
                        <div>Berichten</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">Bekijk Details</span>
                    <span class="pull-right"><i class="fas fa-angle-double-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="far fa-comment-dots fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      <?php 
                                    $query = "SELECT * FROM comments";
                                    $select_all_comments = mysqli_query($connection,$query);
                                    $comment_count = mysqli_num_rows( $select_all_comments);
                                  echo  "<div class='huge'>{$comment_count}</div>"
                                    ?>
                                      <div>Commentaar</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Bekijk Details</span>
                                    <span class="pull-right"><i class="fas fa-angle-double-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="far fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       <?php 
                                        $query = "SELECT * FROM users";
                                        $select_all_users = mysqli_query($connection,$query);
                                        $user_count = mysqli_num_rows($select_all_users);
                                        echo "<div class='huge'>{$user_count}</div>"
                                        ?>
                                        <div> Gebruikers</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Bekijk Details</span>
                                    <span class="pull-right"><i class="fas fa-angle-double-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="far fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <?php 
                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($connection,$query);
                                    $category_count = mysqli_num_rows($select_all_categories);
                                  echo  "<div class='huge'>{$category_count}</div>"
                                    ?>
                                   <div>Categorieën</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Bekijk Details</span>
                                    <span class="pull-right"><i class="fas fa-angle-double-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

    <?php 
 $query = "SELECT * FROM posts WHERE post_status = 'published' ";
$select_all_published_posts = mysqli_query($connection,$query);
$post_published_count = mysqli_num_rows($select_all_published_posts);
$query = "SELECT * FROM posts WHERE post_status = 'draft' ";
$select_all_draft_posts = mysqli_query($connection,$query);
$post_draft_count = mysqli_num_rows($select_all_draft_posts);
$query = "SELECT * FROM comments WHERE comment_status = 'rejected' ";
$rejected_comments_query = mysqli_query($connection,$query);
$rejected_comment_count = mysqli_num_rows($rejected_comments_query);
$query = "SELECT * FROM users WHERE user_role = 'blogger'";
$select_all_bloggers = mysqli_query($connection,$query);
$blogger_count = mysqli_num_rows($select_all_bloggers);
    ?>
                <div class="row">
                    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            <?php
    $element_text = ['All Posts','Active Posts','Draft Posts', 'Comments','Pending Comments', 'Users','Bloggers', 'Categories'];       
    $element_count = [$post_count,$post_published_count, $post_draft_count, $comment_count,$rejected_comment_count, $user_count,$blogger_count,$category_count];
    for($i =0;$i < 8; $i++) {
        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
    }
            ?>
        ]);
        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, options);
      }
    </script>
  <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>
            </div>
        </div>
        
    <?php include "includes/admin_footer.php" ?>
