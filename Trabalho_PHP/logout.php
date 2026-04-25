<?php
session_start();

// Destrói todas as variáveis de sessão
session_unset();

// Destrói a sessão em si
session_destroy();

// Redireciona o usuário para a tela de login
header("Location: index.php?v=login");
exit;
