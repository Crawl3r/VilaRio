<?php
//protege de entrada sem ser ADM
if ($_SESSION != array()) {
    if (@$_SESSION['nivel_usuario'] == 'adm' || $_SESSION['nivel_usuario'] == 'usuario') {
        
    }
} else {
    echo "<script>window.location.href='" . HOME . "/403';</script>";
}

date_default_timezone_set('America/Sao_Paulo');

$chamado = $crud->pdo_src_l('WHERE id_lanc=' . $_GET['id_l'])[0];

$mes = explode("/",$chamado['mes_ano'])[0];

switch ($mes){
 
    case "01": $mes = "jan"; $extenso = "JANEIRO"; break;
    case "02": $mes = "fev"; $extenso = "FEVEREIRO"; break;
    case "03": $mes = "mar"; $extenso = "MARÇO"; break;
    case "04": $mes = "abr"; $extenso = "ABRIL"; break;
    case "05": $mes = "mai"; $extenso = "MAIO"; break;
    case "06": $mes = "jun"; $extenso = "JUNHO"; break;
    case "07": $mes = "jul"; $extenso = "JULHO"; break;
    case "08": $mes = "ago"; $extenso = "AGOSTO"; break;
    case "09": $mes = "set"; $extenso = "SETEMBRO"; break;
    case "10": $mes = "out"; $extenso = "OUTUBRO"; break;
    case "11": $mes = "nov"; $extenso = "NOVEMBRO"; break;
    case "12": $mes = "dez"; $extenso = "DEZEMBRO"; break;

}

//extras
for($i=1;$i<=3;$i++){ 
    @$tot_extra += $chamado['val_extra_'.$i];                   
}

//empresa
@$empr = ${"emp_".$chamado['empresa']};

?>
<script>
    $(document).ready(function () {
        window.print();
        //window.close();
    });
</script>
<style>
    @media (min-width: 768px) {
        .seven-cols .col-md-1,
        .seven-cols .col-sm-1,
        .seven-cols .col-lg-1  {
            width: 100%;
        }
    }

    @media (min-width: 992px) {
        .seven-cols .col-md-1,
        .seven-cols .col-sm-1,
        .seven-cols .col-lg-1 {
            width: 14.285714285714285714285714285714%;
        }
    }

    @media (min-width: 1200px) {
        .seven-cols .col-md-1,
        .seven-cols .col-sm-1,
        .seven-cols .col-lg-1 {
            width: 14.285714285714285714285714285714%;
        }
    }

    .impr tr td  {
        padding: 2px !important;
    }
    
    

    @media print { 
        
        .footer-1{display:none;}
        
        .navbar{display:none;}
        
        #page {
            width: 100%;
            margin: 0; 
            padding: 0;
            background: none;
        }
        
        body{
            margin-top: -70px; 
            height: auto;
        }
    }
    
    table{
        font-size: 12pt;
    }
    
</style>

