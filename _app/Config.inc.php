<?php

session_start();

$dir = explode('\\', getcwd());
if (end($dir) == 'php') {
    include "./querys.php";
}else {
    include "php/querys.php";
}

$crud = new crud();

//preenchimentos automáticos
$usuario_l = $crud->pdo_src('usuario', 'WHERE ativo_usuario = 1');
$empresa_l = $crud->pdo_src('empresa', '');

//Rotas
define('HOME', 'http://localhost/vila_ch');
define('THEME', 'sshtml');

define('INCLUDE_PATH', HOME . '/themes/' . THEME);
define('REQUIRE_PATH', 'themes/' . THEME);

//IMAGENS PADRÃO
define('LOGO_NAV', INCLUDE_PATH . "/img/logo_nav.png");
define('LOGO_NORM', INCLUDE_PATH . "/img/logo_norm.png");
define('SAVE_BTN', INCLUDE_PATH . "/img/save.png");
define('OK_BTN', INCLUDE_PATH . "/img/ok_icon.png");
define('NO_BTN', INCLUDE_PATH . "/img/no_icon.png");

//CATEGORIAS
$categorias = array(
    'Pagamentos',
    'Falta Indevida',
    'Benefícios',
    'Folha de Ponto e C. CH',
    'Dobras e Extra',
    'Férias',
    'Outros'
);

define('CAT_CH', $categorias);

$CAT_CH = array(
    'Pagamentos',
    'Falta Indevida',
    'Benefícios',
    'Folha de Ponto e C. CH',
    'Dobras e Extra',
    'Férias',
    'Outros'
);

//Empresas Crachá
$empresas_cr = array(
    'Rio Service' => '1',
    'Forte Service' => '2',
    'FRS' => '3',
    'Rio Fire' => '4',
    'Vila Rio' => '5',
    'Vila Sul' => '6',
    'Forte Sul' => '7'
);
define('EMP_CR', $empresas_cr);

//VETORES EMPRESAS PONTO
$emp_1 = array(
    'RIO SERVICE SERVICOS E LOCACAO DE BENS MOVEIS LTDA',
    'Av Avenida Das Americas, 15531, Sala 105;',
    '11.595.417/0001-60'
);
$emp_2 = array(
    'FORTE SERVICE SERVICOS E LOCACAO DE BENS MOVEIS LTDA',
    'Est Dos Bandeirantes, 5196, Sala 205;',
    '10.868.711/0001-36'
);
$emp_3 = array(
    'FRS RIO SERVICOS E LOCACAO DE BENS MOVEIS EIRELI',
    'Est Dos Bandeirantes, 4885, Sala 306;',
    '22.849.225/0001-50'
);
$emp_4 = array(
    'RIO FIRE SERVICOS ESPECIAIS CONTRA INCENDIO LTDA ',
    'Est Dos Bandeirantes, 5196, Sala 202;',
    '19.071.845/0001-04'
);
$emp_5 = array(
    'VILA RIO VIGILANCIA E SEGURANCA LTDA',
    'Est Dos Bandeirantes, 4835, Lote 1 - Pal 34288;',
    '14.223.301/0001-99'
);
$emp_6 = array(
    'VILA SUL - ESCOLA DE FORMACAO DE VIGILANTES LTDA',
    'R Coronel Bernardino De Melo, 2673 GALPAO LOTE 10 QUADRA A;',
    '04.963.936/0001-79'
);
$emp_7 = array(
    'FORTE SUL RIO SERVICOS E LOCACAO DE BENS MOVEIS LTDA',
    'Av Nossa Senhora Das Gracas, 348, Apt 102;',
    '10.556.185/0001-79'
);

//-----------------------------------------------------------------------
$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setUrl = (empty($getUrl) ? 'index' : $getUrl);
$Url = explode('/', $setUrl);