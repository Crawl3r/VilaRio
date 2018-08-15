<?php

session_start();

$dir = explode('\\',getcwd());
if(end($dir)=='php'){
    include "./querys.php";
}else{
    include "php/querys.php";
}

$crud = new crud();

//preenchimentos automáticos
$usuario_l = $crud->pdo_src('usuario','WHERE ativo_usuario = 1');
$empresa_l = $crud->pdo_src('empresa','');

//Rotas
define('HOME','http://localhost/vila_ch');
define('THEME','sshtml');

define('INCLUDE_PATH', HOME . '/themes/' . THEME);
define('REQUIRE_PATH','themes/' . THEME);

//IMAGENS PADRÃO
define('LOGO_NAV',  INCLUDE_PATH."/img/logo_nav.png");
define('LOGO_NORM', INCLUDE_PATH."/img/logo_norm.png");
define('SAVE_BTN',  INCLUDE_PATH."/img/save.png");
define('OK_BTN',  INCLUDE_PATH."/img/ok_icon.png");
define('NO_BTN',  INCLUDE_PATH."/img/no_icon.png");

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

define('CAT_CH',$categorias);

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
define('EMP_CR',$empresas_cr);

//VETORES EMPRESAS PONTO
$emp_1 = array(
    'RIO SERVICE LTDA',
    'ENDEREÇO X, 001 SALA Y;',
    '78.895.869/0001-99'
);
$emp_2 = array(
    'FORTE SERVICE LTDA',
    'ENDEREÇO X, 002 SALA Y;',
    '78.895.869/0001-99'
);
$emp_3 = array(
    'FRS LTDA',
    'ENDEREÇO X, 003 SALA Y;',
    '78.895.869/0001-99'
);
$emp_4 = array(
    'RIO FIRE LTDA',
    'ENDEREÇO X, 004 SALA Y;',
    '78.895.869/0001-99'
);
$emp_5 = array(
    'VILA RIO LTDA',
    'ENDEREÇO X, 005 SALA Y;',
    '78.895.869/0001-99'
);
$emp_6 = array(
    'VILA SUL LTDA',
    'ENDEREÇO X, 006 SALA Y;',
    '78.895.869/0001-99'
);
$emp_7 = array(
    'FORTE SUL LTDA',
    'ENDEREÇO X, 007 SALA Y;',
    '78.895.869/0001-99'
);

//-----------------------------------------------------------------------
$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setUrl = (empty($getUrl) ? 'index' : $getUrl);
$Url = explode('/', $setUrl);