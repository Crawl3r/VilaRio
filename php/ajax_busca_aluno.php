<?php
include "../_app/Config.inc.php";

$info = $_GET;
$campo = $info['aluno_cmp'];
$valor = $info['aluno_src'];

//pesquisa o aluno-----------------
if ($valor !== "") {
    $alunos = $crud->pdo_src('aluno', $info, "WHERE $campo LIKE '%$valor%' ");
}
?>

<style>
    .clickable-row{
        cursor: pointer;
    }
</style>

<script>
    jQuery(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>

<table class="table table-stripped table-hover">
    <thead>
    <th>
        Nome
    </th>
    <th>
        Data de Nascimento
    </th>
    <th>
        Turma(s)
    </th>
    <th>
        Telefones
    </th>
    <th>
        email
    </th>
    <th>

    </th>
</thead>
<tbody>
    <?php
    if (@$alunos) {
        foreach ($alunos as $index => $key) {
            
            $matriculas = $crud->matricula_aluno($key['id_aluno']);
            
            echo "<tr class='clickable-row' data-href='" . HOME . "/edit_aluno?id_a=" . $key['id_aluno'] . "'>";

            echo "<td>";
            echo $key['nome_aluno'];
            echo "</td>";

            echo "<td>";
            echo implode('/', array_reverse(explode('-', $key['nasc_aluno'])));
            echo "</td>";

            echo "<td>";
            $matricula = false;
            $e_matricula = "";
            foreach ($matriculas as $index2=>$key2) {
                if (new DateTime()<new DateTime($key2['data_val_matricula'] . " 16:00:00")) {
                    $matricula = true;
                    $e_matricula .= $key2['codigo_turma'] . " / ";
                }
            }
            if ($matricula) {
                echo substr_replace($e_matricula, '', -3);
            }else {
                echo "Sem Turma no momento";
            }
            echo "</td>";

            echo "<td>";
            echo $key['telefone_1_a_aluno'] . " / " . $key['telefone_2_a_aluno'];
            echo "</td>";

            echo "<td>";
            echo $key['email_aluno'];
            echo "</td>";

            echo "</tr>";
        }
    }
    ?>
</tbody>
</table>
</div>