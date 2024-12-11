<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   $admin_code = mysqli_real_escape_string($conn, $_POST['admin_code']);

   // Define the correct admin code
   $correct_admin_code = '2001033';

   $select = "SELECT * FROM users WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $message[] = 'User already exists!';

   }else{

      if($pass != $cpass){
         $message[] = 'Passwords do not match!';
      }else{
         if($user_type == 'admin' && $admin_code != $correct_admin_code){
            $message[] = 'Invalid admin code!';
         }else{
            $insert = "INSERT INTO users(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')";
            mysqli_query($conn, $insert);
            $message[] = 'Registered successfully!';
            header('location:login_form.php');
         }
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible="IE=edge>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">

</head>
<body>

<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="enter your name" required class="box">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
      <select name="user_type" required class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <!-- Add admin code input field -->
      <input type="text" name="admin_code" placeholder="enter admin code " class="box" id="admin-code-field" style="display: none;">
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

<script>
   // Show the admin code field when 'admin' is selected
   const userTypeSelect = document.querySelector('select[name="user_type"]');
   const adminCodeField = document.getElementById('admin-code-field');

   userTypeSelect.addEventListener('change', function() {
      if (this.value === 'admin') {
         adminCodeField.style.display = 'block';
         adminCodeField.required = true;
      } else {
         adminCodeField.style.display = 'none';
         adminCodeField.required = false;
      }
   });
</script>

</body>
</html>
