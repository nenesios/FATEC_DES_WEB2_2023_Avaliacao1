<?php
session_start();

// Verificar se o usuário está logado
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Verificar se o formulário de cadastro foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && isset($_POST['ra']) && isset($_POST['placa'])) {
        $nome = $_POST['nome'];
        $ra = $_POST['ra'];
        $placa = $_POST['placa'];

        // Abrir o arquivo de texto para escrita (append)
        $arquivo = fopen("alunos.txt", "a");
        if ($arquivo) {
            // Escrever os dados no arquivo no formato especificado
            fwrite($arquivo, "$nome|$ra|$placa\n");
            fclose($arquivo);
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao abrir o arquivo.";
        }
    }

    // Página de cadastro
    echo '<html>';
    echo '<head><title>Cadastro de Alunos</title></head>';
    echo '<body>';
    echo '<h1>Cadastro de Alunos</h1>';
    echo '<form method="post" action="">';
    echo 'Nome Completo: <input type="text" name="nome" required><br>';
    echo 'Registro Acadêmico (R.A.): <input type="text" name="ra" required><br>';
    echo 'Placa do Carro ou Moto: <input type="text" name="placa" required><br>';
    echo '<input type="submit" value="Cadastrar">';
    echo '</form>';
    echo '<a href="lista_alunos.php">Consultar Cadastrados</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
    echo '<a href="logout.php">Logout</a>';
    echo '</body>';
    echo '</html>';
} else {
    // Verificar se o formulário de login foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']) && isset($_POST['senha'])) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        // Verificar as credenciais de login
        if ($login === 'portaria' && $senha === 'FatecAraras') {
            // Login bem-sucedido, iniciar a sessão
            $_SESSION['logged_in'] = true;
        } else {
            echo "Login ou senha incorretos.";
        }
    }

    // Página de login
    echo '<html>';
    echo '<head><title>Login</title></head>';
    echo '<body>';
    echo '<h1>Login</h1>';
    echo '<form method="post" action="">';
    echo 'Login: <input type="text" name="login" required><br>';
    echo 'Senha: <input type="password" name="senha" required><br>';
    echo '<input type="submit" value="Login">';
    echo '</form>';
    echo '</body>';
    echo '</html>';
}
?>
