
<div class="page-header">
    <h1>Kriteria</h1>
</div>
<!-- <div class="panel panel-default"> -->
   <!--  <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="kriteria" /> -->
         <!--    <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div> -->
          <!--   <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div> -->
        <!--     <div class="form-group">
                <a class="btn btn-primary" href="?m=kriteria_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div> -->
          <!--   <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=kriteria" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div> -->
        <!-- </form>
    </div> -->
    <div class="form-group">
     
     <a href='#' data-target='#add_modal' class='btn btn-primary btn-small' data-toggle='modal'> <span class="glyphicon glyphicon-plus"></span> Tambah</a>
               <!--  <a class="btn btn-primary" href="?m=kriteria_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a> -->
            </div>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_kriteria WHERE nama_kriteria LIKE '%$q%' ORDER BY kode_kriteria");
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?=$row->kode_kriteria ?></td>
            <td><?=$row->nama_kriteria?></td>
            <td><?=$row->bobot?></td>
            <td>
           
              <a style="cursor: pointer;" onclick="select_data('<?=$row->kode_kriteria ?>',
			  '<?=$row->nama_kriteria ?>',
			  '<?=$row->bobot ?>')" <i data-toggle="modal" data-target="#edit_modal" class="btn btn-primary"> Edit </i> </a>


                <a class="btn btn-xs btn-danger" href="aksi.php?act=kriteria_hapus&ID=<?=$row->kode_kriteria?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
        </table>
    </div>





      <!-- Edit Kriteria -->
    <div id="edit_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Kriteria</h4>
        </div>
        <div class="modal-body">
          <?php include "kriteria_ubah.php"; ?>

      </div>
      <!--  <div class="modal-footer">
       <button type="submit" class="btn btn-success" data-dismiss="modal">Login</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
      </div> 
      </div>
      </div>
      <!-- End Modal Edit Kriteria -->






      <!-- Tambah Kriteria -->
    <div id="add_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Kriteria</h4>
        </div>
        <div class="modal-body">
            
          <?php include "kriteria_tambah.php"; ?>

      </div>
      <!--  <div class="modal-footer">
       <button type="submit" class="btn btn-success" data-dismiss="modal">Login</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
      </div> 
      </div>
      </div>
      <!-- End Modal Tambah Kriteria -->
	  
	  
	  
<script type="text/javascript">
function select_data($kode_kriteria,$nama_kriteria,$bobot){
$("#tkode").val($kode_kriteria);
$("#tnama").val($nama_kriteria);
$("#tbobot").val($bobot);
}
</script>	  