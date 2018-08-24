<?php
	
    $chamados = $crud->pdo_src_l('ORDER BY d_emis ASC');
    
//    echo "<pre>";
//    print_r($chamados);
//    echo "</pre>";
	
    //protege de entrada sem ser ADM
    if ($_SESSION != array()) {
        if (@$_SESSION['nivel_usuario'] == 'adm' || $_SESSION['nome_usuario'] == 'Gisele') {

        }
    }else {
        echo "<script>window.location.href='" . HOME . "/403';</script>";
    }
	
?>
<div class="panel panel-default">
    <div style="font-size: 14pt" class="panel-heading">Faturas</div>
    <div class="panel-body">

        <br />
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Mês e Ano:
                        </th>
                        <th>
                            Total da Fatura:
                        </th>
                        <th>
                            Responsável:
                        </th>
                         <th>
                            Data de Emissão:
                        </th>
                        <th>
                            Local:
                        </th>
                        <th>
                            CNPJ:
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($chamados as $index=>$key) { 
                            
                            $un = 0;
                            for ($i = 1; $i<32; $i++) {
                                $un += $key['dia_' . $i];
                            }
                            $r1 = $un*$key['valor_h'];
                            $r2 = $key['desco']*$key['valor_h'];
                            $r3 = $r1-$r2;
                            
                            $s1 = $r3*0.11;
                            $s2 = $r3*0.0065;
                            $s3 = $r3*0.03;
                            $s4 = $r3*0.01;
                            
                            $tot = number_format($r3-($s1+$s2+$s3+$s4), 2, ",", "");
                    ?>
                        <tr class='clickable-row' data-href='<?= HOME . "/edita_lanc?id_l=" . $key['id_lanc']  ?>'>
                            <td>
                                <?= $key['mes_ano'] ?>
                            </td>
                            <td>
                                R$<?= $tot ?>
                            </td>
                            <td>
                                <?= $key['func_a_n'] ?>
                            </td>
                            <td>
                                <?php 
                                    $dh = explode(" ", $key['d_emis']);
                                    echo implode('/', array_reverse(explode('-', $dh[0])));
                                ?>
                            </td>
                            <td>
                                <?= $key['local'] ?>
                            </td>
                            <td>
                                <?= $key['cnpj'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
