<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from permohonan,pendaftaran,jenis_beasiswa where permohonan.npm=pendaftaran.npm and pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa order by status_permohonan DESC");
}

 ?>
 <?php
 if ($_GET['npm']){
 $npm = $_GET['npm'];
							$query=mysql_query("SELECT * FROM daftar where npm='$npm'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$npm=$row['npm'];
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
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Permohonan Beasiswa</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                      <table id="tabel" class="table table-bordered table-striped" style="font-size:10px">
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>NPM</th>
                                            <th>NAMA MAHASISWA</th>
                                            <th>TGL. PERMOHONAN</th>
                                            <th>NOMOR PERMOHONAN</th>
                                            <th>JENIS BEASISWA</th>
                                            <th>ALASAN PERMOHONAN</th>
                                            <th width="11%">AKSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php 
                                            $counter = 1; 
                                            while ($dt=mysql_fetch_array($daftar)){
												if ($dt[status_permohonan]=="Y")
												{
												$kata="SUDAH DIKONFIRMASI";
												}
												else
												{
												$kata="BELUM DIKONFIRMASI";
												}
                                            echo "
                                                        <tr>
                                                            <td>$counter</td>
                                                            <td class='center'>".$dt['npm']."</td>
                                                            <td>".$dt['nm_mahasiswa']."</td>
                                                            <td>".$dt['tgl_permohonan']."</td>
															<td>".$dt['id_permohonan']."</td>
															<td>".$dt['nm_jenisbeasiswa']."</td>
															<td>".$dt['alasan_permohonan']."</td>
                                                            <td class='center'>
															<a href=hapus_permohonan.php?hapus&id_permohonan=$dt[id_permohonan] title=\"Hapus Akun Pendaftar\"><img src=\"icon/hapus.png\" /></a>
															</td>";
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
