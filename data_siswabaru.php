<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from penerima,seleksi_ujian,permohonan,pendaftaran,jenis_beasiswa,tahunakademik where penerima.kd_seleksiujian=seleksi_ujian.kd_seleksiujian and seleksi_ujian.id_permohonan=permohonan.id_permohonan and permohonan.npm=pendaftaran.npm and pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa and penerima.kd_tahunakademik=tahunakademik.kd_tahunakademik order by kd_penerima");
}

 ?>
 <?php
 if ($_GET['kd_penerima']){
 $kd_penerima = $_GET['kd_penerima'];
							$query=mysql_query("SELECT * from penerima,seleksi_ujian,permohonan,pendaftaran,jenis_beasiswa,tahunakademik where penerima.kd_seleksiujian=seleksi_ujian.kd_seleksiujian and seleksi_ujian.id_permohonan=permohonan.id_permohonan and penerima.kd_tahunakademik=tahunakademik.kd_tahunakademik and permohonan.npm=pendaftaran.npm and pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa and  kd_penerima='$kd_penerima'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$kd_penerima=$row['kd_penerima'];
							?>
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Edit Data Penerima Beasiswa</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Form Edit Data Penerima Beasiswa</h3>
                                    </div
                                    ><!-- form start -->
                                    <form action="aksi-siswabaru.php" enctype="multipart/form-data"  method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0" style="font-size:12px">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE PENERIMA BEASISWA</label>
                                                  		<input type="text" name="kd_penerima" class="form-control" readonly="readonly" value="<?php echo $row['kd_penerima'] ?>" width="100%" placeholder="B.BM-2018-001" maxlength="13" />
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TANGGAL PENGESAHAN BEASISWA</label>
                                                  <input type="text" name="tgl_pengesahan" value="<?php echo $row['tgl_pengesahan'] ?>" id="datepicker" style="width: 100%;" class="form-control" placeholder="31/12/2018">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                          <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">NAMA MAHASISWA PENERIMA YANG LULUS SELEKSI UJIAN</label>
                                                  		<select name="kd_seleksiujian" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected"><?php echo $row['nm_mahasiswa'] ?></option>
                                                            <?php
                                                            $mapel=mysql_query("select * from seleksi_ujian,permohonan,pendaftaran where seleksi_ujian.id_permohonan=permohonan.id_permohonan and permohonan.npm=pendaftaran.npm and status_lulus_ujian='LULUS UJIAN' order by kd_seleksiujian DESC");
                                                            while($t_mapel=mysql_fetch_array($mapel))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_mapel[kd_seleksiujian]"; ?>"><?php echo"$t_mapel[nm_mahasiswa]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                         	<td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TAHUN AKADEMIK</label>
                                                  		<select name="kd_tahunakademik" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected"><?php echo $row['tahunakademik'] ?></option>
                                                            <?php
                                                            $mapel=mysql_query("select * from tahunakademik order by kd_tahunakademik DESC");
                                                            while($t_mapel=mysql_fetch_array($mapel))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_mapel[kd_tahunakademik]"; ?>"><?php echo"$t_mapel[tahunakademik]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                          </tr>
                                      </table>
                                     <hr>
                                      <div class="box-footer">
                                        <input type="submit" name="update" class="btn btn-sm btn-primary" value="Update">
                                        <a href="javascript:history.back()" class="btn btn-sm btn-primary">Kembali</a>
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
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Penerima Beasiswa</a></li>
                                      <li><a href="#glyphicons" data-toggle="tab">Tambah Penerima Beasiswa</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                      <table id="tabel" class="table table-bordered table-striped" width="100%" style="font-size:10px;">
                                        <thead>
                                          <tr>
                                            <th width="5%">No</th>
                                            <th>NPM</th>
                                            <th>NAMA SISWA</th>
                                            <th>TPT/TGL. LAHIR</th>
                                            <th>TGL. DAFTAR</th>
                                            <th>TGL. MOHON</th>
                                            <th>TGL. SAH</th>
                                            <th>JENIS BEASISWA</th>
                                            <th>KUOTA</th>
                                            <th>JLH. BEASISWA</th>
                                            <th>T.A</th>
                                            <th width="6%">AKSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php 
                                            $counter = 1; 
                                            while ($dt=mysql_fetch_array($daftar)){
                                            echo "
                                                        <tr>
                                                            <td>$counter</td>
                                                            <td align='center'>".$dt['npm']."</td>
                                                            <td align='justify'>".$dt['nm_mahasiswa']."</td>
															<td align='justify'>".$dt['tpt_lahir']." / ".$dt['tgl_lahir']."</td>
															<td align='justify'>".$dt['tgl_registrasi']."</td>
															<td align='justify'>".$dt['tgl_permohonan']."</td>
															<td align='justify'>".$dt['tgl_pengesahan']."</td>
															<td align='justify'>".$dt['nm_jenisbeasiswa']."</td>
															<td align='justify'>".$dt['kuota']." ORANG</td>
															<td align='justify'><b>Rp. ".number_format($dt[jlh_beasiswa],0,',','.')."</b></td>
															<td align='justify'>".$dt['tahunakademik']."</td>";
                                                            if($_SESSION['lvl']==0){
                                                            echo"<td class='center' align=\"center\"><a href='index.php?page=13&kd_penerima=".$dt['kd_penerima']."' title='Edit Data'><span class=\"glyphicon glyphicon-edit\"></a> ";?> | 
                                                           <a onClick="return confirm('Apakah Anda yakin menghapus data ini ?')"<?php echo"href='aksi-siswabaru.php?hapus=".$dt['kd_penerima']."' title='Hapus Data'><span class=\"glyphicon glyphicon-trash\"></a>";	} ?> 
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
                                      <h3 class="box-title">Form Input Data Penerima Beasiswa</h3>
                                    </div><!-- form start -->
                                    <form action="aksi-siswabaru.php" enctype="multipart/form-data" method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE PENERIMA BEASISWA</label>
                                                  		<input type="text" name="kd_penerima" class="form-control" width="100%" placeholder="B.BM-2018-001" maxlength="13" />
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TANGGAL PENGESAHAN BEASISWA</label>
                                                  <input type="text" name="tgl_pengesahan" id="datepicker" style="width: 100%;" class="form-control" placeholder="31/12/2018">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                          <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">NAMA MAHASISWA PENERIMA YANG LULUS SELEKSI UJIAN</label>
                                                  		<select name="kd_seleksiujian" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected">..:: Pilih Nama Mahasiswa ::..</option>
                                                            <?php
                                                            $mapel=mysql_query("select * from seleksi_ujian,permohonan,pendaftaran where seleksi_ujian.id_permohonan=permohonan.id_permohonan and permohonan.npm=pendaftaran.npm and status_lulus_ujian='LULUS UJIAN' order by kd_seleksiujian DESC");
                                                            while($t_mapel=mysql_fetch_array($mapel))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_mapel[kd_seleksiujian]"; ?>"><?php echo"$t_mapel[nm_mahasiswa]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                         	<td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TAHUN AKADEMIK</label>
                                                  		<select name="kd_tahunakademik" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected">..:: Pilih Tahun Akademik ::..</option>
                                                            <?php
                                                            $mapel=mysql_query("select * from tahunakademik order by kd_tahunakademik DESC");
                                                            while($t_mapel=mysql_fetch_array($mapel))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_mapel[kd_tahunakademik]"; ?>"><?php echo"$t_mapel[tahunakademik]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                          </tr>
                                      </table><hr>
                                      <div class="box-footer">
                                        <input type="submit" name="tambah" class="btn btn-sm btn-primary" value="Simpan">
                                      </div>
                                    </form>
                                      </div><!-- /#ion-icons -->
                                    </div><!-- /.tab-content -->
                                  </div><!-- /.nav-tabs-custom -->
                                </div><!-- /.col -->
                              </div><!-- /.row -->
                        </section><!-- /.content --><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<?php } ?>
    <script src="js/bootstrap.js"></script>
    <script src="js/raphael-min.js"></script>
    <script src="js/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
      
      $(function () {
        CKEDITOR.replace('editor1');
        $(".textarea").wysihtml5();
      });
	</script>

