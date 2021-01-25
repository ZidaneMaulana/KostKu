<?php
    include_once 'crud.php';

    if (isset($_POST['klik'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ( !empty($username) && !empty($password)) {
            login($username, $password);
        } else{
            echo '<script>alert("Di isi dulu boss");</script>';    
        }
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Login</title>
    <style>
        .container{
            width: 400px;    
        }
    </style>
</head>
<body>
    <form action="" method="post" class="container mt-5">
        <h3 class="text-center">Login</h3>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input your Username">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Input your Password">
        </div>
        <button name="klik" type="submit" class="btn btn-primary">Login</button>
    </form>
   
</body>
</html>