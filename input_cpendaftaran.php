<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from content_beasiswa,jenis_beasiswa where content_beasiswa.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa order by id_cbeasiswa ASC");
}

 ?>
 <?php
 if ($_GET['id_cbeasiswa']){
 $id_cbeasiswa = $_GET['id_cbeasiswa'];
							$query=mysql_query("SELECT * from content_beasiswa,jenis_beasiswa where content_beasiswa.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa and id_cbeasiswa='$id_cbeasiswa'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id_cbeasiswa=$row['id_cbeasiswa'];
							?>
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Edit Data Content Beasiswa</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Form Edit Data Content Beasiswa</h3>
                                    </div
                                    ><!-- form start -->
                                    <form action="aksi-cpendaftaran.php" enctype="multipart/form-data"  method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                          	<td width="45%">
                                            	<div class="form-group">
                                                  <label for="exampleInputEmail1">KATEGORI CONTENT BEASISWA</label>
                                                  <input type="hidden" name="id_cbeasiswa" value="<?php echo $row['id_cbeasiswa'] ?>" />
                                                  	<select name="kategori_cbeasiswa" class="form-control">
                                                    	<option selected="selected">[ PILIH KATEGORI ]</option>
                                                        <option value="Syarat">Persyaratan Penerimaan Beasiswa</option>
                                                        <option value="Prosedur">Prosedur Penerimaan Beasiswa</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JUDUL CONTENT BEASISWA</label>
                                                  <input type="text" name="judul_cbeasiswa" value="<?php echo $row['judul_cbeasiswa'] ?>" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                         </tr>
                                         <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">ISI FORM CONTENT BEASISWA</label>
                                                  <textarea class="textarea" name="isi_cbeasiswa" placeholder="Place some text here" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['isi_cbeasiswa'] ?></textarea>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JENIS BEASISWA</label>
                                                  		<select name="kd_jenisbeasiswa" required="required" class="form-control select2" style="width: 50%;">
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
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS TAMPIL CONTENT BEASISWA</label><br />
                                                  
                                                 <label>
                                                        <input type="radio" name="status_cbeasiswa" class="flat-red" checked width="100%" value="Y"> &nbsp; &nbsp; TAMPIL
                                                 </label>
                                                 <label>
                                                        <input type="radio" name="status_cbeasiswa"  class="flat-red" width="100%" value="N" /> &nbsp; &nbsp; TIDAK TAMPIL
                                                  </label> 
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
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Content Beasiswa</a></li>
                                      <li><a href="#glyphicons" data-toggle="tab">Tambah Content Beasiswa</a></li>
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
                                            <th>JUDUL</th>
                                            <th>JENIS BEASISWA</th>
                                            <th>ISI CONTENT BEASISWA</th>
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
                                                            <td>".$dt['judul_cbeasiswa']."</td>
															<td align='justify'>".$dt['nm_jenisbeasiswa']."</td>
															<td align='justify'>".$dt['isi_cbeasiswa']."</td>";
                                                            if($_SESSION['lvl']==0){
                                                            echo"<td class='center' align=\"center\"><a href='index.php?page=5&id_cbeasiswa=".$dt['id_cbeasiswa']."' title='Edit Data'><img src=\"icon/edit.png\" /></a> ";?> | 
                                                           <a onClick="return confirm('Apakah Anda yakin menghapus nama pengguna ini ?')"<?php echo"href='aksi-cpendaftaran.php?hapus=".$dt['id_cbeasiswa']."' title='Hapus Data'><img src=\"icon/hapus.png\" /></a>";	} ?> 
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
                                      <h3 class="box-title">Form Input Data Content Beasiswa</h3>
                                    </div><!-- form start -->
                                    <form action="aksi-cpendaftaran.php" enctype="multipart/form-data" method="POST" role="form">
                                      <div class="box-body">
                                      <table class="table table-striped table-hover js-basic-example dataTable" border="0">
                                          <tr>
                                          	<td width="45%">
                                            	<div class="form-group">
                                                  <label for="exampleInputEmail1">KATEGORI CONTENT BEASISWA</label>
                                                  	<select name="kategori_cbeasiswa" class="form-control">
                                                    	<option selected="selected">[ PILIH KATEGORI ]</option>
                                                        <option value="Syarat">Persyaratan Penerimaan Beasiswa</option>
                                                        <option value="Prosedur">Prosedur Penerimaan Beasiswa</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JUDUL CONTENT BEASISWA</label>
                                                  <input type="text" name="judul_cbeasiswa" value="" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                         </tr>
                                         <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">ISI FORM CONTENT BEASISWA</label>
                                                  <textarea class="textarea" name="isi_cbeasiswa" placeholder="Place some text here" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JENIS BEASISWA</label>
                                                  		<select name="kd_jenisbeasiswa" required="required" class="form-control select2" style="width: 50%;">
                                                            <option disabled="disabled" selected="selected">[ Pilih Jenis Beasiswa ]</option>
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
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS TAMPIL CONTENT BEASISWA</label><br />
                                                  
                                                 <label>
                                                        <input type="radio" name="status_cbeasiswa" class="flat-red" checked width="100%" value="Y"> &nbsp; &nbsp; TAMPIL
                                                 </label>
                                                 <label>
                                                        <input type="radio" name="status_cbeasiswa"  class="flat-red" width="100%" value="N" /> &nbsp; &nbsp; TIDAK TAMPIL
                                                  </label> 
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

