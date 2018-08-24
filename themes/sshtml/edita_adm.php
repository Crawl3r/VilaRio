<?php
	
    //protege de entrada sem login
    if($_SESSION != array()){
        if($_SESSION['nivel_usuario']!='adm'){
            echo "<script>window.location.href='" . HOME . "/403';</script>";
        }
    }else{
        echo "<script>window.location.href='" . HOME . "/403';</script>";
    }
	
    $adm = $crud->pdo_src('usuario','WHERE id_usuario = ' . $_GET['id']);
	
?>
		
<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">Edição do Administrador</div>
    <div class="panel-body">

        <form class="form-inline" role="form" action="php/edita_usuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
            <label>Nome: </label>
            <input class="form-control" value="<?php echo $adm[0]['nome_usuario'] ?>" type="text" name="nome" />
            <br />
            <label>Login: </label>
            <input class="form-control" value="<?php echo $adm[0]['login_usuario'] ?>" type="text" name="login" />
            <br />
            <label>Empresa: </label>
            <select class="form-control" type="text" name="empresa">
                <option></option>
                <?php
                foreach ($empresas_cr as $index => $key) {
                    echo "<option ";
                    echo ($key === $adm[0]['empresa']) ? "selected" : "";
                    echo " value=\"$key\">$index</option>";
                }
                ?>
            </select>
            <br />
            <label>Cargo: </label>
            <input value="<?php echo $adm[0]['cargo'] ?>" class="form-control" type="text" name="cargo" />
            <br />
            <label>N° de Registro: </label>
            <input value="<?php echo $adm[0]['n_registro'] ?>" class="form-control" type="text" name="n_registro" />
            <br />
            <label>CTPS: </label>
            <input value="<?php echo $adm[0]['ctps'] ?>" class="form-control" type="text" name="ctps" />
            <br />
            <label>Admissão: </label>
            <input value="<?php echo $adm[0]['admissao'] ?>" class="form-control" type="date" name="admissao" />
            <br /><br />
            <input class="btn btn-default" type="submit" value="Salvar Alterações" />			
        </form>

        <br />

        <div style="max-width: 650px" class="panel panel-default panel-warning">
            <div style="font-size: 14pt" class="panel-heading">Trocar Senha</div>
            <div class="panel-body">
                <form class="form-inline" role="form" action="php/edita_senha.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                    <label>Senha antiga: </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" type="password" name="antiga" />
                    <br />
                    <label>Nova senha: </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control" type="password" name="nova" />
                    <br />
                    <label>Confima senha: </label>
                    &nbsp;&nbsp;
                    <input class="form-control" type="password" name="confirma" />
                    <br /><br />
                    <button class="btn btn-default">Trocar Senha</button>
                </form>
            </div>
        </div>

    </div>
</div>
		
