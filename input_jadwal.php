<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from jadwal,jenis_beasiswa where jadwal.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa order by kd_jadwal ASC");
}

 ?>
 <?php
 if ($_GET['kd_jadwal']){
 $kd_jadwal = $_GET['kd_jadwal'];
							$query=mysql_query("SELECT * from jadwal,jenis_beasiswa where jadwal.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa and kd_jadwal='$kd_jadwal'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$kd_jadwal=$row['kd_jadwal'];
							?>
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Edit Data Jadwal</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Form Edit Data Jadwal</h3>
                                    </div
                                    ><!-- form start -->
                                    <form action="aksi-jadwal.php" enctype="multipart/form-data"  method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE JADWAL</label>
                                                  <input type="text" name="kd_jadwal" readonly="readonly" value="<?php echo $row['kd_jadwal'] ?>" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KATEGORI JADWAL</label>
                                                  <select name="kategori" class="form-control" style="width:100%">
                                                  	<option selected="selected"><?php echo $row['kategori'] ?></option>
                                                    <option value="Seleksi Berkas">Seleksi Berkas</option>
                                                    <option value="Seleksi Ujian">Seleksi Ujian</option>
                                                  </select>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JENIS BEASISWA</label>
                                                  		<select name="kd_jenisbeasiswa" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected"><?php echo $row['nm_jenisbeasiswa'] ?></option>
                                                            <?php
                                                            $bes=mysql_query("select * from jenis_beasiswa order by kd_jenisbeasiswa DESC");
                                                            while($t_bes=mysql_fetch_array($bes))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_bes[kd_jenisbeasiswa]"; ?>"><?php echo"$t_bes[nm_jenisbeasiswa]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TANGGAL PELAKSANAAN</label>
                                                  <input type="text" name="tgl_pelaksanaan" value="<?php echo $row['tgl_pelaksanaan'] ?>" id="datepicker" style="width: 100%;" class="form-control">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JUDUL JADWAL</label>
                                                  <input type="text" name="judul_jadwal" value="<?php echo $row['judul_jadwal'] ?>" style="width: 100%;" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                          <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">ISI JADWAL</label>
                                                  <textarea class="textarea" name="isi_jadwal" placeholder="Place some text here" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['isi_jadwal'] ?></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS TAMPIL JADWAL</label>
                                             </div>
                                             </td>
                                             <td width="10%">
                                                 <label>
                                                        <input type="radio" name="status_jadwal" class="flat-red" checked width="100%" value="Y"> &nbsp; &nbsp; TAMPIL
                                                 </label>
                                             </td>
                                             <td width="45%">
                                                 <label>
                                                        <input type="radio" name="status_jadwal"  class="flat-red" width="100%" value="N" /> &nbsp; &nbsp; TIDAK TAMPIL
                                                  </label> 
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
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Jadwal</a></li>
                                      <li><a href="#glyphicons" data-toggle="tab">Tambah Jadwal</a></li>
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
                                            <th>KODE</th>
                                            <th>KATEGORI</th>
                                            <th>TGL. PELAKSANAAN</th>
                                            <th>JENIS BEASISWA</th>
                                            <th>JUDUL JADWAL</th>
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
                                                            <td>".$dt['kd_jadwal']."</td>
                                                            <td align='justify'>".$dt['kategori']."</td>
															<td align='justify'>".$dt['tgl_pelaksanaan']."</td>
															<td align='justify'>".$dt['nm_jenisbeasiswa']."</td>
															<td align='justify'>".$dt['judul_jadwal']."</td>";
                                                            if($_SESSION['lvl']==0){
                                                            echo"<td class='center' align=\"center\"><a href='index.php?page=4&kd_jadwal=".$dt['kd_jadwal']."' title='Edit Data'><img src=\"icon/edit.png\" /></a> ";?> | 
                                                           <a onClick="return confirm('Apakah Anda yakin menghapus nama pengguna ini ?')"<?php echo"href='aksi-jadwal.php?hapus=".$dt['kd_jadwal']."' title='Hapus Data'><img src=\"icon/hapus.png\" /></a>";	} ?> 
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
                                      <h3 class="box-title">Form Input Data Jadwal</h3>
                                    </div><!-- form start -->
                                    <form action="aksi-jadwal.php" enctype="multipart/form-data" method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE JADWAL</label>
                                                  <input type="text" name="kd_jadwal" value="" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KATEGORI JADWAL</label>
                                                  <select name="kategori" class="form-control" style="width:100%">
                                                  	<option selected="selected">[ Pilih Kategori Jadwal ]</option>
                                                    <option value="Seleksi Berkas">Seleksi Berkas</option>
                                                    <option value="Seleksi Ujian">Seleksi Ujian</option>
                                                  </select>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JENIS BEASISWA</label>
                                                  		<select name="kd_jenisbeasiswa" required="required" class="form-control select2" style="width: 100%;">
                                                            <option disabled="disabled" selected="selected">..:: Pilih Jenis Beasiswa ::..</option>
                                                            <?php
                                                            $bes=mysql_query("select * from jenis_beasiswa order by kd_jenisbeasiswa DESC");
                                                            while($t_bes=mysql_fetch_array($bes))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_bes[kd_jenisbeasiswa]"; ?>"><?php echo"$t_bes[nm_jenisbeasiswa]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TANGGAL PELAKSANAAN</label>
                                                  <input type="text" name="tgl_pelaksanaan" value="" id="datepicker" style="width: 100%;" class="form-control">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JUDUL JADWAL</label>
                                                  <input type="text" name="judul_jadwal" value="" style="width: 100%;" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                          <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">ISI JADWAL</label>
                                                  <textarea class="textarea" name="isi_jadwal" placeholder="Place some text here" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS TAMPIL JADWAL</label>
                                             </div>
                                             </td>
                                             <td width="10%">
                                                 <label>
                                                        <input type="radio" name="status_jadwal" class="flat-red" checked width="100%" value="Y"> &nbsp; &nbsp; TAMPIL
                                                 </label>
                                             </td>
                                             <td width="45%">
                                                 <label>
                                                        <input type="radio" name="status_jadwal"  class="flat-red" width="100%" value="N" /> &nbsp; &nbsp; TIDAK TAMPIL
                                                  </label> 
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

