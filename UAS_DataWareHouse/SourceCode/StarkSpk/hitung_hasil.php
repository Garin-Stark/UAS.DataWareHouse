<?php

    $bobot_kriteria = get_bobot_kriteria();
    $normal_kriteria = get_normal_kriteria($bobot_kriteria);
    $data = get_hasil_analisa('', $selected);    
    $terbobot = get_terbobot($data, $normal_kriteria);
               
    $total = get_total($terbobot);
    $rank = get_rank($total);   
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Normalisasi Kriteria</h3>
    </div>
    <div class="table-responsive"> 
        <table class="table table-bordered table-striped table-hover nw">
        <thead><tr>
            <th></th>
            <?php foreach(current($data) as $key => $val):?>
            <th><?=$KRITERIA[$key]['nama_kriteria']?></th>           
            <?php endforeach?>
            <th>Total</th>
        </tr></thead>        
        <tr>
            <th>Bobot</th>
            <?php foreach($bobot_kriteria as $key => $val):?>
            <td><?=$val?></td>
            <?php endforeach?>
            <td><?=array_sum($bobot_kriteria)?></td>
        </tr>     
        <tr>
            <th>Bobot Normal</th>
            <?php foreach($normal_kriteria as $key => $val):?>
            <td><?=round($val, 4)?></td>
            <?php endforeach?>
            <td><?=array_sum($normal_kriteria)?></td>
        </tr>    
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Data Alternatif</h3>
    </div>
    <div class="table-responsive"> 
        <table class="table table-bordered table-striped table-hover nw">
        <thead><tr>
            <th></th>
            <?php foreach(current($data) as $key => $val):?>
            <th><?=$KRITERIA[$key]['nama_kriteria']?></th>           
            <?php endforeach?>
        </tr></thead>
        <?php foreach($data as $key => $val):?>
        <tr>
            <th><?=$ALTERNATIF[$key]?></th>
            <?php foreach($val as $k => $v):?>
                <td><?=$v?></td>
            <?php endforeach?>
        </tr>    
        <?php endforeach?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Normalisasi Terbobot</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <thead><tr>
            <th></th>
            <?php foreach(current($terbobot) as $key => $val):?>
            <th><?=$key?></th>           
            <?php endforeach?>
            <th>Total</th>
            <th>Rank</th>
        </tr></thead>
        <?php foreach($rank as $key => $val):?>
        <tr>
            <th><?=$ALTERNATIF[$key]?></th>
            <?php foreach($terbobot[$key] as $k => $v):?>
            <td><?=round($v, 4)?></td>
            <?php endforeach?>
            <td><?=round($total[$key], 4)?></td>
            <td><?=$rank[$key]?></td>
        </tr>    
        <?php 
        $_SESSION['selected'] = $selected;
        $db->query("UPDATE tb_alternatif SET total='$total[$key]', rank='$rank[$key]' WHERE kode_alternatif='$key'");
        endforeach?>
        </table>
    </div>
    <div class="panel-body">
        <a class="btn btn-default" target="_blank" href="cetak.php?m=hitung"><span class="glyphicon glyphicon-print"></span> Cetak</a>
    </div> 
</div>