
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Laporan Permohonan Beasiswa Per Jenis Beasiswa</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                   				<label>TAMPILKAN DAFTAR PERMOHONAN BEASISWA PER JENIS BEASISWA</label>
                                   				<form id="form1" name="form1" method="post" action="lap_permohonan_per_jenis_pdf.php" target="_blank">
                                        				<select name="kd_jenisbeasiswa" required="required" class="form-control select2" style="width: 55%;">
                                                            <option disabled="disabled" selected="selected">[ Pilih Jenis Beasiswa ]</option>
                                                            <?php
															include"../koneksi.php";
                                                            $mapel=mysql_query("select * from jenis_beasiswa order by kd_jenisbeasiswa DESC");
                                                            while($t_mapel=mysql_fetch_array($mapel))
                                                            {	
                                                            ?>
                                                            <option value="<?php echo"$t_mapel[kd_jenisbeasiswa]"; ?>"><?php echo"$t_mapel[nm_jenisbeasiswa]"; ?></option>
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

