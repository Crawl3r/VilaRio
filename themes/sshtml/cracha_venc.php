<div id="iframeHolder" class="iframe_embed">
</div>
<?php
//protege de entrada sem login
if ($_SESSION == array()) {

    if (@$_SESSION['nivel_usuario'] != 'adm') {
        require REQUIRE_PATH . "/inc/frame_home.php";
    }
} 

$cracha_venc = $crud->query('SELECT * FROM tb_funcionario WHERE NOW() > DATE_ADD(data_exp_funcionario, INTERVAL 165 DAY) AND empresa_funcionario = 5');
//var_dump($cracha_venc);
      
?>
<div class="panel panel-default">
    <div style="font-size: 14pt; color: red;" class="panel-heading">Funcionários com Crachás Vencidos</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Nome:
                        </th>
                        <th>
                            Cargo:
                        </th>
						<th>
                            Expira em:
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cracha_venc as $index=>$key){ ?>
                        <tr>
                            <td>
                                <?= $key['nome_funcionario'] ?>
                            </td>
                            <td>
                                <?= $key['cargo_funcionario'] ?>
                            </td>
							<?php 
								$time1 = strtotime(date('Y-m-d'));
								$time2 = strtotime(date($key['data_exp_funcionario']));
							?>
							<td style="color: <?= ($time1 < $time2) ? 'red' : 'orange'; ?>" >
                                <b><?= date('d/m/Y', strtotime($key['data_exp_funcionario']."+6 month")) ?></b>
                            </td>
							<!--
                            <td>
                                <form action="edita_func" method="GET">
                                    <input type="hidden" name="id" value="<?php echo $key['id_funcionario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_funcionario'] ?>">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="php/remove_func.php" method="POST" onsubmit="return confirm('Realmente deseja remover o funcionário?');">
                                    <input type="hidden" name="id" value="<?php echo $key['id_funcionario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_funcionario'] ?>">Remover</button>
                                </form>
                            </td>
							-->
                            <!--
                            <td>
                                <form action="php/bloq_usuario.php" method="POST" onsubmit="return confirm('Realmente deseja bloquear o usuario?');">
                                    <input type="hidden" name="id" value="<?php echo $key['id_usuario'] ?>" />
                                    <button class="btn btn-default" value="<?php echo $key['id_usuario'] ?>">
                                        <?php if($key['ativo_usuario']=="1"){echo 'bloquear';}else{echo 'desbloquear';} ?>
                                    </button>
                                </form>
                            </td>
                            -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>