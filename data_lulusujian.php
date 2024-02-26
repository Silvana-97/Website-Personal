<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select *,seleksi_ujian.status as st1 from calon_siswa,seleksi_brks,seleksi_ujian where calon_siswa.nomor_registrasi=seleksi_brks.nomor_registrasi and seleksi_brks.nomor_registrasi=seleksi_ujian.nomor_registrasi");

}

 ?>
 <?php
 if ($_GET['nomor_registrasi']){
 $nomor_registrasi = $_GET['nomor_registrasi'];
							$query=mysql_query("SELECT * FROM seleksi_ujian where no_ujian='$no_ujian'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$nomor_registrasi=$row['nomor_registrasi'];
							?>
                            <link rel="stylesheet" href="css/jquery.dataTables.min.css">
                            <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Edit Data Berita</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="box">
                                    <div class="box-header with-border">
                                    	<p>&nbsp;</p>
                                      <h3 class="box-title">Form Edit Data Berita</h3><p>&nbsp;</p>
                                    </div><!-- form start -->
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
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Pendaftar</a></li>
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
                                            <th>PASPHOTO</th>
                                            <th>NO. DAFTAR</th>
                                            <th>NISN</th>
                                            <th>NAMA</th>
                                            <th>TGL. DAFTAR</th>
                                            <th>N. UJIAN</th>
                                            <th>STATUS BERKAS</th>
                                            <th>STATUS UJIAN</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php 
                                            $counter = 1; 
                                            while ($dt=mysql_fetch_array($daftar)){
												
												if ($dt[status_pendaftaran]=="Y")
												{
												$kata="Aktif";
												}
												else
												{
												$kata="Non-Aktif";
												}
												if ($dt[status_lulus]=="LULUS")
													{
														$link="Validasi Ujian";
													}
													else	{$link=" &nbsp; ";}
                                            echo "
                                                        <tr>
                                                            <td>$counter</td>
                                                            <td class='center'><img src=../cpanel/pas_photo/".$dt['pasphoto_siswa']." width=50px></td>
                                                            <td class='center'>".$dt['nomor_registrasi']."</td>
                                                            <td class='center'>".$dt['nisn']."</td>
                                                            <td class='center'>".$dt['nm_siswa']."</td>
															<td class='center'>".$dt['tgl_daftar']."</td>
															<td class='center'>".$dt['nilai_ujian']."</td>
															<td class='center'>".$dt['status_lulus']."</td>
															<td class='center'>".$dt['status']."</td>";
														?> 
                                                        </tr>
                                            <?php $counter ++; } ?>
                                        </tbody>
                                        <p>&nbsp;</p>
                                      </table>
                                      <!--<form id="form1" name="form1" method="post" action="cetak_kwitansi.php">
                                                <input type="text" name="kd_penyewa" style="line-height:22px;border:1px solid #ccc">
                                                <input name="Submit" type="submit" value="Cetak Kwitansi"  class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" tabindex="20" />
                                            </form> -->
                                    </div>
                                  </div>
                                  </div>
                                  <div class="tab-pane" id="glyphicons">
                                  <div class="box">
                                    <div class="box-header with-border">
                                    <p>&nbsp;</p>
                                      <h4>Form Input Data Pembayaran</h4>
                                    <p>&nbsp;</p>  
                                    </div><!-- form start -->
                                    <form action="aksi-soundsystem.php" enctype="multipart/form-data" method="POST" role="form">
                                      <div class="box-body">
                                      <table width="100%">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE PEMBAYARAN</label>
                                                  <input type="text" class="form-control pull-right" name="kode_pembayaran" required="" style="width: 100%;">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JENIS PAKET SOUND SYSTEM</label>
                                                    	<select name="kd_jenis" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected">..:: Pilih Jenis Paket ::..</option>
                                                            <?php
                                                            $jenis=mysql_query("select * from jenis_paket order by kd_jenis asc");
                                                            while($t_jenis=mysql_fetch_array($jenis))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_jenis[kd_jenis]"; ?>"><?php echo"$t_jenis[nm_jenis]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">NAMA SOUND SYSTEM</label>
                                                  <input type="text" name="nm_soundsystem" required="required" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10"></td>
                                            <td width="45%">
                                            	<div class="form-group">
                                                  <label for="exampleInputEmail1">MEREK SOUND SYSTEM</label>
                                                  <input type="text" name="merek" required="required" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">NAMA PABRIKAN SOUND SYSTEM</label>
                                                  <input type="text" name="pabrikan" required="required" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%"></td>
                                            <td width="45%">
                                            	<div class="form-group">
                                                  <label for="exampleInputEmail1">KEKUATAN ARUS SOUND SYSTEM</label>
                                                  <input type="text" name="kekuatan_arus" required="required" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                          </tr>
                                              <table>
                                              <tr>
                                                <td width="30%">
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">JUMLAH SPEAKER</label>
                                                      <input type="text" name="jlh_speaker" required="required" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                      Unit
                                                    </div>
                                                </td>
                                                <td width="10%"></td>
                                                <td width="30%">
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">JUMLAH MICROFON</label>
                                                      <input type="text" name="jlh_mic" required="required" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                      Unit
                                                    </div>
                                                </td>
                                                <td width="10%"></td>
                                                <td width="30%">
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">JUMLAH GUITAR</label>
                                                      <input type="text" name="jlh_guitar" required="required" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                      Unit
                                                    </div>
                                                </td>
                                              </tr>
                                              </table>
                                          <tr>
                                            <td width="100%" colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KETERANGAN SOUND SYSTEM</label>
                                                  <textarea class="textarea" name="keterangan_soundsystem" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputFile">HARGA SEWA SOUND SYSTEM</label>
                                                  <input type="text" name="harga_sewa" required="required" style="width: 20%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">
                                            <td width="45%">
                                            <div class="form-group">
                                                  <label for="exampleInputFile">FOTO TENTANG SOUND SYSTEM</label>
                                                  <input type="file" name="foto_soundsystem" id="exampleInputFile">
                                            </div>
                                            </td>
                                          </tr>
                                      </table><hr>
                                      <div class="box-footer">
                                        <input type="submit" name="tambah" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" value="Simpan">
                                      </div>
                                    </form>
                                      </div><!-- /#ion-icons -->
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
