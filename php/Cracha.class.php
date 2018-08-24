<?php

class Cracha {
    
    private static $n_impr = 0;

    private static $estilo = "<style>
        
        @media print{
            @page {
                size: landscape;
                margin: 0;
            }

             .modelo{
                 display: inline-block;
             }
            
        }
        
        .modelo {
            display: inline-block;
            height: 422px;
            width: 250px;  
            margin: 20px 10px 0 0;
        }
        
        .modelo5 {
            display: inline-block;
            height: 422px;
            width: 250px;
            margin: 20px 10px 0 0;
        }
        
        .modelo1{
            background:url(" . INCLUDE_PATH . "/img/crachaRioService.png);
            background-repeat:no-repeat;
            background-size: cover;
        }
        .modelo2{
            background:url(" . INCLUDE_PATH . "/img/crachaForteService.png);
            background-repeat:no-repeat;
            background-size: cover;
            transform: translate(0, 5px);
        }
        .modelo3{
            background:url(" . INCLUDE_PATH . "/img/crachaFRS.png);
            background-repeat:no-repeat;
            background-size: cover;
        }
        .modelo4{
            background:url(" . INCLUDE_PATH . "/img/crachaRioFire.png);
            background-repeat:no-repeat;
            background-size: cover;
            transform: translate(0, 0px);
        }
        .modelo5{
            background:url(" . INCLUDE_PATH . "/img/crachaVilaRio.png);
            background-repeat:no-repeat;
            background-size: cover;
            transform: translate(0, 0);
        }
        
        .modelo6{
            background:url(" . INCLUDE_PATH . "/img/crachaVilaSul.png);
            background-repeat:no-repeat;
            background-size: cover;
            transform: translate(0, -20px);
        }
        
        .modelo7{
            background:url(" . INCLUDE_PATH . "/img/crachaForteSul.png);
            background-repeat:no-repeat;
            background-size: cover;
            transform: translate(0, -10px);
        }
        
        /* TESTE */
        
        .modelo_teste{
            transform: translate(0, 0px);
            background:url(" . INCLUDE_PATH . "/img/teste_vila_sul.png);
            background-repeat:no-repeat;
            background-size: cover;
            margin-bottom: 0px;
            margin-top: 5px;
        }
        
        /* modelo_teste */
        
        .ctps_t{
            position: relative;
            font-size: 10pt;
            top: 306px;
            left: 79px;
        }
        
        .rg_t{
            position: relative;
            font-size: 10pt;
            top: 290px;
            left: 79px;
        }
        
        .cpf_t{
            position: relative;
            font-size: 10pt;
            top: 276px;
            left: 79px;
        }
        
        .nome_t{
            position: relative;
            font-size: 11pt;
            text-align: center;
            top: 187px;
        }
        
        .cargo_t{
            position: relative;
            font-size: 11pt;
            text-align: center;
            top: 245px;
        }        
        
        
        /*modelo 5*/
        
        .drtrj_v{
            position: relative;
            font-size: 10pt;
            top: 303px;
            left: 110px;
        }
        
        .cnv_v{
            position: relative;
            font-size: 10pt;
            top: 288px;
            left: 110px;
        }
        
        .data_exp_v{
            position: relative;
            font-size: 10pt;
            top: 273px;
            left: 110px;
        }
        
        .nome_v{
            position: relative;
            font-size: 11pt;
            text-align: center;
            top: 188px;
        }
        
        .cargo_v{
            position: relative;
            font-size: 11pt;
            text-align: center;
            top: 243px;
        }
        
        /*modelo 6 e 7*/
        
        .drtrj_t{
            position: relative;
            font-size: 10pt;
            top: 328px;
            left: 110px;
        }
        
        .cnv_t{
            position: relative;
            font-size: 10pt;
            top: 316px;
            left: 110px;
        }
        
        .data_exp_t{
            position: relative;
            font-size: 10pt;
            top: 303px;
            left: 110px;
        }
        
        .nome_t_1{
            position: relative;
            font-size: 15pt;
            text-align: center;
            top: 201px;
        }
        
        .cargo_t_1{
            display: none;
            position: relative;
            font-size: 18pt;
            text-align: center;
            top: 205px;
        }
        
        /*corpo e imagem*/
    
        body {
            -webkit-print-color-adjust: exact;
            color-adjust:exact;
            transform: scale(.78);
            margin: -130px -80px;
            padding-top: 5px;
        }
        
        .topo{
            position: relative;
            zindex: 9999;
            top: -93px;
            left: 125px;
            width: 113px;
            height: 138px;
        }
        
        .topo_a{
            position: relative;
            zindex: 9999;
            top: -108px;
            left: 132px;
            width: 115px;
            height: 145px;
        }
        
        .topo_v{
            border-radius: 14px;
            position: relative;
            zindex: 9999;
            top: -13px;
            left: 15px;
            width: 108px;
            height: 128px;
            
        }
        
        .topo_t{
            border-radius: 14px;
            position: relative;
            zindex: 9999;
            top: -15px;
            left: 72px;
            width: 108px;
            height: 127px;
        }
        
        @font-face {
            font-family: hand;
            src: url('themes/sshtml/fonts/HANDGOTN.TTF');
        }
        
        *{
            font-family: hand !important;
        }
        
    </style>";

    public static function estilo() {
        echo self::$estilo;
    }
    
