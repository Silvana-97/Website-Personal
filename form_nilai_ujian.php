
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Input Nilai Ujian</a></li>
                                      <li><a href="javascript:history.back(0)"  style="text-decoration:none; background-color:#F00; color:#FF0;"><b>Kembali</b></a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                        <?php
											include("../koneksi.php");
											$ujian=mysql_query("select count(no_ujian) as urut from seleksi_ujian");
											$h_ujian=mysql_fetch_array($ujian);
											$jlh=$h_ujian[urut]+1;
											$tgl=date('Ymd');
											$akhir="UJ-$tgl-$jlh";
											$nomor_registrasi=$_POST['nomor_registrasi'];
											$slek=mysql_query("select * from calon_siswa where nomor_registrasi='$_GET[nomor_registrasi]'");
											$h_slek=mysql_fetch_array($slek);
											$slek2=mysql_query("select * from seleksi_ujian where nomor_registrasi='$_GET[nomor_registrasi]'");
											$h_slek2=mysql_fetch_array($slek2);
											$angka="[aA-zZ]";
											$angka3="[-]";
											$angka4="[!+@+#+$+%+^+&+*+(+)+-+_+{+}+;+:+'+<+>+,+?+/+|]";
											if (isset($_POST[ujian]))
												{
													if ($_POST[nilai_ujian] <="75")
														{
															$kata="TIDAK_LULUS";
															$qu="";
														}
														else
															{
															$kata="LULUS";			
															$qu="insert into siswa_baru values ('$_POST[no_ujian]','$_POST[nomor_registrasi]')";
															}
												if ($_POST[nilai_ujian] == "")
												{
												echo"<script>window.alert('Maaf, silakan lengkapi nilai ujian Anda !');
												document.location.href='javascript:history.back(0)';</script>";		
												}
												elseif (ereg($angka,$_POST[nilai_ujian]))
												{
												echo"<script>window.alert('Maaf, silakan input nilai ujian hanya dengan angka');
												document.location.href='javascript:history.back(0)';</script>";	
												}	
												elseif (ereg($angka4,$_POST[nilai_ujian]))
												{
												echo"<script>window.alert('Maaf, silakan input nilai ujian dari 0 s.d 100');
												document.location.href='javascript:history.back(0)';</script>";	
												}
												elseif (ereg($angka3,$_POST[nilai_ujian]))
												{
												echo"<script>window.alert('Maaf, silakan input nilai ujian dari 0 s.d 100');
												document.location.href='javascript:history.back(0)';</script>";	
												}
														
												else
												{
												mysql_query("insert into seleksi_ujian values('$_POST[no_ujian]','$_POST[nomor_registrasi]','$_POST[pasword]','$_POST[kd_tahunajaran]','$_POST[nilai_ujian]','$kata')");
												mysql_query($qu);
												echo"<script>window.alert('Data Ujian siswa tersebut telah tersimpan');
												document.location.href='?page=11';</script>";
												}
												}
												else{}
												
											if (isset($_POST[ujian_edit]))
												{
													if ($_POST[nilai_ujian] <="75")
														{
															$kata="TIDAK LULUS";
														}
														else
															{
																$kata="LULUS";
															}
												if ($_POST[nilai_ujian] == "")
												{
												echo"<script>window.alert('Maaf, silakan lengkapi nilai ujian Anda !');
												document.location.href='javascript:history.back(0)';</script>";		
												}
												elseif (ereg($angka,$_POST[nilai_ujian]))
												{
												echo"<script>window.alert('Maaf, silakan input nilai ujian hanya dengan angka');
												document.location.href='javascript:history.back(0)';</script>";	
												}	
												elseif (ereg($angka4,$_POST[nilai_ujian]))
												{
												echo"<script>window.alert('Maaf, silakan input nilai ujian dari 0 s.d 100');
												document.location.href='javascript:history.back(0)';</script>";	
												}
												elseif (ereg($angka3,$_POST[nilai_ujian]))
												{
												echo"<script>window.alert('Maaf, silakan input nilai ujian dari 0 s.d 100');
												document.location.href='javascript:history.back(0)';</script>";	
												}
														
												else
												{
												mysql_query("update seleksi_ujian set username='$_POST[username]' password='$_POST[pasword]' nilai_ujian='$_POST[nilai_ujian]' where nomor_registrasi='$_POST[nomor_registrasi]'");
												echo"<script>window.alert('Data Ujian siswa tersebut telah diperbaharui');
												document.location.href='?page=11';</script>";
												}
												}
												else{}	
											
											if (isset($_GET[hapusx]))
												{
													mysql_query("delete from seleksi_ujian where nomor_registrasi='$_GET[nomor_registrasi]'");
													mysql_query("delete from siswa_baru where nomor_registrasi='$_GET[nomor_registrasi]'");
													echo"<script>window.alert('Data Ujian siswa tersebut telah dihapus');
													document.location.href='javascript:history.back(0)';</script>";	
												}
												else{}
											?>
											<h1>Form Input  Data  Nilai Ujian Seleksi Siswa</h1>
											<hr>
											<style type="text/css">
											.t_x tr{background:none;
													font-size:13px;}
											</style>
											<form method="post" action="">
											<table width="72%" class="table table-bordered table-striped table-hover js-basic-example dataTable" style="font-size:13px;">
											  <tr style="background:none;">
												<td width="10%" rowspan="6" valign="top" align="center"><img src="../cpanel/pas_photo/<?php echo"$h_slek[pasphoto_siswa]"; ?>" width="190" height="220" /></td>
												<td width="33%">No Ujian</td>
												<td width="3%">=</td>
												<td width="53%">
												<input type="hidden" name="no_ujian" value="<?php echo"$akhir"; ?>">
												<input type="hidden" name="status" value="LULUS">
												<?php echo"$akhir"; ?></td>
												<td width="1%"></td>
											  </tr>
											  <tr style="background:none;">
												<td>Nomor Registrasi</td>
												<td>=</td>
												<td>
												<input type="text" name="nomor_registrasi" value="<?php echo"$h_slek[nomor_registrasi]"; ?>" class="form-control" style="width:40%" readonly></td>
												</td>
											  </tr>
											  <tr style="background:none;">
												<td>Password</td>
												<td>=</td>
												<td><input type="text" name="pasword" size="15" value="<?php echo"$h_slek[password]"; ?>" class="form-control" style="width:40%" /></td>
												<td>  
											  </tr>
                                              <tr style="background:none;">
												<td>Tahun Ajaran</td>
												<td>=</td>
												<td>
                                                		<select name="kd_tahunajaran" required="required" class="form-control select2" style="width: 40%;">
                                                            <option disabled="disabled" selected="selected">[ Pilih Tahun Ajaran ]</option>
                                                            <?php
															include"../koneksi.php";
                                                            $mapel=mysql_query("select * from tahunajaran order by kd_tahunajaran DESC");
                                                            while($t_mapel=mysql_fetch_array($mapel))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_mapel[kd_tahunajaran]"; ?>"><?php echo"$t_mapel[tahunajaran]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                                </td>
												<td>  
											  </tr>
											  <tr style="background:none;">
												<td>Nilai</td>
												<td>=</td>
												<td>
											   <input type="text" name="nilai_ujian" size="6" maxlength="3" class="form-control" style="width:40%" 
											   value="<?php if ($h_slek2[nomor_registrasi] == $h_slek[nomor_registrasi]) { echo"$h_slek2[nilai_ujian]"; } else {} ?>"> </td>
												</td>
											  </tr>
											  <tr style="background:none;">
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>
												<?php if ($h_slek2[nomor_registrasi] == $h_slek[nomor_registrasi]) {
												?>
												<a href="?page=10&hapusx&nomor_registrasi=<?php echo"$_GET[nomor_registrasi]"; ?>" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save">Hapus</a>    
												<?php
												}
												else
												{
												?>
												<input type="submit" name="ujian" value="Simpan" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save">
												<input type="reset" name="Batal" value="Batal" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save">
												<?php
												}
												?>
												<td>&nbsp;</td>
											  </tr>
											</table>
											</form>
											<p><font color="#FF0000" style="text-transform:uppercase">PERHATIAN</font></p>
											<p>
                                            	<ul>
                                                	<li>Jika Nilai <=75 maka 'Tidak Lulus', jika <= 100 maka 'Lulus dan Diterima' </li>
                                                    <li>Jika Nilainya <=75 (Dibawah)</li>
                                                </ul>
                                           	</p>
                                      
                                    </div>
                                  </div>
                                  </div>
                                  <div class="tab-pane" id="glyphicons">
                                  <div class="box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Form Input Data kelas</h3>
                                    </div><!-- form start -->
                                   
                                      </div><!-- /#ion-icons -->
                                    </div><!-- /.tab-content -->
                                  </div><!-- /.nav-tabs-custom -->
                                </div><!-- /.col -->
                              </div><!-- /.row -->
                        </section><!-- /.content -->
                        

