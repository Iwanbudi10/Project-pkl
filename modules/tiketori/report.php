
<?php
 

?>
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
            <i class="ace-icon fa fa-list"></i> Report
            <!--<a href="modules/tiket/cetak.php">
                <button class="btn btn-primary pull-right">
                    <i class="ace-icon fa fa-plus"></i> Export
                </button>
            </a>-->
        </h1>
        <br>
        <br>
         <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/tiket/cetak.php" method="GET" enctype="multipart/form-data" />
          
            <div class="box-body">
              
               <div class="form-group">
                                            <label>Dari</label>
                                            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="dari" autocomplete="off" required>
                                        </div>

                                         <div class="form-group">
                                            <label>Sampai</label>
                                            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="sampai" autocomplete="off" required>
                                        </div>
                                         <div class="form-group">
                                        <input type="submit" class='btn btn-primary btn-sm' name="simpan" value="Cetak">
                                         <i style='color:#fff' class='glyphicon glyphicon-list'></i>
                                       
                                    </div>

             
          </div>
      </form>
  </div>
</div>
</div>
</section>
        <hr>

       
    
        

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan "List Tiket baru berhasil disimpan"
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
                                    <!--<th class='center'>Departemen</th>-->
                                    <!--<th class='center'>Email</th>-->
                                    <!--<th class='center'>Priority</th>-->
									<th class="center" >Case</th>
                                    <th class="center" >Status</th>
                                    <!--<th class="center" >Attachment</th>-->
                                    <th class='center'>Hasil</th> 
                                    <th class='center'>Action</th>
									<th class='center'>Start Time</th>
									<th class='center'>End Time</th>
                                </tr>
                            </thead>

                            <?php
                            error_reporting(0);
                         
                            $no = 1;
                          
                          
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
									<td width="10" class="center"><?php echo $no; ?></td>                                  
                                    <td width="100"><?php echo $data['idtiket']; ?></td>
                                    <td width="100"><?php echo $data['client']; ?></td>
                                    <!--<td width="100"><?php echo $data['departemen']; ?></td>-->
                                    <!--<td width="100"><?php echo $data['email']; ?></td>-->
                                    <!--<td width="100"><?php echo $data['priority']; ?></td>-->
                                    <td width="100"><?php echo $data['problem']; ?></td>
                                    <td width="100" style="background:<?php echo $warna; ?>"><?php echo $data['status']; ?></td>
									<!--<td width="250" class="center"><img id="myModal" style="padding:1px" src="upload/foto/<?php echo $data['foto_kamar']; ?>" height="150"></td>-->
                                    <td width="100"><?php echo $data['hasil']; ?></td>
									<td width="100"><?php echo $data['action']; ?></td>
									<td width="100"><?php echo $data['starttime']; ?></td>
									<td width="100"><?php echo $data['endtime']; ?></td>
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
               

               