

 <?php  

if ($_GET['form']=='add') { ?> 
  <div class="page-content">
    <div class="page-header">
      <h1 style="color:#585858">
        <i style="margin-right: 5px" class="ace-icon fa fa-edit"></i>
        Input Tiket Support
      </h1>
    </div>
   
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/tiket/proses.php?act=insert" method="POST" enctype="multipart/form-data" />
           <div class="box-body">
            <?php  
            $id_user=$_SESSION['id_user'];

             $query = mysqli_query($mysqli, "SELECT * FROM user a where a.id_user='$id_user'")
                                                or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                                                $data = mysqli_fetch_assoc($query);
              
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(idtiket,6) as kode FROM tiket
                                                ORDER BY idtiket DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_barang : '.mysqli_error($mysqli));
                                                $curr_year = date("Y");

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $idtiket = "TKT-$curr_year-$buat_id";
              ?>



  
 
           
            <div class="form-group">
                <label class="col-sm-2 control-label">ID-Tiket</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idtiket" autocomplete="off" value="<?php echo $data['idtiket']; ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Client</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>"readonly>
                </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Problem</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="problem" autocomplete="off" value="<?php echo $data['problem']; ?>" readonly>
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">status</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="status_tiket" data-placeholder="-- Pilih --" autocomplete="On">
                    <option value="<?php echo $data['status'];?>"><?php echo $data['status'];?></option>
                   <option value="Open">OPEN</option>
                    <option value="closed">CLOSED</option>
                  </select>
                </div>
              </div>
			  
			    <div class="form-group">
                <label class="col-sm-2 control-label">Start Time</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="starttime" autocomplete="off" value="<?php echo $data['starttime']; ?>" readonly>
                </div>
              </div>
			  
			    <div class="form-group">
                <label class="col-sm-2 control-label">End Time</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="endtime" autocomplete="off" value="<?php echo $data['endtime']; ?>" readonly>
                </div>
              </div>

			<div class="form-group">
                <label class="col-sm-2 control-label">Action</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="action" autocomplete="off" value="<?php echo $data['action']; ?>" readonly>
                </div>
              </div>
             </div>
            </div>
        
            <!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=view_pks" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section>
  </div><!-- /.content -->
<?php
error_reporting(0);
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
   
        
      // fungsi query untuk menampilkan data dari tabel barang
      $query = mysqli_query($mysqli, "SELECT * from tiket where idtiket='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data Vendor: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
                

        
            
      $user = $_SESSION['nama_user'];
     
      
    }
  
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="page-content">
    <div class="page-header">
      <h1 style="color:#585858">
        <i style="margin-right: 5px" class="ace-icon fa fa-edit"></i>
        Tiket Progress
      </h1>
    </div>
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/tiket/proses.php?act=update" method="POST" enctype="multipart/form-data" />
          
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">ID-Tiket</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idtiket" autocomplete="off" value="<?php echo $data['idtiket']; ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Client</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $data['nama']; ?>"readonly>
                </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Problem</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="problem" autocomplete="off" value="<?php echo $data['problem']; ?>" readonly>
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">status</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="status_tiket" data-placeholder="-- Pilih --" autocomplete="On">
                    <option value="<?php echo $data['status'];?>"><?php echo $data['status'];?></option>
                   <option value="Open">OPEN</option>
                    <option value="closed">CLOSED</option>
                  </select>
                </div>
              </div>
			  
			    <div class="form-group">
                <label class="col-sm-2 control-label">Start Time</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="starttime" autocomplete="off" value="<?php echo $data['starttime']; ?>" readonly>
                </div>
              </div>
			  
			    <div class="form-group">
                <label class="col-sm-2 control-label">End Time</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="endtime" autocomplete="off" value="<?php echo $data['endtime']; ?>" readonly>
                </div>
              </div>

			<div class="form-group">
                <label class="col-sm-2 control-label">Action</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="action" autocomplete="off" value="<?php echo $data['action']; ?>" readonly>
                </div>
              </div>
             </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=view_kamar" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>
  </div>
  </div>
  </div>
  </section>


  <!-- /.row -->
  <!-- /.content -->
<?php
      }
      elseif ($_GET['form']=='detail') { 
  if (isset($_GET['id'])) {
   
        
      // fungsi query untuk menampilkan data dari tabel barang
      $query = mysqli_query($mysqli, "SELECT * from kamar where nomorkamar='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data Vendor: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
      $user = $_SESSION['nama_user'];
     
      
    }
  
?>
  


   <section class="content-header">
    <div class="page-content">
    <div class="page-header">
      <h1 style="color:#585858">
        <i style="margin-right: 5px" class="ace-icon fa fa-edit"></i>
     Detail RESEP
      </h1>
    </div>
    
  </section>


  <div class="col-xs-12">

   <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">

                        <li class="active">
                            <a data-toggle="tab" href="#available">
                                <i class="ace-icon fa fa-list bigger-120"></i>
                                Detail Resep
                            </a>
                        </li>


                      


                                            </ul>
                                          </div>

                                           <div class="tab-content">
                            <div id="available" class="tab-pane fade in active">
                             <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
         
          <div class="box-body">
              <div class="col-sm-5">
               <tr>
             <iframe width="853" height="480" src="<?php echo $data['foto_kamar']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <td><p><?php echo $data['fasilitas']; ?></td>
  </tr>
   
              
             
           
            
         
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>

                        
                          
                        </div>
                      </div>





        <?php
      }
    





     
?>