    private static function quebra() {
        self::$n_impr += 1;
        if (self::$n_impr === 8) {
            echo "<br><br><br><br><br>";
            self::$n_impr = 0;
        }
    }

    public static function modelo1($func) {

        foreach ($func as $index => $key) {

            echo "
            <div class=\"modelo modelo1\">
                <p class=\"ctps_t\"> " . $key['ctps_funcionario'] . " </p>
                <p class=\"rg_t\"> " . $key['rg_funcionario'] . " </p>
                <p class=\"cpf_t\"> " . $key['cpf_funcionario'] . " </p>
                <p class=\"nome_t\"> " . $key['nome_funcionario'] . " </p>
                <p class=\"cargo_t\"> " . $key['cargo_funcionario'] . " </p>
                <img class=\"topo_t\" src=\"" . substr($key['foto_funcionario'], 1) . "\" />
            </div>";

            self::quebra();
        }
    }
    
    public static function modelo2($func) {

        foreach ($func as $index => $key) {

            echo "
            <div class=\"modelo modelo2\">
                <p class=\"ctps_t\"> " . $key['ctps_funcionario'] . " </p>
                <p class=\"rg_t\"> " . $key['rg_funcionario'] . " </p>
                <p class=\"cpf_t\"> " . $key['cpf_funcionario'] . " </p>
                <p class=\"nome_t\"> " . $key['nome_funcionario'] . " </p>
                <p class=\"cargo_t\"> " . $key['cargo_funcionario'] . " </p>
                <img class=\"topo_t\" src=\"" . substr($key['foto_funcionario'], 1) . "\" />
            </div>";

            self::quebra();
        }
    }
    
    public static function modelo3($func) {

        foreach ($func as $index => $key) {

            echo "
            <div class=\"modelo modelo3\">
                <p class=\"ctps_t\"> " . $key['ctps_funcionario'] . " </p>
                <p class=\"rg_t\"> " . $key['rg_funcionario'] . " </p>
                <p class=\"cpf_t\"> " . $key['cpf_funcionario'] . " </p>
                <p class=\"nome_t\"> " . $key['nome_funcionario'] . " </p>
                <p class=\"cargo_t\"> " . $key['cargo_funcionario'] . " </p>
                <img class=\"topo_t\" src=\"" . substr($key['foto_funcionario'], 1) . "\" />
            </div>";

            self::quebra();
        }
    }
    
    public static function modelo4($func) {

        foreach ($func as $index => $key) {

            echo "
            <div class=\"modelo modelo4\">
                <p class=\"ctps_t\"> " . $key['ctps_funcionario'] . " </p>
                <p class=\"rg_t\"> " . $key['rg_funcionario'] . " </p>
                <p class=\"cpf_t\"> " . $key['cpf_funcionario'] . " </p>
                <p style=\" width: 250px;  \"  class=\"nome_t\"> " . $key['nome_funcionario'] . " </p>
                <p class=\"cargo_t\"> " . $key['cargo_funcionario'] . " </p>
                <img class=\"topo_t\" src=\"" . substr($key['foto_funcionario'], 1) . "\" />
            </div>";

            self::quebra();
        }
    }
    
    public static function modelo5($func) {

        foreach ($func as $index => $key) {

            echo "
            <div class=\"modelo modelo5\">
                <p class=\"drtrj_v\"> " . $key['drtrj_funcionario'] . " </p>
                <p class=\"cnv_v\"> " . $key['cnv_funcionario'] . " </p>
                <p class=\"data_exp_v\"> " . implode("/", array_reverse(explode("-", $key['data_exp_funcionario']))) . " </p>
                <p class=\"nome_v\"> " . $key['nome_funcionario'] . " </p>
                <p class=\"cargo_v\"> " . $key['cargo_funcionario'] . " </p>
                <img class=\"topo_v\" src=\"" . substr($key['foto_funcionario'], 1) . "\" />
            </div>";

            self::quebra();
        }
    }
    
    public static function modelo6($func) {

        foreach ($func as $index => $key) {

            echo "
            <div class=\"modelo modelo6\">
                <p class=\"ctps_t\"> " . $key['ctps_funcionario'] . " </p>
                <p class=\"rg_t\"> " . $key['rg_funcionario'] . " </p>
                <p class=\"cpf_t\"> " . $key['cpf_funcionario'] . " </p>
                <p class=\"nome_t\"> " . $key['nome_funcionario'] . " </p>
                <p class=\"cargo_t\"> " . $key['cargo_funcionario'] . " </p>
                <img class=\"topo_t\" src=\"" . substr($key['foto_funcionario'], 1) . "\" />
            </div>";

            self::quebra();
        }
    }
    
    public static function modelo7($func) {

        foreach ($func as $index => $key) {

            echo "
            <div class=\"modelo modelo7\">
                <p class=\"ctps_t\"> " . $key['ctps_funcionario'] . " </p>
                <p class=\"rg_t\"> " . $key['rg_funcionario'] . " </p>
                <p class=\"cpf_t\"> " . $key['cpf_funcionario'] . " </p>
                <p class=\"nome_t\"> " . $key['nome_funcionario'] . " </p>
                <p class=\"cargo_t\"> " . $key['cargo_funcionario'] . " </p>
                <img class=\"topo_t\" src=\"" . substr($key['foto_funcionario'], 1) . "\" />
            </div>";

            self::quebra();
        }
    }

}
