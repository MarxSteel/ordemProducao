        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/perfil/<?php echo $UserID; ?>.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['UsuarioNome'];?></p>
            </div>
          </div>
          <!-- search form -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->

          <ul class="sidebar-menu">
            <li class="header">PRODUÇÃO 2</li>
            <li class="active">
              <a href="dashboard.php">
                <i class="fa fa-home"></i> <span>Início</span>
              </a>
            </li>
            <?php
            if ($P2Montagem === '1') {
            ?>
            <li>
              <a href="montagem.php">
                <i class="fa fa-wrench"></i> <span>Montagem</span>
              </a>
            </li>
            <li>
              <a href="pendentes.php">
                <i class="fa fa-exclamation"></i> <span>Pendentes</span>
              </a>
            </li>
            <li>
              <a href="meusequips.php">
                <i class="fa fa-circle-o-notch"></i> <span>Meus Equipamentos</span>
              </a>
            </li>
            <?php
            }
            else {
              #Nada aqui
            }
            if ($P2Reteste === '1') {
            ?>
            <li>
              <a href="reteste.php">
                <i class="fa fa-keyboard-o"></i> <span>Controle de Reteste</span>
              </a>
            </li>
            <li>
              <a href="reprovaliberados.php">
                <i class="fa fa-retweet"></i> <span>Reprovar liberados</span>
              </a>
            </li>
            <?php
            }
            else {
              #Nada aqui
            }
            if ($P2Admin === '1') {
            ?>

            <li>
              <a href="relatorios.php">
                <i class="fa fa-server"></i> <span>Relatorios</span>
              </a>
            </li>
                        <?php
            }
            else {
              #Nada aqui
            }
            ?>
                        <li>
              <a href="liberados.php">
                <i class="fa fa-server"></i> <span>Relação de Liberados</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info"></i> <span>ISO</span>
              </a>
            </li>  
          </ul>
        </section>