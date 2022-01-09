<div class="page-header">
    <h1>Perhitungan</h1>
</div>
<form method="post">
    <input type="hidden" name="m" value="hasil" />
    <div class="panel panel-default">
        <div class="panel-heading">        
            <h3 class="panel-title">Pilih Alternatif</h3>
        </div>
        <div class="list-group">
        <?php
        if($_POST){
            $selected = (array) $_POST['selected'];
            $success = false;
            if(count($selected)<2){
                echo '<div class="panel-body">';
                print_msg('Pilih minimal 2 alternatif!');
                echo '</div>';
            } else {
                $success = true;
            }
        }
        $rows = $db->get_results("SELECT * FROM tb_alternatif ORDER BY kode_alternatif");
        
        foreach($rows as $row):?>
        <div class="list-group-item">
            <label>
                <input type="checkbox" name="selected[<?=$row->kode_alternatif?>]" value="<?=$row->kode_alternatif?>" <?=$selected[$row->kode_alternatif] ? 'checked' : ''?> />
                <?=$row->nama_alternatif?>
            </label>
        </div>
        <?php endforeach;
        ?>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Hitung</button>
        </div>
    </div>
</form>
<?php
if($success)
    include 'hitung_hasil.php';
?>
<script>
$(function(){
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});
</script>