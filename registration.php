<?php
include "includes/db.php";
include "includes/header.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $error = [
        'username' => '',
        'email' => '',
        'password' => '',
    ];
    if (strlen($username) < 4) {
        $error['username'] = 'Gebruikersnaam dient langer te zijn dan 4 tekens.';
    }
    if ($username == '') {
        $error['username'] = 'Gebruikersnaam mag niet leeg zijn.';
    }
    if (username_exists($username)) {
        $error['username'] = 'Gebruikersnaam bestaat al, kies alstublieft een andere naam.';
    }
    if ($email == '') {
        $error['email'] = 'Email cannot be empty';
    }
    if (email_exists($email)) {
        $error['email'] = 'Email already exists, <a href="index.php">Please login</a>';
    }
    if ($password == '') {
        $error['password'] = 'Password cannot be empty';
    }
    foreach ($error as $key => $value) {
        if (empty($value)) {
            unset($error[$key]);
        }
    } // foreach
    if (empty($error)) {
        register_user($username, $email, $password);
        login_user($username, $password);
    }
}
include "includes/navigation.php";
?>
    <!-- Registratie formulier -->
    <div class="container">
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                        <h1>Register</h1>
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username"
                                    autocomplete="on"
                                    value="<?php echo isset($username) ? $username : '' ?>">
                                    <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>" >
                                    <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                    <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                                </div>
                                <input type="submit" name="resgister" id="btn-login" class="btn btn-success" value="Register">
                            </form>
                        </div>
                    </div> 
                </div> 
            </div> 
        </section>
        <hr>
<?php include "includes/footer.php";?>