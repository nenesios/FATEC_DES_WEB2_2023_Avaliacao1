<?php
session_start();

// Destruir a sessão logada e redirecionar para a página de login
session_destroy();
header("Location: cadastro.php");
exit;
?>