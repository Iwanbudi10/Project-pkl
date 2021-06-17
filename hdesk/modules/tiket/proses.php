<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
             $idtiket                = mysqli_real_escape_string($mysqli, trim($_POST['notiket']));
             $departemen             = mysqli_real_escape_string($mysqli, trim($_POST['departemen']));
             $nama                   = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
             $email                  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
             $problem                = mysqli_real_escape_string($mysqli, trim($_POST['problem']));
             $prio                   = mysqli_real_escape_string($mysqli, trim($_POST['prio']));
             $tanggal                = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
             $id_user                = $_SESSION['id_user'];
            $nama_file   = $_FILES['data']['name'];
            $ukuran_file = $_FILES['data']['size'];
            $tipe_file   = $_FILES['data']['type'];
            $tmp_file    = $_FILES['data']['tmp_name'];

            // tentukan extension yang diperbolehkan
            $allowed_extensions = array('jpg','jpeg','png','JPG');

            // Set path folder tempat menyimpan gambarnya
            $path = "../../upload/foto/".$nama_file;

            // check extension
            $file = explode(".", $nama_file);
            $extension = array_pop($file);

            // jika foto tidak diisi
            if (empty($nama_file)) {
                // perintah query untuk menyimpan data ke tabel view_kamar
                $query = mysqli_query($mysqli, "INSERT INTO tiket(idtiket,departemen,nama,email,priority,problem,id_user,updateuser,date) 
                                            VALUES('$idtiket','$departemen','$nama','$email','$prio','$problem','$id_user','$id_user','$tanggal')")
                                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    
                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=tiket_list&alert=1");
                }   
            }
            // jika foto diisi
            else {
                // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                if(in_array($extension, $allowed_extensions)) {
                    // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                    if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                        // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                        // Proses upload
                        if(move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
                            // Jika gambar berhasil diupload, Lakukan : 
                            // perintah query untuk menyimpan data ke tabel view_kamar
                           $query = mysqli_query($mysqli, "INSERT INTO tiket(idtiket,departemen,nama,email,problem,id_user,updateuser,attachment,date) 
                                            VALUES('$idtiket','$departemen','$nama','$email','$problem','$id_user','$id_user','$nama_file','$tanggal')")
                                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));  


                            // cek query
                            if ($query) {
                                // jika berhasil tampilkan pesan berhasil update data
                                header("location: ../../main.php?module=tiket_list&alert=1");
                            }
                        } else {
                            // Jika gambar gagal diupload, tampilkan pesan gagal upload
                            header("location: ../../main.php?module=tiket_list&alert=4");
                        }
                    } else {
                        // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=tiket_list&alert=5");
                    }
                } else {
                    // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
                    header("location: ../../main.php?module=tiket_list&alert=6");
                }
            }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['idtiket'])) {
                // ambil data hasil submit dari form
             $idtiket                = mysqli_real_escape_string($mysqli, trim($_POST['idtiket']));
             $departemen             = mysqli_real_escape_string($mysqli, trim($_POST['departemen']));
             $nama                   = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
             $email                  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
             $prio                   = mysqli_real_escape_string($mysqli, trim($_POST['prio']));
             $problem                = mysqli_real_escape_string($mysqli, trim($_POST['problem']));
             $status                 = mysqli_real_escape_string($mysqli, trim($_POST['status_tiket']));
             $id_user                = $_SESSION['id_user'];

                $nama_file   = $_FILES['data']['name'];
                $ukuran_file = $_FILES['data']['size'];
                $tipe_file   = $_FILES['data']['type'];
                $tmp_file    = $_FILES['data']['tmp_name'];

                // tentukan extension yang diperbolehkan
                $allowed_extensions = array('jpg','jpeg','png');

                // Set path folder tempat menyimpan gambarnya
                $path = "../../upload/foto/".$nama_file;

                // check extension
                $file = explode(".", $nama_file);
                $extension = array_pop($file);

                // jika foto tidak diubah
                if (empty($nama_file)) {
                    // perintah query untuk mengubah data pada tabel view_kamar
                    $query = mysqli_query($mysqli, "UPDATE tiket SET status               = '$status',
                                                                     updateuser           = '$id_user'
                                                                     
                                                                        
                                                                         
                                                                   WHERE idtiket                   = '$idtiket'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=tiket&alert=2");
                    }
                }
                else {
                   
                    if(in_array($extension, $allowed_extensions)) {
                        
                        if($ukuran_file <= 1000000) { 
                            if(move_uploaded_file($tmp_file, $path)) { 
                                $query = mysqli_query($mysqli, "UPDATE tiket SET status               = '$status',
                                                                     updateuser           = '$id_user'
                                                                     
                                                                        
                                                                         
                                                                   WHERE idtiket                   = '$idtiket'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));


                                // cek query
                                if ($query) {
                                   
                                    header("location: ../../main.php?module=tiket_list&alert=2");
                                }
                            } else {
                              
                                header("location: ../../main.php?module=tiket_list&alert=4");
                            }
                        } else {
                            
                            header("location: ../../main.php?module=tiket_list&alert=5");
                        }
                    } else {
                        
                        header("location: ../../main.php?module=tiket_list&alert=6");
                    }
                }
            }
        }
    }
}       
?>
