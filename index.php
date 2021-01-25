<?php
    include_once "crud.php";

    $show = showdata();
    
    if(isset($_GET['delete'])){
        $result = deletedata($_GET['delete']);

        if($result){
            header('Refresh:0; url=index.php');
        }
    }

    include_once './template/navbar.php';

?>

    <div class="container">
    <h3 class="text-center m-4">Dashboard</h3>
        <a href="admin/tambah_data.php" class="btn btn-primary float-end m-1">Tambah Data</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Nama Kost</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
            </thead>
            <tbody>
                <?php $no = 0; ?>
                <?php
                    foreach ($show as $i => $val) {                        
                        print_r($val);
                    }
                    $no++;
                ?>
                <?php $no = 1; ?>
                <?php for ($i=0; $i < count($show) ; $i++){ ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="assets/img/users/<?= $show[$i]['gambar'] ?>" alt=""></td>
                    <td><?php echo $show[$i]['nama_kost']; ?></td>
                    <td><?php echo $show[$i]['harga']; ?></td>
                    <td><?php echo $show[$i]['deskripsi']; ?></td>
                    <td class="icon">
                        <a href="admin/update.php?id=<?= $show[$i]['id'] ?>"><i class="fas fa-edit"></i></a>
                        <a href="?delete=<?= $show[$i]['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>