<?php
error_reporting(~E_NOTICE & ~E_DEPRECATED);
session_start();

include 'config.php';
include'includes/ez_sql_core.php';
include'includes/ez_sql_mysqli.php';
$db = new ezSQL_mysqli($config['username'], $config['password'], $config['database_name'], $config['server']);
include'includes/general.php';    
    
$mod = $_GET['m'];
$act = $_GET['act'];

$rows = $db->get_results("SELECT kode_alternatif, nama_alternatif FROM tb_alternatif ORDER BY kode_alternatif");
$ALTERNATIF = array();
foreach($rows as $row){
    $ALTERNATIF[$row->kode_alternatif] = $row->nama_alternatif;
}

$rows = $db->get_results("SELECT kode_kriteria, nama_kriteria, bobot FROM tb_kriteria ORDER BY kode_kriteria");
$KRITERIA = array();
foreach($rows as $row){
    $KRITERIA[$row->kode_kriteria] = array(
        'nama_kriteria'=>$row->nama_kriteria,        
        'bobot'=>$row->bobot,
    );
}

function get_bobot_kriteria(){
    global $KRITERIA;
    $arr = array();
    foreach($KRITERIA as $key => $val){
        $arr[$key] = $val['bobot'];
    }
    return $arr;
}

function get_normal_kriteria($bobot_kriteria){
    $arr = array();
    $sum = array_sum($bobot_kriteria);
    foreach($bobot_kriteria as $key => $val){
        $arr[$key] = ($sum==0) ? 0 : $val / $sum;
    }
    return $arr;
}

function get_rank($array){
    $data = $array;
    arsort($data);
    $no=1;
    $new = array();
    foreach($data as $key => $value){
        $new[$key] = $no++;
    }
    return $new;
}
 
function get_hasil_analisa($search = '', $alternatif = array()){
    global $db;

    $where = $alternatif ? " AND ra.kode_alternatif IN ('". implode("','", $alternatif) ."')" : '';

    $rows = $db->get_results("SELECT a.kode_alternatif, k.kode_kriteria, ra.nilai
        FROM tb_alternatif a 
        	INNER JOIN tb_rel_alternatif ra ON ra.kode_alternatif=a.kode_alternatif
        	INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria
        WHERE (a.kode_alternatif LIKE '%$search%' OR a.nama_alternatif LIKE '%$search%') $where
        ORDER BY a.kode_alternatif, k.kode_kriteria");
    $data = array();
    foreach($rows as $row){
        $data[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;
    }
    return $data;
}

function get_terbobot($data, $normal_kriteria){    
    $arr = array();    
    foreach($data as $key => $val){                
        foreach($val as $k => $v){
            $arr[$key][$k] = $v * $normal_kriteria[$k];
        }
    }        
    return $arr;
}

function get_total($terbobot){
    $arr = array();    
    foreach($terbobot as $key => $val){ 
        foreach($val as $k => $v){
            $arr[$key]+=$v;
        }
    }            
    return $arr;
}

function get_atribut_option($selected = ''){
    $atribut = array('benefit'=>'Benefit', 'cost'=>'Cost');   
    foreach($atribut as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}