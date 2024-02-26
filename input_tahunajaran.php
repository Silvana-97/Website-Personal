<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from tahunakademik order by kd_tahunakademik DESC");
}

 ?>
 <?php
 if ($_GET['kd_tahunakademik']){
 $kd_tahunakademik = $_GET['kd_tahunakademik'];
							$query=mysql_query("SELECT * FROM tahunakademik where kd_tahunakademik='$kd_tahunakademik'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$kd_tahunakademik=$row['kd_tahunakademik'];
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
                                    <form action="aksi-tahunakademik.php" enctype="multipart/form-data"  method="POST" role="form">
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
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Tahun Ajaran</a></li>
                                      <li><a href="#glyphicons" data-toggle="tab">Tambah Tahun Ajaran</a></li>
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
                                            <th width="35%">KODE TAHUN AJARAN</th>
                                            <th>TAHUN AJARAN</th>
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
                                                            <td class='center'>".$dt['kd_tahunakademik']."</td>
                                                            <td class='center'>".$dt['tahunakademik']."</td>";
                                                            if($_SESSION['lvl']==0){
                                                            echo"<td class='center' align=\"center\"><a href='index.php?page=7&kd_tahunakademik=".$dt['kd_tahunakademik']."' title='Edit Data'><img src=\"icon/edit.png\" /></a> ";?> | 
                                                           <a onClick="return confirm('Apakah Anda yakin menghapus nama pengguna ini ?')"<?php echo"href='aksi-tahunakademik.php?hapus=".$dt['kd_tahunakademik']."' title='Hapus Data'><img src=\"icon/hapus.png\" /></a>";	} ?> 
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
                                      <h3 class="box-title">Form Input Data Tahun Ajaran</h3>
                                    </div><!-- form start -->
                                    <form action="aksi-tahunakademik.php" enctype="multipart/form-data" method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">KODE TAHUN AJARAN</label>
                                                  <input type="text" name="kd_tahunakademik" value="" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">TAHUN AJARAN</label>
                                                  <input type="text" class="form-control" name="tahunakademik" data-inputmask="'mask': ['9999/9999]', '+099 99 99 9999[9]-9999']" data-mask>
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

