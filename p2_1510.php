<?php

// A sessão precisa ser iniciada em cada página diferente
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
    $ChamaChamados = mysql_connect($host, $user, $pass);
    mysql_select_db($banco, $ChamaChamados);
    $ChamarChamados = mysql_query("SELECT * FROM hryop_p2 WHERE opp2_id IS NOT NULL", $ChamaChamados);
    $QntChamados = mysql_num_rows($ChamarChamados);
    $OPNumber = "HOPP2-" . ($QntChamados+1);
    $Data = date('d/m/Y - H:i:s');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Henry Equipamentos | Guia de Produção</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  </head>
<body class="hold-transition skin-blue layout-top-nav">
 <div class="wrapper">
  <header class="main-header">
   <nav class="navbar navbar-static-top">
    <div class="container">
     <div class="navbar-header">
      <a href="" class="navbar-brand"><b>Henry </b>Equipamentos</a>
     </div>
     <div class="collapse navbar-collapse pull-left" id="navbar-collapse"></div><!-- /.navbar-collapse -->
      <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
           <a><span class="hidden-xs">Olá, <?php echo $NomeUserLogado; ?></span></a>
        </li>
       </ul>
      </div><!-- /.navbar-custom-menu -->
     </div><!-- /.container-fluid -->
    </nav>
   </header>
   <div class="content-wrapper">
    <div class="container">
     <section class="content-header">
      <div class="box box-default">
       <div class="box-header with-border"><h3 class="box-title">Passo 5: Finalizar Cadastro</h3></div>
        <div class="box-body">
         <div class="span12">
          <form  name="CadastraOP2" id="name" method="post" action="" enctype="multipart/form-data">
           <div class="col-xs-3">Ordem de Produção Nr.:
            <input type="text" name="dia" id="dia" class="form-control" required="required" disabled="disabled" placeholder="<?php echo $OPNumber; ?>">
           </div>
           <div class="col-xs-6">Usuário Solicitante:
            <input type="text" name="dia" id="dia" class="form-control" required="required" disabled="disabled" placeholder="<?php echo $NomeUserLogado; ?>">
           </div>
           <div class="col-xs-3">Data
            <input type="text" name="dia" id="dia" class="form-control" required="required" disabled="disabled" placeholder="<?php echo $Data; ?>">
           </div>
           <div class="col-xs-6">Mês
            <select class="form-control" name="mes" id="mes" required="required">
             <option value="" checked="checked"> >>SELECIONE<<</option>
             <option value=''>-----LINHA PRISMA SUPER FÁCIL-----</option>
             <option value="">Prisma Super Fácil R01 </option>
             <option value="">Prisma Super Fácil R02 </option>
             <option value="">Prisma Super Fácil R03 </option>
             <option value="">Prisma Super Fácil R04 </option>
         </select>                   
        </div>

       </div>

        <tr><br />
         <td><input name="DiarioUsuario" type="submit" class="btn btn-success btn-block btn-flat" id="DiarioUsuario" value="Abrir Relatório Dário"  /></td>
        </tr>
       </table>
      </form>
       





           
          </div>
         </div><!-- /.box-body -->
        </div>
       </section>
      </div><!-- /.container -->
     </div><!-- /.content-wrapper -->
     <?php include_once '../../../footer.php'; ?>
   </div><!-- ./wrapper -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/demo.js"></script>
  </body>
  <?php mysql_close($ChamaChamados); ?>
</html>
