<?php
    include_once '../config.php';
    include_once '../crud.php';


    $data = [];
    if(isset($_GET['id'])){
        $data = getdatabyid($_GET['id']);

    }

    if (isset($_POST['klik'])) {
        $nama_kost  = $_POST['nama_kost'];
        $harga      = $_POST['harga'];
        $desc       = $_POST['desc'];
        $id         = $_GET['id'];

        if ( !empty($nama_kost) && !empty($harga) && !empty($desc) ) {
            $result = updatedata($nama_kost, $harga, $desc, $id);
    
            if($result){
                echo "<script>alert('BERHASIL UPDATE');</script>";
                header('Location: ../index.php');
            }
        } else{
            echo 'ISI SEMUA';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Register</title>
    <style>
        .container{
            width: 400px;    
        }
    </style>
</head>
<body>
    <form action="" method="post" class="container mt-5">
        <h3 class="text-center">Update</h3>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input name="nama_kost" type="text" class="form-control" id="exampleFormControlInput1" value="<?= $data['nama_kost'] ?>" placeholder="Nama Kost">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control" id="exampleFormControlInput1" value="<?= $data['harga'] ?>" placeholder="Harga">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea name="desc" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Deskripsi"><?= $data['deskripsi'] ?></textarea>
        </div>
        <button name="klik" type="submit" class="btn btn-primary">Update</button>
        
    </form>
   
</body>
</html>