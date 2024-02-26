
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Detail Calon Siswa</a></li>
                                      <li><a href="javascript:history.back(0)"  style="text-decoration:none; background-color:#F00; color:#FF0;"><b>Kembali</b></a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                        <?php
                                        include("../koneksi.php");
                                        $ada=mysql_query("select * from seleksi_brks where nomor_registrasi='$_GET[nomor_registrasi]'");
                                        $h_ada=mysql_num_rows($ada);
										$kd_tahunajaran=$_POST['kd_tahunajaran'];
                                        if (isset($_POST[aktifkan]))
                                            {
                                            $cari=mysql_query("select * from calon_siswa where nomor_registrasi='$_GET[nomor_registrasi]'");
                                            $h_cari=mysql_fetch_array($cari);
                                            if ($h_cari[status_pendaftaran] =="LULUS")
                                            {
                                            echo"<script>window.alert('Silakan Aktivasi Akun ini terlebih dahulu.'); document.location.href='javascript:history.back(0)';</script>";
                                            }
                                            else
                                            {	
                                            if ($h_ada == "")
                                            {
                                            mysql_query("insert into seleksi_brks values ('$_POST[nomor_registrasi]','LENGKAP','$_POST[status_lulus]','$_POST[kd_tahunajaran]')");
                                            echo"<script>window.alert('Data Seleksi Berkas memenuhi persyaratan'); document.location.href='?page=9';</script>";
                                            }
                                            else
                                            {
                                            mysql_query("update seleksi_brks set status_lulus='$_POST[status_lulus]', kd_tahunajaran='$_POST[kd_tahunajaran]' where nomor_registrasi='$_POST[nomor_registrasi]'");
                                            echo"<script>window.alert('Data Seleksi Berkas Berhasil di Ubah'); document.location.href='?page=9';</script>";
                                                
                                            }
                                            }
                                            
                                            }
                                        else{}
                                        
                                        $detail=mysql_query("select * from calon_siswa where nomor_registrasi='$_GET[nomor_registrasi]'");
                                        $h_daftar=mysql_fetch_array($detail);
                                        {
                                        ?>
                                        <form method="post" action="">
                                        <table width="78%" border="0" class="table table-striped table-hover js-basic-example dataTable">
                                          <tr>
                                            <td width="23%" rowspan="20">
                                            <input type="hidden" name="nomor_registrasi" value="<?php echo"$h_daftar[nomor_registrasi]"; ?>">
                                            <img src="../cpanel/pas_photo/<?php echo"$h_daftar[pasphoto_siswa]"; ?>" width="224" height="286"></td>
                                            <td width="1%">&nbsp;</td>
                                            <td colspan="3" style="background:#99CC00;">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td width="32%">No Daftar</td>
                                            <td width="3%">=</td>
                                            <td width="41%"><?php echo"$h_daftar[nomor_registrasi]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>NISN</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[nisn]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Nama Pendaftar</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[nm_siswa]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Jenis Kelamin</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[jns_kelamin]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>TTL</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[tpt_lahir]";?>, <?php echo"$h_daftar[tgl_lahir]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Jenis Kelamin</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[jns_kelamin]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Asal Sekolah</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[nm_sekolah]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Alamat Sekolah Asal</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[almt_sekolah]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Nilai UN. Bahasa Indonesia</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[bhs_indo]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Nilai UN. Bahasa Inggris</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[bhs_ing]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Nilai UN. Matematik</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[matematika]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Nilai UN. Ilmu Pengetahuan Alam</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[ipa]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Nilai UN. Ilmu Pengetahuan Sosial</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[ips]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Nilai UN. PPKn</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[ppkn]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Total Nilai Ujian Nasional</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[nun]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Tanggal Daftar</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[tgl_daftar]";?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Bekas Pendaftaran</td>
                                            <td>=</td>
                                            <td><?php echo"<a href='../cpanel/kwi/$h_daftar[berkas_ijazah]' target=\"_blank\">Download Berkas</a>" ?></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Status Berkas Calon Siswa</td>
                                            <td>=</td>
                                            <td>
                                            <select name="status_lulus" class="form-control" style="width:65%">
                                            <option selected="selected">[ Pilih Status ]</option>
                                            <option value="LULUS">LULUS SELEKSI BERKAS</option>
                                            <option value="TIDAK_LULUS">TIDAK LULUS SELEKSI BERKAS</option>
                                            </select>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>Tahun Ajaran</td>
                                            <td>=</td>
                                            <td>
                                            <select name="kd_tahunajaran" required="required" class="form-control select2" style="width: 65%;">
                                                            <option disabled="disabled" selected="selected">[ Pilih Tahun Ajaran ]</option>
                                                            <?php
                                                            $sel=mysql_query("select * from tahunajaran order by kd_tahunajaran DESC");
                                                            while($t_sel=mysql_fetch_array($sel))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_sel[kd_tahunajaran]"; ?>"><?php echo"$t_sel[tahunajaran]"; ?></option>
                                                            <?php
                                                            }
                                                            ?>   
                                                		</select>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td><input type="submit" value="UBAH STATUS KELULUSAN BERKAS" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" name="aktifkan"></td>
                                          </tr>
                                        </table>
                                        </form>
                                        <?php
                                        }
                                        ?>
                                      
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
                        

