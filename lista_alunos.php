<?php
session_start();

// Verificar se o usuário está logado
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Ler o arquivo de alunos e exibir os registros
    $linhas = file("alunos.txt");

    if ($linhas) {
        echo '<html>';
        echo '<head><title>Lista de Alunos</title></head>';
        echo '<body>';
        echo '<h1>Lista de Alunos</h1>';
        echo '<table border="1">';
        echo '<tr><th>Nome</th><th>R.A.</th><th>Placa</th></tr>';

        foreach ($linhas as $linha) {
            $dados = explode('|', $linha);
            echo '<tr>';
            echo '<td>' . $dados[0] . '</td>';
            echo '<td>' . $dados[1] . '</td>';
            echo '<td>' . $dados[2] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '<a href="cadastro.php">Voltar para área de cadastro</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
        echo '<a href="logout.php">Logout</a>';
        echo '</body>';
        echo '</html>';
    } else {
        echo "Não há registros de alunos.";
    }
} else {
    // Redirecionar para a página de login se o usuário não estiver logado
    header("Location: login.php");
    exit;
}
?>