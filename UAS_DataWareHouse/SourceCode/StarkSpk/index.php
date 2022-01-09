<?php
include'functions.php';
//if(empty($_SESSION[login]))
    //header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    


    <link href="cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"/>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Sistem Pendukung Keputusan(SPK) Simple Multy Attribute Rating (SMART). Studi kasus: Penentuan beasiswa untuk mahasiswa."/>
    <meta name="keywords" content="Sistem Pendukung Keputusan, Decision Support System, Simple Multy Attribute Rating, SMART, Pemberian Beasiswa, Tugas Akhir, Skripsi, Jurnal, Source Code, PHP, MySQL, CSS, JavaScript, Bootstrap, jQuery"/>
    <meta name="author" content="TugasAkhir.Id"/>
    <link rel="icon" href="favicon.png"/>
    <link rel="canonical" href="https://tugasakhir.id/demo/spk-smart/" />
    
    <title>Source Code SPK Metode SMART</title>
    <link href="assets/css/lumen-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>           
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?">SPK SMART</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php if($_SESSION['login']):?>
            <li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
            <li class="dropdown">
                <a href="?m=alternatif" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Alternatif <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?m=alternatif"><span class="glyphicon glyphicon-user"></span> Alternatif</a></li>
                    <li><a href="?m=rel_alternatif"><span class="glyphicon glyphicon-star"></span> Nilai Alternatif</a></li>
                </ul>
            </li>
            <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>    
            <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
            <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> 
            <?php else: ?>            
            <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>                
            <li data-toggle="modal" data-target="#mylogin"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
            <?php endif?>                
          </ul>          
        </div>
      </div>
    </nav>

    <div class="container">
    <?php
        if(!in_array($mod, array('login', 'password', 'hitung')) && !$_SESSION['login'])
            $mod='home';
        if(file_exists($mod.'.php'))
            include $mod.'.php';
        else
            include 'home.php';
    ?>
    </div>
    <footer class="footer bg-primary">
      <div class="container">
        <p>Copyright &copy; <?=date('Y')?> Stark.com <em class="pull-right">Diupdate tanggal 10 Januari 2022</em> | Repost by <a style="color: white;" href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>Stark.com</a>
        </p>
      </div>
    </footer>



    <!-- Modal login -->
    <div id="mylogin" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Login Admin</h4>
        </div>
        <div class="modal-body">
            
          <?php include "login.php"; ?>

      </div>
<!--  <div class="modal-footer">
 <button type="submit" class="btn btn-success" data-dismiss="modal">Login</button>
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div> -->
</div> 
</div>
</div>
<!-- End Modal Login -->



    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>  
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>



</body>
</html>