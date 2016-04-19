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

include '../config.php';
    $UserID =  $_SESSION['UsuarioID'];
    $NomeUserLogado = $_SESSION['UsuarioNome'];
    $DataSolicita = date('d/m/Y - H:i:s');
    $DataCadastro = date('Y-m-d - H:i:s');
    // CHAMANDO DADOS VIA METODO GET
      $Quantidade = strip_tags($_GET["Quantidade"]);
      $NumOrdem = strip_tags($_GET["OP"]);
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Produção Henry</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
 </head>
 <body class="hold-transition skin-blue-light layout-top-nav">
  <div class="wrapper">
   <header class="main-header">
    <nav class="navbar navbar-static-top">
     <div class="container">
      <div class="navbar-header">
       <a href="" class="navbar-brand"><b>Henry </b>Equipamentos &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<code>Controle de PCP - HEXA B</code></a>         
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
        <h1>Ordem de Produção - Produção 2</h1></section>
         <section class="content">
          <div class="row">
           <div class="col-xs-4">
            Modelo: 
            <h4><code>HEXA B</code></h4>
           </div>
           <div class="col-xs-3">
            Número de OP: 
            <h4><code><?php echo $NumOrdem; ?></code></h4>
           </div>
           <div class="col-xs-2">
            Qtd Solicitada:
            <h4><code><?php echo $Quantidade; ?></code></h4>
           </div>
           <div class="col-xs-3">
            Data da Solicitação
            <h4><code><?php echo $DataSolicita; ?></code></h4>
           </div>
           <form  name="CadastraOP2" id="name" method="post" action="" enctype="multipart/form-data">
            <div class="col-xs-3">Usuário Solicitante:
             <input type="text" name="user" id="user" class="form-control" required="required" disabled="disabled" placeholder="<?php echo $NomeUserLogado; ?>">
            </div>
            <div class="col-xs-3">Proximidade
             <select class="form-control" name="prox" id="prox" required="required">
              <option value="" checked="checked"> >>SELECIONE<< </option>
              <option value="A">ABATRACK</option>
              <option value="W">WIEGAND</option>
             </select>                   
            </div>
            <div class="col-xs-3">Biometria
             <select class="form-control" name="bio" id="bio" required="required">
              <option value="" checked="checked"> >>SELECIONE<< </option>
              <option value="300">512K - 300 Digitais (SUPREMA)</option>
              <option value="9600">4MB - 9600 Digitais (SUPREMA)</option>
              <option value="15000">8MB - 15Mil Digitais (SUPREMA)</option>
              <option value="DV">Dedo Vivo</option>
              <option value="FS">Finchos - FS</option>
             </select>                   
            </div>
            <div class="col-xs-3">Data Limite
             <input type="text" name="datalimite" id="datalimite" class="form-control" required="required">
            </div>
            <div class="col-xs-9">Observações
             <input type="textarea" name="observa" id="observa" class="form-control" rows="3" cols="45" required="required">
            </div>
            <div class="col-xs-3">Prioridade
             <select class="form-control" name="prioridade" id="prioridade" required="required">
              <option value="" checked="checked"> >>SELECIONE<< </option>
              <option value="A">Alta</option>
              <option value="M">Média</option>
              <option value="B">Baixa</option>
              <option value="E">Estoque</option>
             </select>                   
            </div>
            <div></div>
            <div class="col-xs-12"><br />
             <input name="OP_1510" type="submit" class="btn btn-success btn-block btn-flat btn-lg" id="OP_1510" value="Abrir ordem de Produção"  />
            </div> 
          </form>
