<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
            $password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
            $nama_user = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));

            // perintah query untuk menyimpan data ke tabel user
            $query = mysqli_query($mysqli, "INSERT INTO user(username,password,nama_user)
                                            VALUES('$username','$password','$nama_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=user&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id_user   = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                $username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
                $password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
                $nama_user = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));

                // jika password tidak diubah
                if (empty($_POST['password'])) {
                    // perintah query untuk mengubah data pada tabel user
                    $query = mysqli_query($mysqli, "UPDATE tbl_user SET username    = '$username',
                                                                        nama_user   = '$nama_user'
                                                                  WHERE id_user     = '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=user&alert=2");
                    }   
                }
                // jika password diubah
                else {
                    // perintah query untuk mengubah data pada tabel user
                    $query = mysqli_query($mysqli, "UPDATE tbl_user SET username   = '$username',
                                                                        password   = '$password',
                                                                        nama_user  = '$nama_user'
                                                                  WHERE id_user    = '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=user&alert=2");
                    }   
                }
            }
        }
    }

    // update status menjadi aktif
    elseif ($_GET['act']=='on') {
        if (isset($_GET['id'])) {
            // ambil data hasil submit dari form
            $id_user = $_GET['id'];
            $status  = "Aktif";

            // perintah query untuk mengubah data pada tabel user
            $query = mysqli_query($mysqli, "UPDATE tbl_user SET status   = '$status'
                                                          WHERE id_user  = '$id_user'")
                                            or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=user&alert=3");
            } 
        }
    }

    // update status menjadi blokir
    elseif ($_GET['act']=='off') {
        if (isset($_GET['id'])) {
            // ambil data hasil submit dari form
            $id_user = $_GET['id'];
            $status  = "Blokir";

            // perintah query untuk mengubah data pada tabel user
            $query = mysqli_query($mysqli, "UPDATE tbl_user SET status   = '$status'
                                                          WHERE id_user  = '$id_user'")
                                            or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=user&alert=4");
            } 
        }
    }          
}       
?>