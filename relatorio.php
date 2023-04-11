<?php

    include('conexao.php');

    $sql_mov = "SELECT nm_cliente_mov, tipo_mov, COUNT(tipo_mov) FROM movimentacoes GROUP BY nm_cliente_mov, tipo_mov";

    $busca = mysqli_query($conexao, $sql_mov);

    $sql_imp = "SELECT nm_cliente_conteiner, COUNT(categoria_conteiner) FROM conteiners WHERE categoria_conteiner = 'Importação' GROUP BY nm_cliente_conteiner";

    $busca_imp = mysqli_query($conexao, $sql_imp);

    $sql_exp = "SELECT nm_cliente_conteiner, COUNT(categoria_conteiner) FROM conteiners WHERE categoria_conteiner = 'Exportação' GROUP BY nm_cliente_conteiner";

    $busca_exp = mysqli_query($conexao, $sql_exp);


    $html = "<html>";
        $html .= "<h1 align=center>Relatório de movimentações, importação e exportação</h1>";
        $html .="<hr>";

        $html .="<h2 align=center>Movimentações</h2>";

        $html .="<table border=1 align=center>";
            $html .="<thead>";
                $html .="<tr align=center>";
                    $html .="<th>CLIENTE</th>";
                    $html .="<th>MOVIMENTAÇÃO</th>";
                    $html .="<th>QUANTIDADE</th>";
                $html .="</tr>";
            $html .="</thead>";
            $html .="<tbody>";
            while($mov = mysqli_fetch_assoc($busca)) {
                $html .="<tr align=center>";
                    $html .="<td>".$mov['nm_cliente_mov']."</td>";
                    $html .="<td>".$mov['tipo_mov']."</td>";
                    $html .="<td>".$mov['COUNT(tipo_mov)']."</td>";
                $html .="</tr>";
            }
            $html .="</tbody>";
        $html .="</table>";
        
        $html .="<hr>";

        $html .="<h2 align=center>Total de Importações e Exportações</h2>";

        $html .="<br>";

        $html .="<h2 align=center>Total de Importações</h2>";

        $html .="<table border=1 align=center> ";
            $html .="<thead>";
                $html .="<tr align=center>";
                    $html .="<th>CLIENTE</th>";
                    $html .="<th>IMPORTAÇÕES</th>";
                $html .="</tr>";
            $html .="</thead>";
            $html .="<tbody>";
            while($imp = mysqli_fetch_assoc($busca_imp)) {
                $html .="<tr align=center>";
                    $html .="<td>".$imp['nm_cliente_conteiner']."</td>";
                    $html .="<td>".$imp['COUNT(categoria_conteiner)']."</td>";
                $html .="</tr>";
            }
            $html .="</tbody>";
        $html .="</table>";

        $html .="<br>";

        $html .="<h2 align=center>Total de Exportações</h2>";

        $html .="<table border=1 align=center>";
            $html .="<thead>";
                $html .="<tr align=center>";
                    $html .="<th>CLIENTE</th>";
                    $html .="<th>EXPORTAÇÕES</th>";
                $html .="</tr>";
            $html .="</thead>";
            $html .="<tbody>";
            while($exp = mysqli_fetch_assoc($busca_exp)) {
                $html .="<tr align=center>";
                    $html .="<td>".$exp['nm_cliente_conteiner']."</td>";
                    $html .="<td>".$exp['COUNT(categoria_conteiner)']."</td>";
                $html .="</tr>";
            }
            $html .="</tbody>";
        $html .="</table>";

    $html .="</html>";

    
    use Dompdf\Dompdf;

    require_once 'dompdf/autoload.inc.php';
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream();

?>