<?php 
if(@$_POST["OP_1510"]){
  //Validação do Cadastro da OP
  $Prox = $_POST["prox"];
    if ($Prox == "A") {
      $Proximidade = "Leitor Proximidade: <br />" . $Quantidade . " UND | 10003865 - HRY 13.1.3.10 MODULO PROX - ABATRACK<br />";
    }if ($Prox == "W") {
      $Proximidade = "Leitor Proximidade: <br />" . $Quantidade . " UND | 10003865 - HRY 13.1.3.10 MODULO PROX - WIEGAND<br />";
    } else {
      # NADA AQUI
    }
  
$Barras = "Leitor de Barras: <br />" . $Quantidade . " UND | 10003863 - Leitora de Barras<br />";
$Mifare = "Leitor Mifare: <br />" . $Quantidade . " UND | 10000743 - Leitora Mifare de Cartoes Inteligentes PIMF-02BR/Y4HNY01<br />";



  $Bio = $_POST["bio"];
    if ($Bio == "300") {
      $Biometria = "Leitor Biométrico: <br />" . $Quantidade . " UND | 10008897 - Modulo Biometrico Suprema 512K SFM4020 OP4<br />";
    } elseif ($Bio = "9600") {
      $Biometria = "Leitor Biométrico: <br />" . $Quantidade . " UND | 10000791 - Modulo Biometrico SFM3020 4M Suprema<br />";
    } elseif ($Bio = "15000") {
      $Biometria = "Leitor Biométrico: <br />" . $Quantidade . " UND | 10013941 - Modulo Biomerico SFM4020 8M OP5 Suprema<br />";
    } elseif ($Bio = "DV") {
      $Biometria = "Leitor Biométrico: <br />" . $Quantidade . " UND | 10013941 - Modulo Biomerico SFM4020 8M OP5 Suprema<br />";
    }elseif ($Bio = "FS") {
      $Biometria = "Leitor Biométrico: <br />" . $Quantidade . " UND | 10013941 - Modulo Biomerico SFM4020 8M OP5 Suprema<br />";
    }else {
      
    }
    
  
    $Qt = $Quantidade;
  //CONFIGURANDO PERIFERICOS
    //AQUI DECLADO AS PLACAS  
    $Placa1 = $Qt . " UND: 10014676 - Placa Atenas Rev. 04<br />";
    $Placa2 = $Qt . " UND: 30093 - Placa Atenas MRP V. 05<br />";
    $Per1 = $Qt . " UND: 10014732 - Placa Display TFT Atenas Rev. 02 <br />";
    $Per2 = $Qt . " UND: 10010692 - Display TFT";
    $Per3 = $Qt . " UND: 10014050 - Placa Controladora P/ Mecanismo CB247";
    $Per3 = $Qt . " UND: 10014731 - Placa Sensor de Papel (Paper Sensor V.05)";
    $Per4 = $Qt . " UND: 10014049 - Impressora Hexa/ONIX";
    $Per5 = $Qt . " UND: 13033 - Modulo RFID - Modelo PIEM-FWAS (ID-12AKISTD-TA)";
    $Per6 = $Qt . " UND: 10015220 - Teclado Membrana";

    //CONCATENANDO PERIFÉRICOS
    $Perifericos = $Placa . $Per1 . $Per2 . $Per3 . $Per4 . $Per5 . $Per6 . $Proximidade . $Biometria . $Barras . $Mifare;
  //FIM CONFIGURANDO PERIFERICOS

  //CONFIGURANDO CHICOTES
    $Ch1 = $Qt . " UND: 10008924 - Cabo Display 16x2<br />";
    $Ch2 = $Qt . " UND: C216REV01 - Cabo Sensor de Papel<br />";
    $Ch3 = $Qt . " UND: 10008919 - Cabo Placa de Led<br />";
    $Ch4 = $Qt . " UND: 10011640 - Cabo Impressora C/ Guilhotina<br />";
    $Ch5 = $Qt . " UND: 1008949 - Cabo Teclado LittleBoy<br />";
    $Ch6 = $Qt . " UND: TRCR2032 - Bateria 3V<br />";
    $Ch7 = $Qt . " UND: 10012985 - Fonte - HETQ 205 7,8V/3,5A - Verde<br />";
    $Ch8 = $Qt . " UND: 10002978 - Membrana Teclado<br />";
    $Ch9 = $Qt . " UND: N/C - Kit Mecânico do Prisma SF<br />";
    //CONCATENANDO CHICOTES
    $Chicotes = $Ch1 . $Ch2 . $Ch3 . $Ch4 . $Ch5 . $Ch6 . $Ch7 . $Ch8 . $Ch9;

  //DEFININDO OBSERVAÇÕES
   $Obs = $_POST["observa"];
   $DataLimite = $_POST["datalimite"];
   $Prioridade = $_POST["prioridade"];

  //DEFININDO CAMPOS
  // $NumOrdem = Número da Ordem de Serviço


//INÍCIO DA QUERY PARA INSERÇÃO
   
    $conexao = mysql_connect($host, $user, $pass) //porta, usuário, senha
    or die("Erro na conexão com banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
    $select_db = mysql_select_db($banco);

    $InsereREP12 = "INSERT INTO hop_p2 (opp2_usuario, opp2_datacadastro, opp2_prioridade, opp2_status, opp2_datalimite, opp2_periferico, opp2_chicote, opp2_obs, opp2_quantidade, opp2_modelo, opp2_hos) VALUES ('$NomeUserLogado', '$DataCadastro', '$Prioridade', 'P', '$DataLimite', '$Perifericos', '$Chicotes', '$Obs', '$Qt', 'Prisma SF R01', '$NumOrdem')";
     
    mysql_query($InsereREP12,$conexao); //Realiza a consulta
         
    if(mysql_affected_rows() == 1){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
        echo '<script type="text/javascript">alert("Equipamento Cadastrado com Sucesso");</script>';
    } else {
        echo '<script type="text/javascript">alert(">>>>>>>>>ATENÇÃO<<<<<<<< <br /> NÃO FOI POSSÍVEL GRAVAR O EQUIPAMENTO");</script>';
    }
     
    mysql_close($conexao); //fecha conexão com banco de dados


}
?>  
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
 <?php include_once '../footer.php'; ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>

    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>


    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->

  </body>

</html>
