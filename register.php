<?php


// connect to the database
$db = mysqli_connect('bijnaojmpbrxdjfmlfxh-mysql.services.clever-cloud.com', 'uzpubmigxvrypm1f', '7ZB8vkdvYWW9JjQd0gTV', 'bijnaojmpbrxdjfmlfxh');

// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);

  


  // Finally, register user if there are no errors in the form

    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO farmers (name, email, password,phone) 
          VALUES('$name', '$email', '$password','$phone')";
    mysqli_query($db, $query);
    echo "User added!!!";
    echo '<script type="text/javascript">';
    echo 'window.location.href="login.html";';
    echo '</script>';
  
}
?>