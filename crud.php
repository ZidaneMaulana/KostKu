<?php

include_once 'config.php';

function login($username, $password){
    global $conn;
    
    $result = mysqli_query($conn, 'SELECT username, password FROM `user` WHERE `username` = '.$username);
    $data = mysqli_fetch_assoc($result);

    print_r($data);
    if(password_verifY($password, $data['password'])){
        header('location: ./admin/index.php');
    }

}

function register($username, $email, $password){
    global $conn;
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "INSERT INTO `user` (username, email, password) VALUES ('$username', '$email', '$password') ");
    if($result) {
        header('location: admin/index.php');
    }
}

function tambahdata($nama_kost, $harga, $deskripsi, $rw_foto){
    global $conn; 

    $result = mysqli_query($conn, "INSERT INTO `kost` (nama_kost, harga, deskripsi, gambar) VALUES ('$nama_kost', '$harga', '$deskripsi', '$rw_foto')");
    return $result;
}

function showdata(){
    global $conn;

    $result = mysqli_query($conn, "SELECT * FROM `kost`");

    $cost = array();
    for (;$i = mysqli_fetch_assoc($result) ;) { 
        $cost[] = $i;
    } 
    return $cost;
}


function getdatabyid($id){
        global $conn;

    $query = mysqli_query($conn, "SELECT * FROM `kost` WHERE id=$id");
    $result = mysqli_fetch_assoc($query);
    return $result;
}

function updatedata($nama_kost, $harga, $desc, $id){
    global $conn;

    $result = mysqli_query($conn, "UPDATE `kost` SET nama_kost='$nama_kost', harga='$harga', deskripsi='$desc' WHERE id=$id");

    return $result;
}

function deletedata($id){
    global $conn;

    $result = mysqli_query($conn, "DELETE FROM `kost` WHERE id=$id");
    return $result;
}