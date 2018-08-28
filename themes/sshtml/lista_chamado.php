<?php
	
    $chamados = $crud->pdo_src_c('ORDER BY status_chamado ASC, d_h_a_chamado ASC');
    
//    echo "<pre>";
//    print_r($chamados);
//    echo "</pre>";
	
    //protege de entrada sem login
    if ($_SESSION != array()) {
        if (@$_SESSION['nivel_usuario'] === 'usuario') {
            echo "<script>window.location.href='" . HOME . "/403';</script>";
        }
    }else {
        echo "<script>window.location.href='" . HOME . "/403';</script>";
    }
	
?>
<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">Chamados</div>
    <div class="panel-body">

        <a href="cad_chamado" class="btn btn-default">Novo Chamado</a>

        <br /><br />
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Status:
                        </th>
                        <th>
                            Aberto por:
                        </th>
                        <th>
                            Abertura:
                        </th>
                        <th>
                            Categoria:
                        </th>
                        <th>
                            Empresa:
                        </th>
                        <th>
                            Responsável:
                        </th>
                        <th>
                            Encerramento:
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chamados as $index=>$key) { ?>
                        <tr 
                            <?php 
                            if ($key['status_chamado'] === 'aberto') {
                                echo "class='clickable-row warning'";
                            } else {
                                echo "class='clickable-row success'";
                            } 
                            ?>
                            data-href='<?= HOME . "/edita_chamado?id_c=" . $key['id_chamado']  ?>'
                        >
                            <td>
                                <?= ucfirst($key['status_chamado']) ?>
                            </td>
                            <td>
                                <?= $key['func_a_n'] ?>
                            </td>
                            <td>
                                <?php 
                                    $dh = explode(" ", $key['d_h_a_chamado']);
                                    echo implode('/', array_reverse(explode('-', $dh[0])));
                                    echo " às ";
                                    echo $dh[1];
                                ?>
                            </td>
                            <td>
                                <?= $key['categoria_chamado'] ?>
                            </td>
                            <td>
                                <?php 
                                    echo "<b>" . $key['nome_empresa'] . "</b>";
                                ?>
                            </td>
                            <td>
                                <?= $key['func_f_n'] ?>
                            </td>
                            <td>
                                <?php 
                                    if ($key['d_h_f_chamado'] !== '0000-00-00 00:00:00') {
                                        $dh = explode(" ", $key['d_h_f_chamado']);
                                        echo implode('/', array_reverse(explode('-', $dh[0])));
                                        echo " às ";
                                        echo $dh[1];
                                    }
                                    
                                ?>
                            </td>
<!--                            <td>
                                <form action="edita_usuario_adm" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $key['id_usuario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_usuario'] ?>">Editar</button>
                                </form>
                            </td>-->
                            <!--
                            <td>
                                <form action="php/remove_usuario.php" method="POST" onsubmit="return confirm('Realmente deseja remover o usuario?');">
                                    <input type="hidden" name="id" value="<?php echo $key['id_usuario'] ?>" />
                                    <button value="<?php echo $key['id_usuario'] ?>">Remover</button>
                                </form>
                            </td>
                            -->
<!--                            <td>
                                <form action="php/bloq_usuario.php" method="POST" onsubmit="return confirm('Realmente deseja bloquear o usuario?');">
                                    <input type="hidden" name="id" value="<?php echo $key['id_usuario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_usuario'] ?>">
                                        <?php if ($key['ativo_usuario'] == "1") {echo 'bloquear'; } else {echo 'desbloquear'; } ?>
                                    </button>
                                </form>
                            </td>-->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
