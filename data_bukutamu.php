<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from kontakkami order by id DESC");
}

 ?>
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Buku Tamu</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                      <table id="tabel" class="table table-bordered table-striped" width="100%" style="font-size:10px;">
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>TGL. POSTED</th>
                                            <th>NAMA TAMU</th>
                                            <th>EMAIL</th>
                                            <th>PHONE</th>
                                            <th>PESAN</th>
                                            <th>AKSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php 
                                            $counter = 1; 
                                            while ($dt=mysql_fetch_array($daftar)){
												if ($dt[status_pendaftaran]=="Y")
												{
												$kata="Aktif";
												}
												else
												{
												$kata="Tidak Aktif";
												}
                                            echo "
                                                        <tr>
                                                            <td>$counter</td>
                                                            <td>".$dt['tanggal']."</td>
                                                            <td>".$dt['nama']."</td>
                                                            <td>".$dt['email']."</td>
															<td>".$dt['phone']."</td>
															<td>".$dt['message']."</td>
															<td align=\"center\">
															<a href=hapus_tamu.php?hapus&id=$dt[id] title=\"Hapus Pesan Tamu\"><img src=\"icon/hapus.png\" /></a>
															</td>";
														?> 
                                                        </tr>
                                            <?php $counter ++; } ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                  </div>
                              </div><!-- /.row -->
                        </section><!-- /.content -->

    <script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>
