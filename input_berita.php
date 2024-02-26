<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
	include ('../koneksi.php');
	if($_SESSION['leveluser']==0){
	$daftar=mysql_query("select * from berita order by no DESC");
	}
?>
<?php
	if ($_GET['no']){
	$no = $_GET['no'];
	$query=mysql_query("SELECT * FROM berita where no='$no'")or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	$no=$row['no'];
?>
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active titel_tabel"><a href="#fa-icons" data-toggle="tab">Edit Data Berita</a></li>
            </ul>
			<div class="tab-content">
				<div class="box">
					<form action="aksi-berita.php" enctype="multipart/form-data"  method="POST" role="form">
                        <div class="box-body">
							<table width="100%">
								<tr>
									<td width="45%">
										<div class="form-group">
                                            <label for="exampleInputEmail1">TANGGAL POST BERITA</label>
                                            <input type="hidden" name="no" value="<?php echo $row['no'] ?>">
                                            <input type="text" class="form-control pull-right" id="datepicker" name="tanggal" style="width: 100%;" value="<?php echo $row['tanggal'] ?>">
                                        </div>
									</td>
									<td width="10%">&nbsp;</td>
									<td width="45%">
										<div class="form-group">
											<label class="labeling">KATEGORI BERITA</label>
                                                <select style="width: 100%;" name="kategori">
                                                    <option selected="selected"><?php echo $row['kategori'] ?></option>
                                                    <option>Umum</option>
                                                </select>
                                        </div>
									</td>
								</tr>
								<tr>
									<td width="100%" colspan="3">
										<div class="form-group">
											<label class="labeling">JUDUL BERITA</label>
                                            <input type="text" name="judul" value="<?php echo $row['judul'] ?>" style="width: 100%;">
                                        </div>
                                    </td>
								</tr>
								<tr>
									<td width="100%" colspan="3">
										<div class="form-group">
											<label class="labeling">ISI / CONTENT BERITA</label>
                                            <textarea class="ckeditor" id="ckedtor" name="isi"><?php echo $row['isi'] ?></textarea>
                                        </div>
									</td>
								</tr>
								<tr>
									<td width="45%">
										<div class="form-group">
											<label class="labeling">NAMA PENGIRIM / PENULIS BERITA</label>
                                            <input type="text" name="pengirim" value="<?php echo $row['pengirim'] ?>" style="width: 100%;">
                                        </div>
									</td>
									<TD width="10%">&nbsp;</TD>
									<td width="45%">
										<div class="form-group">
											<label class="labeling">FOTO TENTANG BERITA</label>
                  							<input type="file" name="photo" value="<?php echo $row['photo'] ?>">
                                        </div>
									</td>
								</tr>
								<tr>
									<td width="45%">
										<div class="form-group">
											<label class="labeling">STATUS KEAKTIFAN BERITA</label>
                                        </div>
									</td>
									<td width="10%">
										<label class="labeling">
											<input type="radio" name="status" class="labeling" checked width="100%" value="<?php echo $row['status'] ?>"> &nbsp; &nbsp; AKTIF
                                        </label>
									</td>
									<td width="45%">
										<label class="labeling">
											<input type="radio" name="status"  class="labeling" width="100%" value="<?php echo $row['status'] ?>" /> &nbsp; &nbsp; TIDAK AKTIF
                                        </label> 
                                    </td>
								</tr>
							</table><hr>
								<div class="box-footer">
                                    <input type="submit" name="update" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" value="Update">
									<button type="button" onclick="javascript:history.back()" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save">Kembali</button>
                                </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<?php } } else { ?>
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active titel_tabel"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Berita</a></li>
                <li class="titel_tabel"><a href="#glyphicons" data-toggle="tab">Tambah Berita</a></li>
            </ul>
			<div class="tab-content">
				<div class="tab-pane active" id="fa-icons">
					<div class="box">
						<div class="box-body scrolltable">
							<table id="tabel" class="table table-bordered table-striped" width="100%">
                                <thead>
									<tr>
										<th>No</th>
										<th>TANGGAL</th>
                                        <th width="11%">KATEGORI</th>
										<th>JUDUL BERITA</th>
                                        <th>PENGIRIM</th>
                                        <th>STATUS</th>
                                        <th width="6%">AKSI</th>
                                    </tr>
								</thead>
								<tbody>
								<?php 
								$counter = 1;
								while ($dt=mysql_fetch_array($daftar)){
								if ($dt[status]=="Y")
								{
									$status="Aktif";
								}
								else
								{
									$status="Tidak Aktif";
								}
                                echo "
									<tr>
										<td>$counter</td>
										<td class='center'>".$dt['tanggal']."</td>
                                        <td>".$dt['kategori']."</td>
                                        <td class='justify'>".$dt['judul']."</td>
                                        <td>".$dt['pengirim']."</td>
										<td class='center' align='center'>".$status."</td>";
                                        if($_SESSION['lvl']==0){
											echo"<td class='center'><a href='index.php?page=3&no=".$dt['no']."' title='Edit Data'><img src=\"icon/edit.png\" /></a> ";?> | 
                                            <a onClick="return confirm('Apakah Anda yakin menghapus..???')"<?php echo"href='aksi-berita.php?hapus=".$dt['no']."' title='Hapus Data'><img src=\"icon/hapus.png\" /></a>";	} ?> 
                                    </tr>
									<?php $counter ++; } ?>
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="glyphicons">
					<div class="box">
						<form action="aksi-berita.php" enctype="multipart/form-data" method="POST">
                            <div class="box-body">
								<table width="100%">
									<tr>
										<td width="45%">
											<div class="form-group">
												<label class="labeling">TANGGAL POST BERITA</label>
                                                <input type="text" id="datepicker" name="tanggal" style="width: 100%;">
                                            </div>
                                        </td>
										<td width="10%">&nbsp;</td>
                                        <td width="45%">
											<div class="form-group">
												<label class="labeling">KATEGORI BERITA</label>
                                                <select class="form-control" style="width: 100%;" name="kategori">
													<option selected="selected">Silahkan Di Pilih</option>
													<option>Umum</option>
                                                </select>
											</div>
                                        </td>
                                    </tr>
									<tr>
										<td width="100%" colspan="3">
											<div class="form-group">
												<label class="labeling">JUDUL BERITA</label>
                                                <input type="text" name="judul" value="" style="width: 100%;">
											</div>
										</td>
                                    </tr>
									<tr>
										<td width="100%" colspan="3">
											<div class="form-group">
												<textarea class="ckeditor" id="ckedtor" name="isi"></textarea>
                                            </div>
										</td>
                                    </tr>
									<tr>
										<td width="45%">
											<div class="form-group">
                                                <label class="labeling">NAMA PENGIRIM / PENULIS BERITA</label>
                                                <input type="text" name="pengirim" value="" style="width: 100%;">
                                            </div>
                                        </td>
										<TD width="10%">&nbsp;</TD>
                                        <td width="45%">
                                            <div class="form-group">
                                                <label class="labeling">FOTO TENTANG BERITA</label>
                  								<input type="file" name="photo">
                                            </div>
                                        </td>
                                    </tr>
									<tr>
										<td width="45%">
                                            <div class="form-group">
                                                  <label class="labeling">STATUS BERITA</label>
                                             </div>
                                        </td>
										<td width="10%">
											<label class="labeling">
												<input type="radio" name="status" value="1" checked width="100%"> &nbsp; &nbsp; AKTIF
                                            </label>
                                        </td>
										<td width="45%">
											<label class"labeling">
												<input type="radio" name="status"  value="0" width="100%" /> &nbsp; &nbsp; TIDAK AKTIF
                                            </label> 
                                        </td>
									</tr>
								</table><hr>
                                    <div class="box-footer">
										<input type="submit" name="tambah" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" value="Simpan">
										<input type="reset" name="submit" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" value="Batal">
                                    </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
	<?php } ?>

