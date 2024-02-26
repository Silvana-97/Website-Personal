<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from seleksi_ujian,permohonan,pendaftaran,jenis_beasiswa where seleksi_ujian.id_permohonan=permohonan.id_permohonan and permohonan.npm=pendaftaran.npm and pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa  order by kd_seleksiujian DESC");
}

 ?>
 <?php
 if ($_GET['kd_seleksiujian']){
 $kd_seleksiujian = $_GET['kd_seleksiujian'];
							$query=mysql_query("SELECT * FROM seleksi_ujian,permohonan,pendaftaran,jenis_beasiswa where seleksi_ujian.id_permohonan=permohonan.id_permohonan and permohonan.npm=pendaftaran.npm and pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa and kd_seleksiujian='$kd_seleksiujian'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$kd_seleksiujian=$row['kd_seleksiujian'];
							?>
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Edit Data Seleksi Ujian</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Form Edit Data Seleksi Ujian</h3>
                                    </div
                                    ><!-- form start -->
                                    <form action="aksi-seleksiujian.php" enctype="multipart/form-data"  method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE SELEKSI UJIAN</label>
                                                  <input type="text" name="kd_seleksiujian" value="<?php echo $row['kd_seleksiujian'] ?>" placeholder="SU-101" style="width: 100%;" class="form-control" id="exampleInputUsername" readonly="readonly">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TANGGAL SELEKSI UJIAN</label>
                                                  <input type="text" class="form-control" name="tgl_seleksi_ujian" value="<?php echo $row['tgl_seleksi_ujian'] ?>" placeholder="31/12/2018" id="datepicker">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">NAMA MAHASISWA YANG DILULUSKAN BERKAS</label>
                                                  		<select name="id_permohonan" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected"><?php echo $row['nm_mahasiswa'] ?></option>
                                                            <?php
                                                            $bes=mysql_query("select * from permohonan,pendaftaran where permohonan.npm=pendaftaran.npm order by id_permohonan DESC");
                                                            while($t_bes=mysql_fetch_array($bes))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_bes[id_permohonan]"; ?>"><?php echo"$t_bes[nm_mahasiswa]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS KELULUSAN UJIAN</label>
                                                  <select name="status_lulus_ujian" class="form-control">
                                                  	<option selected="selected"><?php echo $row['status_lulus_ujian'] ?></option>
                                                  	<option value="LULUS UJIAN">LULUS UJIAN</option>
                                                    <option value="TIDAK LULUS UJIAN">TIDAK LULUS UJIAN</option>
                                                  </select>
                                                </div>
                                            </td>
                                          </tr>
                                      </table>
                                     <hr>
                                      <div class="box-footer">
                                        <input type="submit" name="update" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" value="Update">
                                      </div>
                                    </form>
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
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Seleksi Ujian</a></li>
                                      <li><a href="#glyphicons" data-toggle="tab">Tambah Seleksi Ujian</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                      <table id="tabel" class="table table-bordered table-striped">
                                        <thead>
                                          <tr>
                                            <th width="5%">No</th>
                                            <th>TGL. SELEKSI UJIAN</th>
                                            <th>NPM</th>
                                            <th>NAMA MAHASISWA</th>
                                            <th>JENIS BEASISWA</th>
                                            <th>STATUS KELULUSAN UJIAN</th>
                                            <th width="10%">AKSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php 
                                            $counter = 1; 
                                            while ($dt=mysql_fetch_array($daftar)){
                                            echo "
                                                        <tr>
                                                            <td>$counter</td>
                                                            <td class='center'>".$dt['tgl_seleksi_ujian']."</td>
                                                            <td class='center'>".$dt['npm']."</td>
															<td>".$dt['nm_mahasiswa']."</td>
															<td>".$dt['nm_jenisbeasiswa']."</td>
															<td align=\"center\">".$dt['status_lulus_ujian']."</td>";
                                                            if($_SESSION['lvl']==0){
                                                            echo"<td class='center' align=\"center\"><a href='index.php?page=11&kd_seleksiujian=".$dt['kd_seleksiujian']."' title='Edit Data'><img src=\"icon/edit.png\" /></a> ";?> | 
                                                           <a onClick="return confirm('Apakah Anda yakin menghapus nama pengguna ini ?')"<?php echo"href='aksi-seleksiujian.php?hapus=".$dt['kd_seleksiujian']."' title='Hapus Data'><img src=\"icon/hapus.png\" /></a>";	} ?> 
                                                        </tr>
                                            <?php $counter ++; } ?>
                                        </tbody>
                                      </table>
                                      
                                    </div>
                                  </div>
                                  </div>
                                  <div class="tab-pane" id="glyphicons">
                                  <div class="box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Form Input Data Seleksi Berkas</h3>
                                    </div><!-- form start -->
                                    <form action="aksi-seleksiujian.php" enctype="multipart/form-data" method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE SELEKSI UJIAN</label>
													  <input type="text" name="kd_seleksiujian" value="" placeholder="SU-101" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TANGGAL SELEKSI UJIAN</label>
                                                  <input type="text" class="form-control" name="tgl_seleksi_ujian" placeholder="6/11/2023" id="datepicker">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">NAMA MAHASISWA YANG DILULUSKAN BERKAS</label>
                                                  		<select name="id_permohonan" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected">[ Pilih Nama Mahasiswa ]</option>
                                                            <?php
                                                            $bes=mysql_query("select * from permohonan,pendaftaran where permohonan.npm=pendaftaran.npm order by id_permohonan DESC");
                                                            while($t_bes=mysql_fetch_array($bes))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_bes[id_permohonan]"; ?>"><?php echo"$t_bes[nm_mahasiswa]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS KELULUSAN UJIAN</label>
                                                  <select name="status_lulus_ujian" class="form-control">
                                                  	<option selected="selected">[ PILIH STATUS KELULUSAN ]</option>
                                                  	<option value="LULUS UJIAN">LULUS UJIAN</option>
                                                    <option value="TIDAK LULUS UJIAN">TIDAK LULUS UJIAN</option>
                                                  </select>
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

