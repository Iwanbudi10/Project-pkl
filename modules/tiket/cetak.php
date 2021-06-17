<?php 
/* panggil file database.php untuk koneksi ke database */
require_once "../../config/database.php";




// Redirect output to a client’s web browser (Excel2007)


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="DataSalesPlan.xls"');
header('Cache-Control: max-age=0');
// header('Content-type:application/pdf');


// header('Content-Disposition:attachment;filename="downloaded.pdf"');

// readfile('downloaded.pdf');

?>

<head>
    <title>LAPORAN</title>
</head>
  <table border='1'>
                            <thead>
                                <tr>
                                    <th class='center'>No</th>
                                    <th class='center'>IDtiket</th>
                                    <th class='center'>Client</th>
									<th class="center" >Case</th>
                                    <th class="center" >Status</th>
                                    <th class='center'>Action</th>
									<th class='center'>Hasil</th>
									<th class='center'>Start Date</th>
									<th class='center'>End Date</th>
									<th class='center'>Start Time</th>
									<th class='center'>End Time</th>
                                </tr>
                            </thead>

                            <?php
                            error_reporting(0);
                            $no = 1;
                          


if (isset($_GET['dari'])) {
    $dari=$_GET['dari'];
    $sampai=$_GET['sampai'];
}

                          $query = mysqli_query($mysqli, "SELECT
  *
FROM
  tiket where date between '".$_GET['dari']."' and '".$_GET['sampai']."'
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
                                    <td width="100"><?php echo $data['problem']; ?></td>
                                    <td width="100" style="background:<?php echo $warna; ?>"><?php echo $data['status']; ?></td>
									<td width="100"><?php echo $data['action']; ?></td>
									<td width="100"><?php echo $data['hasil']; ?></td>
									<td width="100"><?php echo $data['startdate']; ?></td>
									<td width="100"><?php echo $data['enddate']; ?></td>
									<td width="100"><?php echo $data['starttime']; ?></td>
									<td width="100"><?php echo $data['endtime']; ?></td>
                                    <td class='center' width='30'>
                        <div>
                          
                                    
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                            </tbody>
                        </table>
               