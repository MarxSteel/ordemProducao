<?php
if (!isset($_SESSION)) session_start();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: index.php"); exit;
}

include 'config.php';
    $UserID =  $_SESSION['UsuarioID'];
    $NomeUserLogado = $_SESSION['UsuarioNome'];
    $Privilegios = mysql_connect($host, $user, $pass) or die(mysql_error());//porta, usuário, senha
                   mysql_select_db($banco) or die(mysql_error());
     $Priv = "SELECT * FROM usuarios WHERE id = $UserID";
     $Priv = mysql_query($Priv);
      while ($row = mysql_fetch_array($Priv)) {
      $IniciaOrdem = $row['opp2_io'];

    $ChamaChamados = mysql_connect($host, $user, $pass);
    mysql_select_db($banco, $ChamaChamados);
    $ChamarChamados = mysql_query("SELECT * FROM op_p2 WHERE op2_id", $ChamaChamados);
    $QntChamados = mysql_num_rows($ChamarChamados);
    $OPNumber = ($QntChamados+2);
    $Data = date('d/m/Y - H:i:s');

//DESCRITIVO DE MODELOS
//11 - PRISMA SF R01
//12 - PRISMA SF R02
//13 - PRISMA SF R03
//14 - PRISMA SF R04
//


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LiberaREP Henry Equipamentos e Sistemas</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
      if (tecla==8 || tecla==0) return true;
  else  return false;
    }
}
</script>
 <body class="hold-transition skin-blue-light fixed sidebar-mini">
  <div class="wrapper">
   <header class="main-header">
    <a href="index2.html" class="logo">
     <span class="logo-mini"><b>Henry</b></span>
     <span class="logo-lg"><b>Henry </b>Equipamentos</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
     <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Minimizar</span>
     </a>
     <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
       <li>
        <a href="logout.php" class="btn btn-danger btn-flat">Sair</a>
       </li>
      </ul>
     </div>
    </nav>
   </header>
   <aside class="main-sidebar">
     <?php include_once'menu.php'; ?>
      </aside>
<div class="content-wrapper">
 <section class="content">
  <div class="row">
   <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
     <span class="info-box-icon bg-red"><i class="fa fa-newspaper-o"></i></span>
     <div class="info-box-content">RELÓGIO DE PONTO 1510
            <button type="button" data-toggle="modal" href="#NovaOP1510" class="btn btn-default btn-block btn-flat">Nova OP</button>
     </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
   </div><!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
     <span class="info-box-icon bg-navy"><i class="ion ion-ios-gear-outline"></i></span>
     <div class="info-box-content">TESTE
      <a href="javascript::;" class="product-title"><span class="btn btn-default btn-block btn-flat" onclick="window.open('Producao2/Montagem/Compacto/E1.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=800, HEIGHT=650');">Nova Ordem</span></a>
     </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
   </div><!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
     <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
     <div class="info-box-content">TESTE
      <a class="btn btn-default btn-block btn-flat" href="producao2.php">Adicionar Pedido</a>
     </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
   </div><!-- /.col -->
   <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
     <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
     <div class="info-box-content"><?php echo $IniciaOrdem; ?>
      <a class="btn btn-default btn-block btn-flat" href="producao2.php">Adicionar Pedido</a>
     </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
   </div><!-- /.col -->
  </div>
  <section class="content">
   <div class="box">
    <div class="box-header col-sm-8">
     <h3 class="box-title">Ordens de Produção - Produção 2</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    </div><!-- /.box-body -->
     <table id="OPP2" class="table table-bordered table-striped">
      <thead>
       <tr>
        <th>Data</th>
        <th>Modelo</th>
        <th>Quantidade</th>
        <th>HOS Nr.</th>
        <th>Limite</th>
        <th></th>
        <th></th>
       </tr>
      </thead>
      <tbody>
      <?php
       $Query1510 = mysql_connect($host, $user, $pass) or die(mysql_error());//porta, usuário, senha
                    mysql_select_db($banco) or die(mysql_error());
        $Qry1510 = "SELECT * FROM hr_op2";
        $Qry1510 = mysql_query($Qry1510);
         while ($row = mysql_fetch_array($Qry1510)) {
          echo "<tr>";
          echo "<td>" . $row['op2_DtCadastro'] . "</td>";  
          echo "<td>" . $row['op2_ordem'] . "</td>";
          echo "<td>" . $row['op2_ordem'] . "</td>";
          echo "<td>" . $row['op2_ordem'] . "</td>";
          echo "<td>" . $row['op2_ordem'] . "</td>";
          echo "<td>" . $row['op2_ordem'] . "</td>";
     ?>
      <td>
       <a href="javascript::;" class="product-title">
        <span class="btn btn-primary btn-flat btn-lg btn-xs" onclick="window.open('Detalhe1510.php?ID=<?php echo $row["NumREP"]; ?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=800, HEIGHT=650');"><i class="fa fa-search"> Visualizar</i></span>
       </a>
      </td>
     <?php
      echo "</tr>";
      }
      mysql_close($Query1510); //fecha conexão com banco de dados
    ?>
                </tbody>

              </table>




   </div><!-- /.box -->
  </section><!-- /.content -->

