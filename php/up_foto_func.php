<?php

// verifica se foi enviado um arquivo 
if (isset($_FILES['foto_']['name']) && $_FILES["foto_"]["error"] == 0) {

    $arquivo_tmp = $_FILES['foto_']['tmp_name'];
    $nome = $_FILES['foto_']['name'];


    // Pega a extensao
    $extensao = strrchr($nome, '.');

    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);

    // So imagens, .jpg;.jpeg;.gif;.png
    // pesquisar dentro da String as extensoes permitidas
    if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

        $novoNome = md5(microtime()) . $extensao;

        // cria o caminho
        $info['foto_'] = "../themes/sshtml/media/func_" . $novoNome;

        // tenta mover o arquivo para o destino
        if (move_uploaded_file($arquivo_tmp, $info['foto_'])) {
            //echo "Arquivo salvo com sucesso!";
        }else {
            echo "<script>alert('Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita');</script>.";
            $info['foto_'] = "../images/default.jpg";
        }
    }else {
        echo "<script>alert('Você poderá enviar apenas arquivos *.jpg; *.jpeg; *.gif; *.png;');</script>";
        $info['foto_'] = "../images/default.jpg";
    }
}else {
    echo "Você não enviou nenhum arquivo!";
    $info['foto_'] = "../themes/sshtml/media/default_u.png";
}
