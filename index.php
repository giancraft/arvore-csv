<?php 

require_once "arvore_acao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="ligth">
<?php include 'cabecalho.php'; ?>

<body>
    <main class="container">
        <?php include 'menu.php'; ?>
        <table role="grid">
            <tr>
                <th>Id</th>
                <th>Especie</th>
                <th>Codigo</th>
                <th>Data da Plantacao</th>
                <th>Data da Ultima Adubacao</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
            <?php
            $dados = ler_csv('arvore.csv');
            if(($dados == NULL) || (count($dados)==0)){
                echo "<h1>sem dados a serem exibidos</h1>";
            }
            foreach ($dados as $key)
                echo "<tr><td>{$key['id']}</td>
                  <td>{$key['especie']}</td>
                  <td>{$key['codigo']}</td>
                  <td>{$key['data_plantada']}</td>
                  <td>{$key['data_ultima_adubacao']}</td>
                  <td align='center'><a role='button' href='arvore_cad.php?id=" . $key['id'] . "';>A</a></td>
                  <td align='center'><a role='button' href=javascript:excluirRegistro('arvore_acao.php?acao=excluir&id=" . $key['id'] . "');>E</a></td>
              </tr>";
            ?>
        </table>
    </main>
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url;
        }
    </script>
</body>
</html>