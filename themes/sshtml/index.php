<div id="iframeHolder" class="iframe_embed">
</div>
<?php
//protege de entrada sem login
if ($_SESSION == array()) {

    if (@$_SESSION['nivel_usuario'] != 'adm') {
        require REQUIRE_PATH . "/inc/frame_home.php";
    }
} else {

    require REQUIRE_PATH . "/inc/Lista-class.php";

    $lista = new lista_index();
    
    if ($_GET !== array()) {
        $cat_u = $lista->desenha_lista($_GET['campo'], $_GET['valor'], 'aberto');
    }else {
        $cat_u = $lista->desenha_lista('', '', 'aberto');
    }
    
    
    ?>
	<?php if (@$_SESSION['setor_usuario'] != "Operacional") { ?>
    <div class='container-fluid'>
        <div class='panel panel-default'>
            <div style='font-size: 14pt' class='panel-heading'>Pesquisa</div>
            <div class='panel-body'>
                <form class="form form-inline" method="GET" action="<?= HOME ?>">
                    <select class="form-control" name="campo">
                        <option value="tb_chamado.func_alvo_chamado">Funcionário Requerente</option>
                        <option value="tb_chamado.categoria_chamado">Categoria</option>
                        <option value="tb_empresa.nome_empresa">Empresa</option>
                    </select>
                    <input class="form-control" type="text" name="valor" placeholder="Valor da Pesquisa..." />
                    <button type="submit" class="btn btn-primary" style="margin-top: -10px">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    echo "
    </div>
    <div class='container-fluid'>

        <div class='row'>
            <div class='col-md-12'>
                $cat_u
            </div>
        </div>

    </div>
	";
	}
	?>
	<?php } ?>



