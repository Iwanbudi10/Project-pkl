
<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="?module=beranda">Beranda</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i class="ace-icon fa fa-list"></i> List Tiket Support
            <a href="?module=form_tiket&form=add">
                <button class="btn btn-primary pull-right">
                    <i class="ace-icon fa fa-plus"></i> Tambah
                </button>
            </a>
        </h1>
        <br>
        <br>
    
        

<?php

if (empty($_GET['alert'])) {
}
elseif ($_GET['alert'] == 1) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        List Tiket baru berhasil disimpan.
        <br>
    </div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "List Tiket berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        List Tiket berhasil diubah.
        <br>
    </div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "List Tiket berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        List Tiket berhasil dihapus.
        <br>
    </div>
<?php
} 
// jika alert = 4
// tampilkan pesan Upload Gagal "pastikan file yang diupload sudah benar"
elseif ($_GET['alert'] == 4) { ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
        pastikan file yang diupload sudah benar.
        <br>
    </div>
<?php
}
// jika alert = 5
// tampilkan pesan Upload Gagal "pastikan ukuran foto tidak lebih dari 1MB"
elseif ($_GET['alert'] == 5) { ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
        pastikan ukuran foto tidak lebih dari 1MB.
        <br>
    </div>
<?php
} 
// jika alert = 6
// tampilkan pesan Upload Gagal "pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
elseif ($_GET['alert'] == 6) { ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
        pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
        <br>
    </div>
<?php
} 
?>

<br>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                        <div class="row">

           
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class='center'>No</th>
                                    <th class='center'>IDtiket</th>
                                    <th class='center'>Client</th>
									<th class="center" >Case</th>
                                    <th class="center" >Status</th>
                                    <th class='center'>Action</th>
									<th class='center'>Hasil</th>
									<th class='center'>Start Time</th>
									<th class='center'>End Time</th>
                                    <th class='center'></th>
                                </tr>
                                </tr>
                            </thead>

                            <?php
                            $no = 1;
                            //$created_user = $_SESSION['id_user'];
                            // fungsi query untuk menampilkan data dari tabel upload
                            $query = mysqli_query($mysqli, "SELECT
  *
FROM
  tiket 
   
GROUP BY idtiket DESC
")
                                                or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
                              
                                 if ($data['status']=="Isi") {
                                    $warna = "#f2dede";
                                } else {
                                    $warna = "";
                                }
                            ?>
                          <tr>
                                    <td width="10" class="center"><?php echo $no; ?></td>                                  
                                    <td width="100"><?php echo $data['idtiket']; ?></td>
                                    <td width="100"><?php echo $data['client']; ?></td>
                                    <!--<td width="100"><?php echo $data['departemen']; ?></td>-->
                                    <!--<td width="100"><?php echo $data['email']; ?></td>-->
                                    <!--<td width="100"><?php echo $data['priority']; ?></td>-->
                                    <td width="100"><?php echo $data['problem']; ?></td>
                                    <td width="100" style="background:<?php echo $warna; ?>"><?php echo $data['status']; ?></td>
									<!--<td width="250" class="center"><img id="myModal" style="padding:1px" src="upload/foto/<?php echo $data['foto_kamar']; ?>" height="150"></td>-->
                                    <!--<td width="100"><?php echo $data['createdate']; ?></td>-->
									<td width="100"><?php echo $data['action']; ?></td>
									<td width="100"><?php echo $data['hasil']; ?></td>
									<td width="10"><?php echo $data['starttime']; ?></td>
									<td width="10"><?php echo $data['endtime']; ?></td>

                                    <td class='center' width='55'>
									<div>
                                    <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href="?module=form_tiket&form=edit&id=<?php echo $data['idtiket']; ?>">
                                    <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                                    </a>
                                    <a data-toggle='tooltip' data-placement='top' title='Hapus' style='margin-right:5px'  class='btn btn-primary btn-sm' href="?module=form_tiket&form=hapus&id=<?php echo $data['idtiket']; ?>">
                                    <i style='color:#fff' class='glyphicon glyphicon-trash' onclick='return confirm confirm(\"Yakin ingin menghapus data ini?\")'></i>
                                   
                                    </a>
									</div>
                                    </td>
                                    </div>
                                    </div>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                            </tbody>
                        </table>
                    

                </div>
            </div>
        </div>
</div>
</div>

<div id="myModal" class="modal">

  <span class="CLOSED">&times;</span>


  <img class="modal-content" id="img01">


  <div id="caption"></div>
</div>
               
