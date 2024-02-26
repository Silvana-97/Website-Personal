<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="jscripts/standart.js"></script>
<?php
include ('../koneksi.php');
if($_SESSION['leveluser']==0){
$daftar=mysql_query("select * from content order by id_content ASC");
}

 ?>
 <?php
 if ($_GET['id_content']){
 $id_content = $_GET['id_content'];
							$query=mysql_query("SELECT * FROM content where id_content='$id_content'")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$no=$row['no'];
							?>
                            <link rel="stylesheet" href="css/jquery.dataTables.min.css">
                            <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
                             <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a href="#fa-icons" data-toggle="tab">Edit Data Content Website</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="box">
                                    <div class="box-header with-border">
                                    	<p>&nbsp;</p>
                                      <h3 class="box-title">Form Edit Data Content Website</h3><p>&nbsp;</p>
                                    </div><!-- form start -->
                                    <form action="aksi-content.php" enctype="multipart/form-data"  method="POST" role="form">
                                      <div class="box-body">
                                      <table width="100%">
                                          <tr>
                                            <td width="100%"  colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">JUDUL CONTENT WEBSITE</label>
                                                  <input type="hidden" name="id_content" value="<?php echo $row['id_content'] ?>">
                                                  <input type="text" name="judul_content" value="<?php echo $row['judul_content'] ?>" style="width: 100%;" class="form-control" id="exampleInputUsername">
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="100%" colspan="3">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">ISI / CONTENT WEBSITE</label>
                                                  <textarea class="textarea" name="isi_content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['isi_content'] ?></textarea>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="45%">
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">STATUS KEAKTIFAN CONTENT</label>
                                             </div>
                                             </td>
                                             <td width="10%">
                                                 <label>
                                                        <input type="radio" name="status_content" class="flat-red" checked width="100%" value="Y"> &nbsp; &nbsp; AKTIF
                                                 </label>
                                             </td>
                                             <td width="45%">
                                                 <label>
                                                        <input type="radio" name="status_content"  class="flat-red" width="100%" value="N" /> &nbsp; &nbsp; TIDAK AKTIF
                                                  </label> 
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
                                      <li class="active titel_tabel"><a href="#fa-icons" data-toggle="tab">Tampilkan Daftar Content</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <!-- Font Awesome Icons -->
                                      <div class="tab-pane active" id="fa-icons">
                                   <div class="box">
                                    <div class="box-body scrolltable">
                                      <table id="tabel" class="table table-striped table-bordered" width="100%" cellspacing="0" style="font-size:12px">
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>JUDUL CONTENT</th>
                                            <th width="7%">STATUS</th>
                                            <th width="8%">AKSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
											<?php 
                                            $counter = 1; 
                                            while ($dt=mysql_fetch_array($daftar)){
                                            echo "
                                                        <tr>
                                                            <td>$counter</td>
                                                            <td>".$dt['judul_content']."</td>
															<td align=\"center\">".$dt['status_content']."</td>
															<td class='center'><a href='index.php?page=2&id_content=".$dt['id_content']."' title='Edit Data'><img src=\"icon/edit.png\" /></a> ";?> 
                                                        </tr>
                                            <?php $counter ++; } ?>
                                        </tbody>
                                        <p>&nbsp;</p>
                                      </table>
                                      
                                    </div>
                                  </div>
                                  </div><!-- /.nav-tabs-custom -->
                                </div><!-- /.col -->
                              </div><!-- /.row -->
                        </section><!-- /.content -->
	<?php } ?>
    <script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>

