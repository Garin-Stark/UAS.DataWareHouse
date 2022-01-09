<div class="page-header">
    <h1>Alternatif</h1>
</div>
<div class="panel panel-default">
    <!-- <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=alternatif_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=alternatif" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div> -->

    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

            <div class="form-group">
               <?php echo" <a href='#' data-target='#alternatiftambah' class='btn btn-primary btn-small' data-toggle='modal'> <span class='glyphicon glyphicon-plus'></span> Tambah</a>";?>
<!-- 

                <a data-target="#alternatiftambah" class="btn btn-primary" href="#"><span class="glyphicon glyphicon-plus"></span> Tambah</a> -->
            </div>

        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' ORDER BY kode_alternatif");
        $no=0;
        
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no ?></td>
            <td><?=$row->kode_alternatif?></td>
            <td><?=$row->nama_alternatif?></td>
            <td>
                <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&ID=<?=$row->kode_alternatif?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=<?=$row->kode_alternatif?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
    
</div>




<!-- Modal Alternatif -->
<div id="alternatiftambah" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Alternatif</h4>
    </div>
    <div class="modal-body">
        
      <?php include "?m=alternatif_tambah.php" ?>

  </div>
<!--  <div class="modal-footer">
 <button type="submit" class="btn btn-success" data-dismiss="modal">Login</button>
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div> -->
</div> 
</div>
</div>
<!-- End Modal Input Alternatif -->