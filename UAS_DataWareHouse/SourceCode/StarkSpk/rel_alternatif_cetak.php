<?php
$rows = $db->get_results("SELECT a.kode_alternatif, ra.kode_kriteria, ra.nilai            
        FROM tb_rel_alternatif ra 
        	INNER JOIN tb_alternatif a ON a.kode_alternatif = ra.kode_alternatif
        WHERE nama_alternatif LIKE '%".esc_field($_GET[q])."%'
        ORDER BY kode_alternatif, ra.kode_kriteria");
$data = array();   
     
foreach($rows as $row){
    $data[$row->kode_alternatif][$row->kode_kriteria]  = $row->nilai;    
}
?>
<div class="page-header">
    <h1>Nilai Bobot Alternatif</h1>
</div>
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>Kode</th>
        <th>Nama Alternatif</th>
        <?php foreach($KRITERIA as $key => $val):?>
        <th><?=$key?></th>
        <?php endforeach?>
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
</tr>
<?php endforeach;
?>
</tbody>
</table>
</div>