<!-- MODAL DE CADASTRO DOS EQUIPAMENTOS 1510 -->
<!-- INÍCIO DO MODAL -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="NovaOP1510" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">Cadastrar Ordem de Produção <strong></strong></h4>
    </div>
    <div class="box-body">
     <form  name="CadastraOP2" id="name" method="post" action="" enctype="multipart/form-data">
      <div class="col-xs-3">OP Nr.:
       <input type="text" name="dia" id="dia" class="form-control" required="required" disabled="disabled" placeholder="<?php echo $OPNumber; ?>">
      </div>
      <div class="col-xs-5">Usuário Solicitante:
       <input type="text" name="dia" id="dia" class="form-control" required="required" disabled="disabled" placeholder="<?php echo $NomeUserLogado; ?>">
      </div>
      <div class="col-xs-4">Data
       <input type="text" name="dia" id="dia" class="form-control" required="required" disabled="disabled" placeholder="<?php echo $Data; ?>">
      </div>
      <div class="col-xs-8">Modelo
       <select class="form-control" name="modelo" id="modelo" required="required">
        <option value="" checked="checked"> >>SELECIONE<< </option>
        <option value=''>-----LINHA PRISMA SUPER FÁCIL-----</option>
        <option value="11">Prisma Super Fácil R01 </option>
        <option value="12">Prisma Super Fácil R02 </option>
        <option value="13">Prisma Super Fácil R03 </option>
        <option value="14">Prisma Super Fácil R04 </option>
        <option value=''>----------- LINHA HEXA -----------</option> 
        <option value='21'> Hexa A</option>
        <option value='22'> Hexa B</option>
        <option value='23'> Hexa C</option>
        <option value='24'> Hexa D</option>
        <option value='25'> Hexa E</option>
       </select>                   
      </div>
      <div class="col-xs-4">Quantidade
       <input type="number" name="quantidade" id="quantidade" class="form-control" onkeypress="return SomenteNumero(event)" required="required">
      </div>
      <div><br />
       <input name="OP_1510" type="submit" class="btn btn-success btn-block btn-flat" id="OP_1510" value="Abrir Detalhes"  />
      </div> 
      </form>
      <?php
       if(@$_POST["OP_1510"]){
        $modelo = $_POST["modelo"];
        $quantidade = $_POST["quantidade"];
        $PaginaModelo = $modelo . '.php';

        $String = $PaginaModelo . "?Quantidade=" . $quantidade . "&OP=" . $OPNumber;
        echo '<script type="text/javascript">window.open("Prod2/' . $String . '", "Pagina", "STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1100, HEIGHT=650");</script>';
        }
        ?> 
    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE CADASTRO DE NOVA OP DOS EQUIPAMENTOS 1510 -->


 </section><!-- /.content -->
   </div><!-- /.content-wrapper -->
      <?php include_once 'footer.php'; ?>
      <div class="control-sidebar-bg"></div>

    <!-- jQuery 2.1.4 -->
    <script src="dist/js/demo.js"></script>
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="dist/js/app.min.js"></script>
  </body>
 <script>
  $(function () {
    $("#OPP2").DataTable();
    $("#cad373").DataTable();
    $('#cadAcesso').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


  <?php

}
mysql_close($Privilegios);
?>

</script>
</html>
