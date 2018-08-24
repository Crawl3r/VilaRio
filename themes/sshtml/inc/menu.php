<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav navbar-nav" id="logo_menu">
                <li>
                    <a href="<?= HOME; ?>/" class="pull-left navbar-brand"> <img class="nav_logo" style="width: 55px !important" src="<?= LOGO_NAV; ?>" /> </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left" id="bs-example-navbar-collapse-1">

                <?php if (@$_SESSION != array()) { ?>
                
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chamados
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= HOME; ?>/">Chamados Abertos</a>
                            </li>

                            <li>
                                <a href="<?= HOME; ?>/ch_cl">Chamados Concluídos</a>
                            </li>

                            <li>
                                <a style="color: green; font-weight: bold;" href="<?= HOME; ?>/cad_chamado">Novo Chamado</a>
                            </li>
                        </ul>
                    </li>

                    <?php if ($_SESSION['nivel_usuario'] != "adm") { ?>
						
                    <!--
                        <li>
                            <a href="<?= HOME; ?>/lista_ger">Gerência</a>
                        </li>
                    -->
                        <li><a href="edita_usuario_user?id=<?php echo $_SESSION['id_usuario'] ?>">Usuário</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Funcionários
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= HOME; ?>/lista_escala">Escala</a></li>
                                <li><a href="<?= HOME; ?>/lista_func">Gerência</a></li>
                                <li><a href="<?= HOME; ?>/lista_cracha">Credenciais</a></li>
                                <li><a style="color: red !important;" href="<?= HOME; ?>/cracha_venc"><b>Crachás Vencidos</b></a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ponto
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= HOME; ?>/lista_reg_user">Meus Pontos</a>
                                </li>
                            </ul>
                        </li>
                        
                    <?php }else { ?>


                        <li>
                            <a href="<?= HOME; ?>/lista_ger">Gerência</a>
                        </li>
                        <li>
                            <a href="edita_adm?id=<?php echo $_SESSION['id_usuario'] ?>">Administrador</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Funcionários
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= HOME; ?>/lista_func">Gerência</a></li>
                                <li><a href="<?= HOME; ?>/lista_cracha">Credenciais</a></li>
                                <li><a href="<?= HOME; ?>/lista_escala">Escala</a></li>
								<li><a style="color: red !important;" href="<?= HOME; ?>/cracha_venc"><b>Crachás Vencidos</b></a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ponto
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= HOME; ?>/lista_reg_user">Meus Pontos</a>
                                </li>
                                <?php if ($_SESSION['nome_usuario'] == "Gisele") { ?>
                                <li>
                                    <a href="<?= HOME; ?>/lista_reg_geral">Controle de Pontos</a>
                                </li>
                                <li>
                                    <a href="<?= HOME; ?>/lista_listas">Folhas Geradas</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        
                        <?php if ($_SESSION['nome_usuario'] == "Gisele") { ?>
                        
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Financeiro
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?= HOME; ?>/lista_lanc">Lançamentos</a>
                                    </li>
                                    <li>
                                        <a href="<?= HOME; ?>/lista_contr">Contratos</a>
                                    </li>
                                    <li>
                                        <a style="color: green; font-weight: bold;" href="<?= HOME; ?>/cad_lanc">Novo Lançamento</a>
                                    </li>
                                </ul>
                            </li>
                        
                        <?php } ?>

                    <?php } ?>

                <?php } ?>
                        
                

            </ul>
            <ul class="nav navbar-nav navbar-right" id="bs-example-navbar-collapse-1">

                <?php if (@$_SESSION != array()) { ?>

                    <li>
                        <a href="php/logoff.php"> <img src="<?= INCLUDE_PATH; ?>/img/glyph-log-out.png" style="width: 20px;" /> Sair </a>
                    </li>

                <?php }else { ?>

                    <li>
                        <a href="<?= HOME; ?>/login"> <img src="<?= INCLUDE_PATH; ?>/img/glyph-log-in.png" style="width: 20px;" /> Entrar </a>
                    </li>

                <?php } ?>

            </ul>
        </div>
    </div>
</nav>