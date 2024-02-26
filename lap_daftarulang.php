
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Laporan Calon Siswa Daftar Ulang Per Tahun Ajaran</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                   				<form id="form1" name="form1" method="post" action="lap_daftarulang_ta.php" target="_blank">
                                        				<select name="kd_tahunajaran" required="required" class="form-control select2" style="width: 15%;">
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
                                                		</select><br />
                                                        <input type="submit" value="Tampilkan Data" name="submit" class="btn btn-sm btn-primary" />
                                                </form>
                                      </div><!-- /#ion-icons -->
                                    </div><!-- /.tab-content -->
                                  </div><!-- /.nav-tabs-custom -->
                                </div><!-- /.col -->
                              </div><!-- /.row -->
                        </section><!-- /.content -->