<div class="container">
    
    <center>
        <div>
            <h4><?= $empr[0] ?></h4>
            <h4>RELATÓRIO DE CARGA HORÁRIA</h4>
            <h4>MÊS: <?= $extenso . "/" . explode("/",$chamado['mes_ano'])[1] ?></h4>
        </div>
    </center>

    <table class="table table-bordered impr">

        <tbody>

            <tr>
                <td style="width: 100px;"><b>Local:</b></td>
                <td colspan="4"><?= $chamado['local'] ?></td>
            </tr>
            <tr>
                <td style="width: 100px;"><b>Endereço:</b></td>
                <td colspan="4"><?= $chamado['endereco'] ?></td>
            </tr>
            <tr>
                <td style="width: 100px;"><b>CNPJ:</b></td>
                <td colspan="4"><?= $chamado['cnpj'] ?></td>
            </tr>
            <tr>
                <td style="width: 100px;"><b>Efetivo:</b></td>
                <td colspan="4"><?= $chamado['efetivo'] ?></td>
            </tr>


            <tr>
                <td class="text-center" style="width: 100px;"><b>Dia/Mês</b></td>
                <td class="text-center" style="width: 150px;"><b>Qtd.</b></td>
                <td class="text-center" style="width: 100px;"><b>Unid.</b></td>
                <td colspan="2" class="text-center"><b>Observações</b></td>
            </tr>
            <?php $tot = 0;
            for ($i = 1; $i < 32; $i++) { ?>
                <tr class="dias" style="font-size: 0.85em;">
                    <td class="text-center" style="padding: 0px !important;"><?= $i."/".$mes ?></td>
                    <td class="text-center" style="padding: 0px !important;"><?= $chamado['dia_' . $i] ?></td>
                    <td class="text-center" style="padding: 0px !important;"><?= $chamado['tipo_cobr'] ?></td>
                    <?php if ($i == 1) { ?>
                        <td colspan="2" rowspan="31" style="padding: 10px !important">
                            Valor do(a)(s) <?= $chamado['tipo_cobr'] ?>: <b>R$<?= number_format($chamado['valor_h'], 2, ",", "") ?></b> <br /><br />
                            1 - FGTS pago pela Vila Rio (xerox) <br />
                            2 - INSS pago pela Vila Rio (xerox) <br /><br />
                            <b>Retenções:</b> <br /><br />
                            1 - INSS pago pela contratante (xerox) <br />
                            2 - PIS pago pela contratante (xerox) <br />
                            3 - COFINS pago pela contratante (xerox) <br />
                            4 - CSSL pago pela contratante (xerox) <br /><br />
                            
                            <b>Outros:</b> <br /><br />
                            <?php if($tot_extra==0 || $tot_extra==0.00){ ?>
                                <br /><br />
                            <?php } else { ?>
                                Valor de <b><?= "R$" . number_format($tot_extra, 2, ",", "") ?></b> 
                                referente ao(s) seguinte(s) ponto(s): <br /><br />
                                <?php for($j=1;$j<=3;$j++) { ?>
                                    <?php if($chamado['descr_extra_'.$j]!="" || $chamado['val_extra_'.$j]!=0){ ?>
                                        <ul><li><?= ucfirst($chamado['descr_extra_'.$j]) . " - R$" . $chamado['val_extra_'.$j] ?></li></ul>
                                    <?php } ?>
                                <?php } ?>
                                <br />
                            <?php } ?>
                            
                            <b>Observações:</b> <br /><br />
                            <?= $chamado['obs_retencoes'] ?>
                        </td>
                <?php } ?>
                </tr>
                <?php $tot += $chamado['dia_' . $i];
            } ?>
                
            <tr>
                <td colspan="5"></td>
            </tr>

            <tr class="text-center">
                <td><b>Descrição</b></td>
                <td><b>Num. de <?= ucfirst($chamado['tipo_cobr']) ?></b></td>
                <td></td>
                <td><b>Valor</b></td>
                <td><b>Total</b></td>
            </tr>
            <tr style="font-size: 0.85em;" class="success">
                <td>Hora Normal</td>
                <td class="text-center"><?= $tot ?></td>
                <td class="text-center">X</td>
                <td class="text-center">R$<?= number_format($chamado['valor_h'], 2, ",", "") ?></td>
                <td class="text-center"><?= "R$" . number_format($r1 = $tot * $chamado['valor_h'], 2, ",", "") ?></td>
            </tr>
             <tr style="font-size: 0.85em;" class="<?= $tot_extra>=0 ? "success" : "warning" ?>">
                <td>Extras</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <?php 
                $re = $tot_extra;
                $tot_extra < 0 ? $tot_extra="(R$".number_format($tot_extra*=(-1),2,",",".").")" : $tot_extra="R$".number_format($tot_extra,2,",",".")  ; 
                ?>
                <td class="text-center"><?= $tot_extra ?></td>
            </tr>
            <tr style="font-size: 0.85em;" class="warning">
                <td style="white-space: nowrap;">Desc. em <?= ucfirst($chamado['tipo_cobr']) ?></td>
                <td class="text-center"><?= $chamado['desco'] ?></td>
                <td class="text-center">X</td>
                <td class="text-center">R$<?= number_format($chamado['valor_h'], 2, ",", "") ?></td>
                <td class="text-center">(<?= "R$" . number_format($r2 = $chamado['desco'] * $chamado['valor_h'], 2, ",", "") ?>)</td>
            </tr>
            <tr style="font-size: 0.85em;" class="success">
                <td>Subtotal</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center"><?= "R$" . number_format($r3 = $r1 - $r2 + $re, 2, ",", "") ?></td>
            </tr>
            <tr style="font-size: 0.85em;" class="warning">
                <td>Ret. 11% INSS</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">(<?= "R$" . number_format($s1 = $r3 * 0.11, 2, ",", "") ?>)</td>
            </tr>
            <tr style="font-size: 0.85em;" class="warning">
                <td>Ret. 065% Pis</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">(<?= "R$" . number_format($s2 = $r3 * 0.0065, 2, ",", "") ?>)</td>
            </tr>
            <tr style="font-size: 0.85em;" class="warning">
                <td>Ret. 3% Cofins</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">(<?= "R$" . number_format($s3 = $r3 * 0.03, 2, ",", "") ?>)</td>
            </tr>
            <tr style="font-size: 0.85em;" class="warning">
                <td>Ret. 1% CSLL</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">(<?= "R$" . number_format($s4 = $r3 * 0.01, 2, ",", "") ?>)</td>
            </tr>
            <tr style="font-size: 0.85em;" class="success">
                <td>Valor da Fatura</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center">--</td>
                <td class="text-center"><b><?= "R$" . number_format($r3 - ($s1 + $s2 + $s3 + $s4), 2, ",", "") ?></b></td>
            </tr>

            <tr style="font-size: 0.9em;">
                <td class="text-center" colspan="5">
                    <b>
                        Valor total da fatura: R$
                        <?= number_format($r3 - ($s1 + $s2 + $s3 + $s4), 2, ",", "") ?>
                        &nbsp;- NF: 
                        <?= $chamado['nf'] ?>
                        &nbsp;- Emissão:&nbsp;
                        <?= implode("/",array_reverse(explode("-",$chamado['d_emis']))) ?>
                        &nbsp;- Venc.:&nbsp;
                        <?= implode("/",array_reverse(explode("-",$chamado['d_venc']))) ?>
                    </b>
                </td>
            </tr>

        </tbody>

    </table>

</div>

<br /><br /><br />