<?php
$data = get_hasil_analisa(esc_field($_GET['q']));        
?>
<div class="page-header">
    <h1>Nilai Bobot Alternatif</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<form class="form-inline">
    <input type="hidden" name="m" value="rel_alternatif" />
    <div class="form-group">
        <input class="form-control" type="text" name="q" value="<?=$_GET['q']?>" />
    </div>
    <div class="form-group">
        <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
    </div>
    <div class="form-group">
        <a class="btn btn-default" href="cetak.php?m=rel_alternatif" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
    </div>
</form>
</div>
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>Kode</th>
        <th>Nama Alternatif</th>
        <?php foreach($KRITERIA as $key => $val):?>
        <th><?=$key?></th>
        <?php endforeach?>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php 
foreach($data as $key => $val):?>
<tr>
    <td><?=$key?></td>
    <td><?=$ALTERNATIF[$key];?></td>
    <?php foreach($val as $k => $v):?>
    <td><?=$v?></td>               
    <?php endforeach?>
    <td>
        <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=<?=$key?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>        
    </td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>