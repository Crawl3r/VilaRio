<div id="iframeHolder" class="iframe_embed">
</div>
<?php

//protege de entrada sem login
    if($_SESSION == array()){
        if(@$_SESSION['nivel_usuario']!='adm'){
            require REQUIRE_PATH . "/inc/frame_home.php";
        }
    }else{
        require REQUIRE_PATH . "/inc/lista_index.php";

$chamados = $crud->pdo_src_c('ORDER BY status_chamado ASC, d_h_a_chamado ASC');

$lista = new lista_index();

foreach (CAT_CH as $index => $key) {
    ${'cat_' . $index} = $lista->desenha($key);
}

echo "
    </div>
    <div class='container-fluid'>

        <div class='row'>
            <div class='col-md-6'>
                $cat_0
            </div>
            <div class='col-md-6'>
                $cat_1
            </div>
        </div>

        <div class='row'>
            <div class='col-md-6'>
                $cat_2
            </div>
            <div class='col-md-6'>
                $cat_3
            </div>
        </div>

        <div class='row'>
            <div class='col-md-6'>
                 $cat_4
            </div>
            <div class='col-md-6'>
                 $cat_5 
            </div>
        </div>

        <div class='row'>
            <div class='col-md-3'>

            </div>
            <div class='col-md-6'>
                $cat_6
            </div>
            <div class='col-md-3'>

            </div>
        </div>

    </div>
";
		
    }



