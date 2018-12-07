<?php
   if(isset($_POST['create_user'])) {
            $user_firstname    = escape($_POST['user_firstname']);
            $user_lastname     = escape($_POST['user_lastname']);
            $user_role         = escape($_POST['user_role']);
            $username          = escape($_POST['username']);
            $user_email        = escape($_POST['user_email']);
            $user_password     = escape($_POST['user_password']);
            $user_password = password_hash($user_password,PASSWORD_DEFAULT); 
            $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
            $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}') "; 
            $create_user_query = mysqli_query($connection, $query);  
            confirmQuery($create_user_query); 
                 echo "Gebruiker aangemaakt: " . " " . "<a href='../users.php'>View Users</a> ";
   }
?>
    <form action="" method="post" enctype="multipart/form-data">    
      <div class="form-group">
         <label for="title">Voornaam</label>
          <input type="text" class="form-control" name="user_firstname">
      </div>
       <div class="form-group">
         <label for="post_status">Achternaam</label>
          <input type="text" class="form-control" name="user_lastname">
      </div>
         <div class="form-group">
       <select name="user_role" id="">
        <option value="blogger">Opties</option>
          <option value="admin">Admin</option>
          <option value="blogger">Blogger</option>
       </select>
      </div>
<!--
      <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>
-->
      <div class="form-group">
         <label>Gebruikersnaam</label>
          <input type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
         <label>Email</label>
          <input type="email" class="form-control" name="user_email">
      </div>
      <div class="form-group">
         <label>Wachtwoord</label>
          <input type="password" class="form-control" name="user_password">
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Voeg gebruiker toe">
      </div>
</form>
