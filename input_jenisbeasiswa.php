<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from jenis_beasiswa order by kd_jenisbeasiswa ASC");
}

 ?>
 <?php
 if ($_GET['kd_jenisbeasiswa']){
 $kd_jenisbeasiswa = $_GET['kd_jenisbeasiswa'];
							$query=mysql_query("SELECT * FROM jenis_beasiswa where kd_jenisbeasiswa='$kd_jenisbeasiswa'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$kd_jenisbeasiswa=$row['kd_jenisbeasiswa'];
							?>
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Edit Data Jenis Beasiswa</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Form Edit Data Jenis Beasiswa</h3>
                                    </div
                                    ><!-- form start -->
                                    <form action="aksi-jenisbeasiswa.php" enctype="multipart/form-data"  method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE JENIS BEASISWA</label>
                                                  <input type="text" readonly="readonly" name="kd_jenisbeasiswa" value="<?php echo $row['kd_jenisbeasiswa'] ?>" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">NAMA JENIS BEASISWA</label>
                                                  <input type="text" name="nm_jenisbeasiswa" value="<?php echo $row['nm_jenisbeasiswa'] ?>" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">BESAR BEASISWA</label>
                                                  <input type="text" name="jlh_beasiswa" value="<?php echo $row['jlh_beasiswa'] ?>" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JUMLAH KUOTA YANG DITERIMA</label>
                                                  <input type="text" name="kuota" value="<?php echo $row['kuota'] ?>" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">DESKRIPSI BEASISWA</label>
                                                  <textarea class="textarea" name="deskripsi_beasiswa" placeholder="Place some text here" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['deskripsi_beasiswa'] ?></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS TAMPIL JENIS BEASISWA</label>
                                             </div>
                                             </td>
                                             <td width="10%">
                                                 <label>
                                                        <input type="radio" name="status_jenisbeasiswa" class="flat-red" checked width="100%" value="Y"> &nbsp; &nbsp; TAMPIL
                                                 </label>
                                             </td>
                                             <td width="45%">
                                                 <label>
                                                        <input type="radio" name="status_jenisbeasiswa"  class="flat-red" width="100%" value="N" /> &nbsp; &nbsp; TIDAK TAMPIL
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
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Jenis Beasiswa</a></li>
                                      <li><a href="#glyphicons" data-toggle="tab">Tambah Jenis Beasiswa</a></li>
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
                                            <th>NAMA BEASISWA</th>
                                            <th>JLH. BEASISWA</th>
                                            <th>KUOTA</th>
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
                                                            <td>".$dt['kd_jenisbeasiswa']."</td>
                                                            <td align='justify'>".$dt['nm_jenisbeasiswa']."</td>
															<td align='justify'><b>Rp. ".number_format($dt[jlh_beasiswa],0,',','.')."</b></td>
															<td align='center'>".$dt['kuota']." ORANG</td>";
                                                            if($_SESSION['lvl']==0){
                                                            echo"<td class='center' align=\"center\"><a href='index.php?page=6&kd_jenisbeasiswa=".$dt['kd_jenisbeasiswa']."' title='Edit Data'><img src=\"icon/edit.png\" /></a> ";?> | 
                                                           <a onClick="return confirm('Apakah Anda yakin menghapus nama pengguna ini ?')"<?php echo"href='aksi-jenisbeasiswa.php?hapus=".$dt['kd_jenisbeasiswa']."' title='Hapus Data'><img src=\"icon/hapus.png\" /></a>";	} ?> 
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
                                      <h3 class="box-title">Form Input Data Jenis Beasiswa</h3>
                                    </div><!-- form start -->
                                    <form action="aksi-jenisbeasiswa.php" enctype="multipart/form-data" method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE JENIS BEASISWA</label>
                                                  <input type="text" name="kd_jenisbeasiswa" value="" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">NAMA JENIS BEASISWA</label>
                                                  <input type="text" name="nm_jenisbeasiswa" value="" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">BESAR BEASISWA</label>
                                                  <input type="text" name="jlh_beasiswa" value="" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JUMLAH KUOTA YANG DITERIMA</label>
                                                  <input type="text" name="kuota" value="" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">DESKRIPSI BEASISWA</label>
                                                  <textarea class="textarea" name="deskripsi_beasiswa" placeholder="Place some text here" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS TAMPIL JENIS BEASISWA</label>
                                             </div>
                                             </td>
                                             <td width="10%">
                                                 <label>
                                                        <input type="radio" name="status_jenisbeasiswa" class="flat-red" checked width="100%" value="Y"> &nbsp; &nbsp; TAMPIL
                                                 </label>
                                             </td>
                                             <td width="45%">
                                                 <label>
                                                        <input type="radio" name="status_jenisbeasiswa"  class="flat-red" width="100%" value="N" /> &nbsp; &nbsp; TIDAK TAMPIL
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

