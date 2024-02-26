<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from tb_guru order by nip DESC");
}

 ?>
 <?php
 if ($_GET['nip']){
 $nip = $_GET['nip'];
							$query=mysql_query("SELECT * FROM tb_guru where nip='$nip'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							?>
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active titel_tabel"><a href="#fa-icons" data-toggle="tab">Edit Data Guru</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Form Edit Data Guru</h3>
                                    </div
                                    ><!-- form start -->
                                    <form action="aksi-guru.php" enctype="multipart/form-data"  method="POST" role="form">
                                      <div class="box-body">
                                      <table width="100%">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >NOMOR INDUK PEGAWAI (NIP)</label>
                                                  <input type="text" name="nip" value="<?php echo $row['nip'] ?>" readonly="readonly" style="width: 100%;"  data-inputmask="'mask': ['999999999999999999]', '+099 99 99 9999[9]-9999']" data-mask>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >NAMA GURU</label>
                                                  <input type="text" name="nama_guru" value="<?php echo $row['nama_guru'] ?>" style="width: 100%;" >
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >TEMPAT LAHIR GURU</label>
                                                  <input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir'] ?>" style="width: 100%;" >
                                                </div>
                                            </td>
                                          	<td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >TANGGAL LAHIR GURU</label>
                                                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_lahir" style="width: 100%;" value="<?php echo $row['tanggal_lahir'] ?>">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >JENIS KELAMIN</label>
                                                  <br />
                                                  <input type=radio name='jenis_kelamin' value='L'>Laki-Laki &nbsp; &nbsp; 
                                                  <input type=radio name='jenis_kelamin' value='P'>Perempuan
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >AGAMA</label>
                                                  <select name="agama" required="required" class="form-control select2" style="width: 100%;">
                                                        <option disabled="disabled" selected="selected"><?php echo $row['agama'] ?></option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                                        <option value="Kristen Katholik">Kristen Katholik</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Konghuchu">Konghuchu</option>
                                                  </select>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >ALAMAT</label>
                                                  <input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" style="width: 100%;" >
                                                  
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >NOMOR TELEPON / HANDPHONE GURU</label>
                                                  <input type="text"  value="<?php echo $row['nomor_telpon'] ?>" name="nomor_telpon" data-inputmask="'mask': ['999 999 999 999]', '+099 99 99 9999[9]-9999']" data-mask>                                                  
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >GOLONGAN</label>
                                                  <select name="golongan" required="required" class="form-control select2" style="width: 100%;">
                                                        <option disabled="disabled" selected="selected"><?php echo $row['golongan'] ?></option>
                                                        <option value="III A">III A</option>
                                                        <option value="III B">III B</option>
                                                        <option value="III C">III C</option>
                                                        <option value="III D">III D</option>
                                                        <option value="IV A">IV A</option>
                                                        <option value="IV B">IV B</option> 
                                                        <option value="IV D">IV D</option> 
                                                        <option value="IV E">IV E</option> 
                                                  </select>                                                  
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >JABATAN</label>
                                                  	<select name="jabatan" required="required" class="form-control select2" style="width: 100%;">
                                                        <option disabled="disabled" selected="selected"><?php echo $row['jabatan'] ?></option>
                                                        <option value="Guru Pertama">Guru Pertama</option>
                                                        <option value="Guru Muda">Guru Muda</option>
                                                        <option value="Guru Madya">Guru Madya</option>
                                                        <option value="Guru Utama">Guru Utama</option>
                                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                        <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option> 
                                                        <option value="Kepala Laboratorium">Kepala Laboratorium</option> 
                                                        <option value="Ketua Program Keahlian">Ketua Program Keahlian</option>  
                                                  </select>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >PENDIDIKAN TERAKHIR</label>
                                                  <select name="pendidikan_terakhir" required="required" class="form-control select2" style="width: 100%;">
                                                        <option disabled="disabled" selected="selected"><?php echo $row['pendidikan_terakhir'] ?></option>
                                                        <option value="D3">D3</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                  </select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >JURUSAN TERAKHIR PADA SAAT PENDIDIKAN TERAKHIR</label>
                                                  <input type="text" name="jurusan_terakhir" value="<?php echo $row['jurusan_terakhir'] ?>" style="width: 100%;" >
                                                </div>
                                            </td>
                                          </tr>
                                        <tr>
                                        	<td width="45%">
                                            	<div class="form-group">
                                                  <label>TAHUN TAMAT PENDIDIKAN</label>
                                                  <input type="text" name="tahun_tamat" value="<?php echo $row['tahun_tamat'] ?>" style="width: 100%;" >
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label>PAPHOTO GURU</label>
                  								  <input type="file" name="photo"  value="<?php echo $row['photo'] ?>">
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
                                      <li class="active titel_tabel"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Guru</a></li>
                                      <li class="titel_tabel"><a href="#glyphicons" data-toggle="tab">Tambah Guru</a></li>
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
                                            <th>NAMA GURU</th>
                                            <th>TPT /  TGL. LAHIR</th>
                                            <th>ALAMAT</th>
                                            <th>NO. TELPON</th>
                                            <th>GOLONGAN</th>
                                            <th>JABATAN</th>
                                            <th>AKSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php 
                                            $counter = 1; 
                                            while ($dt=mysql_fetch_array($daftar)){
                                            echo "
                                                        <tr>
                                                            <td>$counter</td>
                                                            <td>".$dt['nama_guru']."</td>
                                                            <td>".$dt['tempat_lahir']." / ".$dt['tanggal_lahir']."</td>
                                                            <td>".$dt['alamat']."</td>
                                                            <td class='center'>".$dt['nomor_telpon']."</td>
                                                            <td class='center'>".$dt['golongan']."</td>
															<td>".$dt['jabatan']."</td>";
                                                            if($_SESSION['lvl']==0){
                                                            echo"<td class='center'><a href='index.php?page=8&nip=".$dt['nip']."' title='Edit Data'><img src=\"icon/edit.png\" /></a> ";?> | 
                                                           <a onClick="return confirm('Apakah Anda yakin menghapus nama pengguna ini ?')"<?php echo"href='aksi-guru.php?hapus=".$dt['nip']."' title='Hapus Data'><img src=\"icon/hapus.png\" /></a>";	} ?> 
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
                                      <h3 class="box-title">Form Input Data Guru</h3>
                                    </div><!-- form start -->
                                    <form action="aksi-guru.php" enctype="multipart/form-data" method="POST" role="form">
                                      <div class="box-body">
                                      <table width="100%">
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >NOMOR INDUK PEGAWAI (NIP)</label>
                                                  <input type="text" name="nip" value="" style="width: 100%;" maxlength="18"  placeholder="0123456789" data-inputmask="'mask': ['999999999999999999]', '+099 99 99 9999[9]-9999']" data-mask>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >NAMA GURU</label>
                                                  <input type="text" name="nama_guru"  placeholder="Esti H. E. Sihombing"value="" style="width: 100%;" >
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >TEMPAT LAHIR GURU</label>
                                                  <input type="text" name="tempat_lahir" placeholder="Medan" value="" style="width: 100%;" >
                                                </div>
                                            </td>
                                          	<td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >TANGGAL LAHIR GURU</label>
                                                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_lahir" style="width: 100%;" placeholder="01/12/2017">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >JENIS KELAMIN</label>
                                                  <br />
                                                  <input type=radio name='jenis_kelamin' value='L'>Laki-Laki &nbsp; &nbsp; 
                                                  <input type=radio name='jenis_kelamin' value='P'>Perempuan
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >AGAMA</label>
                                                  <select name="agama" required="required" class="form-control select2" style="width: 100%;">
                                                        <option disabled="disabled" selected="selected">.::. Pilih Agama .::.</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                                        <option value="Kristen Katholik">Kristen Katholik</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Konghuchu">Konghuchu</option>
                                                  </select>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >ALAMAT</label>
                                                  <input type="text" name="alamat"  placeholder="Jln. Djamin Ginting Gang Keluarga No. 4 Kel. Padang Bulan, Medan" style="width: 100%;" >
                                                  
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >NOMOR TELEPON / HANDPHONE GURU</label>
                                                  <input type="text"  name="nomor_telpon" data-inputmask="'mask': ['999 999 999 999]', '+099 99 99 9999[9]-9999']" data-mask  style="width: 100%;" placeholder="085297152811">                                                  
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >GOLONGAN</label>
                                                  <select name="golongan" required="required" class="form-control select2">
                                                        <option disabled="disabled" selected="selected">..:: Pilih Golongan ::..</option>
                                                        <option value="III A">III A</option>
                                                        <option value="III B">III B</option>
                                                        <option value="III C">III C</option>
                                                        <option value="III D">III D</option>
                                                        <option value="IV A">IV A</option>
                                                        <option value="IV B">IV B</option> 
                                                        <option value="IV D">IV D</option> 
                                                        <option value="IV E">IV E</option> 
                                                  </select>                                                  
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >JABATAN</label>
                                                  	<select name="jabatan" required="required" class="form-control select2" style="width: 100%;">
                                                        <option disabled="disabled" selected="selected">..:: Pilih Jabatan ::..</option>
                                                        <option value="Guru Pertama">Guru Pertama</option>
                                                        <option value="Guru Muda">Guru Muda</option>
                                                        <option value="Guru Madya">Guru Madya</option>
                                                        <option value="Guru Utama">Guru Utama</option>
                                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                        <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option> 
                                                        <option value="Kepala Laboratorium">Kepala Laboratorium</option> 
                                                        <option value="Ketua Program Keahlian">Ketua Program Keahlian</option>  
                                                  </select>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >PENDIDIKAN TERAKHIR</label>
                                                  <select name="pendidikan_terakhir" required="required" class="form-control select2" style="width: 100%;">
                                                        <option disabled="disabled" selected="selected">..:: Pilih Pendidikan Terakhir ::..</option>
                                                        <option value="D3">D3</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                  </select>
                                                </div>
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label >JURUSAN TERAKHIR PADA SAAT PENDIDIKAN TERAKHIR</label>
                                                  <input type="text" name="jurusan_terakhir" placeholder="Teknik Mesin" style="width: 100%;" >
                                                </div>
                                            </td>
                                          </tr>
                                        <tr>
                                        	<td width="45%">
                                            	<div class="form-group">
                                                  <label>TAHUN TAMAT PENDIDIKAN</label>
                                                  <input type="text" name="tahun_tamat" placeholder="2017" style="width: 100%;" >
                                            </td>
                                            <td width="10%">&nbsp;</td>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label>PAPHOTO GURU</label>
                  								  <input type="file" name="photo"/>
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

