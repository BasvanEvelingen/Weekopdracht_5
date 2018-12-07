<?php
include "includes/db.php";
include "includes/header.php";
?>
<?php
if (isset($_POST['submit'])) {
    $to = "basvanevelingen@me.com";
    $subject = $_POST['subject'];
    $body = $_POST['body'];
}
?>
<?php include "includes/navigation.php"; ?>
    <div class="container">
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                        <h1>Contact</h1>
                            <form role="form" action="" method="post" id="login-form" autocomplete="off">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="sr-only">Onderwerp</label>
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                                </div>
                                <div class="form-group">
                                <textarea class="form-control" name="body" id="body" cols="50" rows="10"></textarea>
                                </div>
                                <input type="submit" name="submit" id="btn-login" class="btn btn-success" value="Submit">
                            </form>
                        </div>
                    </div> 
                </div> 
            </div> 
</section>
        <hr>
<?php include "includes/footer.php";?>
