
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Mahasiswa Yang Mendaftar</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
										<?php
                                        include("../koneksi.php");
                                        
                                        if (isset($_POST[aktifkan]))
                                            {
                                            $cari=mysql_query("select * from pendaftaran where npm='$_GET[npm]'");
                                            $h_cari=mysql_fetch_array($cari);
                                            if ($h_cari[status_pendaftaran] =="Y")
                                            {
                                            mysql_query("update pendaftaran set status_pendaftaran='$_POST[status_pendaftaran]' where npm='$_POST[npm]'");
                                            mysql_query("delete from seleksi_brks where npm='$_POST[npm]'");
                                            mysql_query("delete from seleksi_ujian where npm='$_POST[npm]'");
                                            echo"<script>window.alert('Data Pendaftar sudah di-Non-aktifkan'); document.location.href='javascript:history.back(0)';</script>";
                                            }
                                            else
                                            {	
                                            mysql_query("update pendaftaran set status_pendaftaran='$_POST[status_pendaftaran]' where npm='$_POST[npm]'");
                                            echo"<script>window.alert('Data Pendaftar sudah di-aktifkan'); document.location.href='?page=8';</script>";
                                            }
                                            }
                                        else{}
                                        
                                        $detail=mysql_query("select * from pendaftaran,jenis_beasiswa where pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa and npm='$_GET[npm]'");
                                        $h_daftar=mysql_fetch_array($detail);
                                        {
                                        ?>
                                        <form method="post" action="">
                                        <table width="78%" border="0" class="table table-striped table-hover js-basic-example dataTable">
                                          <tr>
                                            <td width="32%">Noomor Pokok Mahasiswa</td>
                                            <td width="3%">=</td>
                                            <td width="41%">
											<input type="hidden" name="npm" value="<?php echo"$h_daftar[npm]"; ?>">
											<?php echo"$h_daftar[npm]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Nama Mahasiswa</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[nm_mahasiswa]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Tempat Lahir</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[tpt_lahir]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[tgl_lahir]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[jns_kelamin]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Agama</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[agama]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Alamat Siswa</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[alamat]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Nomor Telpon Orangtua</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[no_telpon]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Alamat Lengkap Orangtua Sekarang</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[alamat_ortu]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Nama Ayah</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[nm_ayah]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Pekerjaan Ayah</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[pekerjaan_ayah]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Nama Ibu</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[nm_ibu]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Pekerjaan Ibu</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[pekerjaan_ibu]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Anak Keberapa</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[anak_keberapa]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Jumlah Anak Tanggungan Orang Tua</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[jlh_tanggungan]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Penghasilan Per Bulan</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[penghasilan_perbulan]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Jenis Rumah Orangtua</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[jenis_rumah]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Jenis Beasiswa Yang Dimohon</td>
                                            <td>=</td>
                                            <td><?php echo"$h_daftar[nm_jenisbeasiswa]";?></td>
                                          </tr>
                                          <tr>
                                            <td>Bekas Pendaftaran</td>
                                            <td>=</td>
                                            <td><?php echo"<a href='../$h_daftar[file_berkas]' target=\"_blank\">Download Berkas</a>" ?></td>
                                          </tr>
                                          <tr>
                                            <td>Status Akun Pendaftaran</td>
                                            <td>=</td>
                                            <td>
                                            <select name="status_pendaftaran" class="form-control" style="width:35%">
                                            <option selected="selected">[ Pilih Status ]</option>
                                            <option value="Y">Aktif</option>
                                            <option value="N">Non-Aktif</option>
                                            </select>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td><input type="submit" value="AKTIFKAN AKUN PENDAFTAR" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save" name="aktifkan"></td>
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

