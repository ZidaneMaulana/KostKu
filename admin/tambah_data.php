<?php
    include_once '../config.php';
    include_once '../crud.php';

    if (isset($_POST['klik'])) {
        $nama_kost   = $_POST['nama_kost'];
        $harga       = $_POST['harga'];
        $deskripsi   = $_POST['deskripsi'];
        $foto        = $_FILES['foto']['name'];
        $ext_foto    = pathinfo($foto, PATHINFO_EXTENSION);
        $exp_foto    = explode('.', $foto);
        $rw_foto     = time().$exp_foto[0].'.'.$ext_foto;
        $tmp_foto    = $_FILES['foto']['tmp_name'];
        $size_foto   = $_FILES['foto']['size'];

        if ( !empty($nama_kost) && !empty($harga) && !empty($deskripsi) && !empty($foto) ) {

            if($size_foto <= 2000000){
                if(move_uploaded_file($tmp_foto, '../assets/img/users/'.$rw_foto)){
                    tambahdata($nama_kost, $harga, $deskripsi, $rw_foto);
                    header('location: index.php');
                }
            }else{
                echo 'Ukuran Gambar Terlalu Besar!';
            }

        } else{
            echo 'di isi dulu boss';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Tambah Data</title>
    <style>
        .container{
            width: 400px;    
        }
    </style>
</head>
<body>
    <form action="" method="post" class="container mt-5" enctype="multipart/form-data">
        <h3 class="text-center">Tambah Data Kost</h3>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kost</label>
            <input name="nama_kost" type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Nama Kost">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Harga">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="exampleFormControlInput1" autocomplete="off" placeholder="Deskripsi">
        </div>
        <div class="form-group mb-3">
				<label>Foto :</label>
				<input type="file" name="foto" required="required">
			</div>
        <button name="klik" type="submit" class="btn btn-primary">Tambah Data</button>
        
    </form>
   
</body>
</html>