<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('koneksii.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from daftar_ulang,daftar where daftar_ulang.no_dftr=daftar.no_dftr order by nis DESC");
}

 ?>
 <?php
 if ($_GET['nis']){
 $nis = $_GET['nis'];
							$query=mysql_query("SELECT * FROM nis wher nis='$nis'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$nis=$row['nis'];
							?>
                            <link rel="stylesheet" href="css/jquery.dataTables.min.css">
                            <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    
                                      </div><!-- /#ion-icons -->
                                    </div><!-- /.tab-content -->
                                  </div><!-- /.nav-tabs-custom -->
                                </div><!-- /.col -->
                              </div><!-- /.row -->
                            </section><!-- /.content -->
                    <?php } } else { ?>
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Calon Siswa Yang Lulus Berkas</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                      <table id="tabel" class="table table-bordered table-striped">
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>NAMA SISWA</th>
                                            <th>JENKEL</th>
                                            <th>TPT/TGL. LAHIR</th>
                                            <th>ALAMAT</th>
                                            <th>NAMA ORANGTUA</th>
                                            <th>NO. HP/TELP</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php 
                                            $counter = 1; 
                                            while ($dt=mysql_fetch_array($daftar)){
                                            echo "
                                                        <tr>
                                                            <td>$counter</td>
                                                            <td class='center'>".$dt['nis']."</td>
                                                            <td class='justify'>".$dt['nama_lengkap']."</td>
                                                            <td class='center'>".$dt['jk']."</td>
															<td class='justify'>".$dt['tmpt_lahir']." / ".$dt['tgl_lahir']."</td>
															<td class='justify'>".$dt['alamat']."</td>
															<td class='justify'>".$dt['nm_ortu']."</td>
															<td class='center'>".$dt['telepon']." / ".$dt['nomor_hp']."</td>";
														?> 
                                                        </tr>
                                            <?php $counter ++; } ?>
                                        </tbody>
                                        <p>&nbsp;</p>
                                      </table>
                                    </div><!-- /.tab-content -->
                                  </div><!-- /.nav-tabs-custom -->
                                </div><!-- /.col -->
                              </div><!-- /.row -->
                        </section><!-- /.content -->
	<?php } ?>
    <script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>

