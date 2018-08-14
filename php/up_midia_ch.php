<?php

include "../_app/Config.inc.php";

$info = $_POST;

// verifica se foi enviado um arquivo 
if (isset($_FILES['caminho_']['name']) && $_FILES["caminho_"]["error"] == 0) {

    $arquivo_tmp = $_FILES['caminho_']['tmp_name'];
    $nome = $_FILES['caminho_']['name'];

    // Pega a extensao
    $extensao = strrchr($nome, '.');

    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);

    // So imagens, .jpg;.jpeg;.gif;.png
    // pesquisar dentro da String as extensoes permitidas
    if (strstr('.jpg;.jpeg;.gif;.png;.pdf', $extensao)) {

        $novoNome = md5(microtime()) . $extensao;

        // cria o caminho
        $foto = "../themes/sshtml/media/ch/ch_" . $novoNome;

        // tenta mover o arquivo para o destino
        if (move_uploaded_file($arquivo_tmp, $foto)) {
            
            //caminho correto
            $info['caminho_'] = "./themes/sshtml/media/ch/ch_" . $novoNome;

            //cadastra o arquivo----------------
            $crud->pdo_cadastro('midia_ch', $info);
            //fim------------------------------
            
            //retorna para a lista
            header("Location:../");   
            
        } else {
            echo "<script>alert('Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita');</script>.";
        }
    } else {
        echo "<script>alert('Você poderá enviar apenas arquivos *.jpg; *.jpeg; *.gif; *.png;');</script>";
    }
} else {
    echo "Você não enviou nenhum arquivo!";
}
