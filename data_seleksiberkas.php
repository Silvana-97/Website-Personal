<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from seleksi_berkas,pendaftaran,jenis_beasiswa where seleksi_berkas.npm=pendaftaran.npm and pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa order by kd_seleksiberkas DESC");
}

 ?>
 <?php
 if ($_GET['kd_seleksiberkas']){
 $kd_seleksiberkas = $_GET['kd_seleksiberkas'];
							$query=mysql_query("SELECT * FROM seleksi_berkas where kd_seleksiberkas='$kd_seleksiberkas'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$kd_seleksiberkas=$row['kd_seleksiberkas'];
							?>
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Edit Data Tahun Ajaran</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Form Edit Data Tahun Ajaran</h3>
                                    </div
                                    ><!-- form start -->
                                    <form action="aksi-seleksiberkas.php" enctype="multipart/form-data"  method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE TAHUN AJARAN</label>
                      							  <input type="text" name="kd_tahunakademik" value="<?php echo $row['kd_tahunakademik'] ?>" readonly="readonly" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TAHUN AJARAN</label>
                                                  <input type="text" class="form-control" name="tahunakademik" value="<?php echo $row['tahunakademik'] ?>" data-inputmask="'mask': ['9999/9999]', '+099 99 99 9999[9]-9999']" data-mask>                 
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
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Seleksi Berkas</a></li>
                                      <li><a href="#glyphicons" data-toggle="tab">Tambah Seleksi Berkas</a></li>
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
                                            <th>TGL. SELEKSI BERKAS</th>
                                            <th>NPM</th>
                                            <th>NAMA MAHASISWA</th>
                                            <th>JENIS BEASISWA</th>
                                            <th>STATUS KELULUSAN BERKAS</th>
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
                                                            <td class='center'>".$dt['tgl_seleksi']."</td>
                                                            <td class='center'>".$dt['npm']."</td>
															<td>".$dt['nm_mahasiswa']."</td>
															<td>".$dt['nm_jenisbeasiswa']."</td>
															<td align=\"center\">".$dt['status_lulus_berkas']."</td>";
                                                            if($_SESSION['lvl']==0){
                                                            echo"<td class='center' align=\"center\"><a href='index.php?page=7&kd_tahunakademik=".$dt['kd_tahunakademik']."' title='Edit Data'><img src=\"icon/edit.png\" /></a> ";?> | 
                                                           <a onClick="return confirm('Apakah Anda yakin menghapus nama pengguna ini ?')"<?php echo"href='aksi-seleksiberkas.php?hapus=".$dt['kd_tahunakademik']."' title='Hapus Data'><img src=\"icon/hapus.png\" /></a>";	} ?> 
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
                                    <form action="aksi-seleksiberkas.php" enctype="multipart/form-data" method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE SELEKSI BERKAS</label>
                                                  <input type="text" name="kd_seleksiberkas" value="" placeholder="SB001" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TANGGAL SELEKSI BERKAS</label>
                                                  <input type="text" class="form-control" name="tgl_seleksi" placeholder="31/12/2018" id="datepicker">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">NAMA MAHASISWA YANG DILULUSKAN BERKAS</label>
                                                  		<select name="npm" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected">[ Pilih Nama Mahasiswa ]</option>
                                                            <?php
                                                            $bes=mysql_query("select * from pendaftaran where status_pendaftaran='Y' order by npm DESC");
                                                            while($t_bes=mysql_fetch_array($bes))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_bes[npm]"; ?>"><?php echo"$t_bes[nm_mahasiswa]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS KELULUSAN BERKAS</label>
                                                  <select name="status_lulus_berkas" class="form-control">
                                                  	<option selected="selected">[ PILIH STATUS KELULUSAN ]</option>
                                                  	<option value="LULUS">LULUS</option>
                                                    <option value="TIDAK LULUS">TIDAK LULUS</option>
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

