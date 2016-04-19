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
    $IDEquip = strip_tags($_GET["ID"]);
    $ChamaOP = mysql_connect($host, $user, $pass) or die(mysql_error());//porta, usuário, senha
                   mysql_select_db($banco) or die(mysql_error());
      $Qry1510 = "SELECT * FROM hop_p2 WHERE opp2_id = '$IDEquip'";
      $Qry1510 = mysql_query($Qry1510);
      while ($row = mysql_fetch_array($Qry1510)) {
        $Op2Modelo = $row['opp2_modelo'];
        $Op2OP = $row['opp2_hos'];
        $Op2Qt = $row['opp2_quantidade'];
        $Op2DataCadastro = $row['opp2_datacadastro'];
        $Op2DataLimite = $row['opp2_datalimite'];
        $Op2DataFinalizado = $row['opp2_datafinalizado'];
        $Op2Usuario = $row['opp2_usuario'];
        $Op2Status = $row['opp2_status'];
        $Op2Perifericos = $row['opp2_periferico'];
        $Op2Chicotes = $row['opp2_chicote'];

?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Produção Henry</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
 </head>
 <body class="hold-transition skin-blue-light layout-top-nav">
  <div class="wrapper">
   <header class="main-header">
    <nav class="navbar navbar-static-top">
     <div class="container">
      <div class="navbar-header">
       <a href="" class="navbar-brand"><b>Henry </b>Equipamentos &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<code>Controle de PCP</code></a>         
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
       </button>
      </div>
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse"></div><!-- /.navbar-collapse -->
      <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Olá, <?php echo $NomeUserLogado; ?>          </a>
        </li>
       </ul>
      </div><!-- /.navbar-custom-menu -->
     </div><!-- /.container-fluid -->
    </nav>
   </header>
   <div class="content-wrapper">
    <div class="container">
     <section class="content">
      <div class="box box-default">
       <section class="content-header">
        <h1>Henry Equipamentos e Sistemas - Ordem de Produção - Produção 2</h1>
       </section>
         <section class="content">
          <div class="row">
           <div class="col-xs-4">
            Modelo: 
            <h4><code><?php echo $Op2Modelo; ?></code></h4>
           </div>
           <div class="col-xs-3">
            Número de OP: 
            <h4><code><?php echo $Op2OP; ?></code></h4>
           </div>
           <div class="col-xs-2">
            Qtd Solicitada:
            <h4><code><?php echo $Op2Qt; ?></code></h4>
           </div>
           <div class="col-xs-3">
            Usuário Solicitante
            <h4><code><?php echo $Op2Usuario; ?></code></h4>
           </div>
           <div class="col-xs-4">
            Data Solicitado: 
            <h4><code><?php echo $Op2DataCadastro; ?></code></h4>
           </div>
           <div class="col-xs-3">
            Data Limite: 
            <h4><code><?php echo $Op2DataLimite; ?></code></h4>
           </div>
           <div class="col-xs-2">
            Data Finalizado:
            <h4><code><?php echo $Op2DataFinalizado; ?></code></h4>
           </div>
           <div class="col-xs-3">
            Status
            <h4><code><?php echo $Op2Status; ?></code></h4>
           </div>
           <section class="content-header"><br /><br /><br />
            <h4><i>Periféricos</i></h4>
             <?php
              echo $Op2Perifericos;
              ?>
              <h4><i>Chicotes</i></h4>
              <?php
              echo $Op2Chicotes;
              ?>
           </section>
            </div><!-- /.box -->
           </div><!-- /.col -->
          </div><!-- /.row -->
         </section><!-- /.content -->
        </div>
       </div>
      </div>
     </div><!-- /.box-body -->
    </div><!-- /.box -->
   </div><!-- /.container -->
  </div><!-- /.content-wrapper -->
  </section>
 <?php include_once 'footer.php'; ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>

    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>


    <!-- Bootstra 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->

  </body>
<?php 
}
?>
</html>
