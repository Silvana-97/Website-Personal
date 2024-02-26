<?php
	include ('../koneksi.php');
	if($_SESSION['leveluser']==0){
	$daftar=mysql_query("select * from admin order by id DESC");
	}
?>
<?php
	if ($_GET['id']){
	$id = $_GET['id'];
	$query=mysql_query("SELECT * FROM admin where id='$id'")or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	$id=$row['id'];
?>	
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active titel_tabel"><a href="#fa-icons" data-toggle="tab">EDIT DATA ADMIN</a></li>
		</ul>
			<div class="tab-content">
				<div class="box">
					<form action="aksi-admin.php" enctype="multipart/form-data"  method="POST" role="form">
                        <div class="box-body">
							<table width="100%">
								<tr>
									<td width="45%">
                                        <div class="form-group">
                                          <label class="labeling">USERNAME</label>
                                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>" style="width: 90%;">
                                          <input type="text" name="username" value="<?php echo $row['username'] ?>" style="width: 100%;">
                                        </div>
                                    </td>
                                    <td width="10%">&nbsp;</td>
                                    <td width="45%">
                                        <div class="form-group">
                                          <label class="labeling">PASSWORD</label>
                                          <input type="text" name="password" value="<?php echo $row['password'] ?>" style="width: 100%;">
                                        </div>
                                    </td>
                                </tr>
							</table><hr>
								<div class="box-footer">
									<input type="submit" name="update" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" value="Ubah">
                                    <button type="button" onclick="javascript:history.back()" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save"><span ></span> Kembali</button>
                                </div>
						</div>
					</form>
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
				<li class="active titel_tabel"><a href="#fa-icons" data-toggle="tab">TAMPIL DAFTAR ADMIN</a></li>
                <li class="titel_tabel"><a href="#glyphicons" data-toggle="tab">TAMBAH DATA ADMIN</a></li>
            </ul>
			<div class="tab-content">
				<div class="tab-pane active" id="fa-icons">
					<div class="box">
						<div class="box-body scrolltable">
							<table id="tabel" class="table table-bordered table-striped" width="100%">
								<thead>
									<tr>
										<th width="4%">No</th>
										<th width="44%">USERNAME</th>
										<th width="44%">PASSSWORD</th>
										<th width="10%" align="center">Aksi</th>
                                    </tr>
								</thead>
								<tbody>
								<?php 
									$counter = 1; 
									while ($dt=mysql_fetch_array($daftar)){
									$level_user=$dt['Level'];
									echo "
									<tr>
										<td>$counter</td>
										<td>".$dt['username']."</td>
										<td>".$dt['password']."</td>";
											if($_SESSION['lvl']==0){
												echo"<td class='center' align=\"center\">
												<a href='index.php?page=1&id=".$dt['id']."' title=\"Edit Data\"><img src=\"icon/edit.png\" />";?> | 
                                                <a onClick="return confirm('Apakah Anda yakin menghapus..???')"<?php echo"href='aksi-admin.php?hapus=".$dt['username']."' title='Hapus Data'><img src=\"icon/hapus.png\" /></a>";	} ?> 
                                    </tr>
								<?php $counter ++; } ?>
                                </tbody>
							</table>
                        </div>
                    </div>
                </div>
				<div class="tab-pane" id="glyphicons">
					<div class="box">
						<form action="aksi-admin.php" enctype="multipart/form-data" method="POST">
							<div class="box-body">
								<table width="100%">
                                    <tr>
										<td width="45%">
											<div class="form-group">
											  <label class="labeling">USERNAME</label>
											  <input type="text" name="username" value="" style="width: 100%;" placeholder="Username">
											</div>
										</td>
                                        <td width="10%">&nbsp;</td>
										<td width="45%" colspan="2">
											<div class="form-group">
											  <label class="labeling">PASSWORD</label>
											  <input type="password" name="password" value="" style="width: 100%;" placeholder="Password">
											</div>
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


