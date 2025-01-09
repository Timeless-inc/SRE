<?php

use Dompdf\Dompdf;
use Dompdf\Options;

// Instanciando as opções do Dompdf
$options = new Options();
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

// Configuração da conexão com o banco de dados (PDO)
$pdo = new PDO('mysql:host=localhost; dbname=sre;', 'root', '');

// Consulta para obter os dados necessários do requerimento
$query = "SELECT nome, usr_cpf, contato, email, usr_rg, usr_org, campus, num_matricula, curso, periodo, turno, tipo_vinculo, InputRequerimento, obs FROM requerimentos ORDER BY id DESC LIMIT 1";
$stmt = $pdo->prepare($query);
$stmt->execute();
$requerimento = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se os dados do requerimento foram encontrados
if ($requerimento) {
    // Detectando o diretório de Downloads, dependendo do sistema operacional
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $diretorio = getenv('USERPROFILE') . '\\Downloads'; // Windows
    } else {
        $diretorio = getenv('HOME') . '/Downloads'; // Linux/macOS
    }

    // Verificar se o diretório existe
    if (!file_exists($diretorio)) {
        exit('O diretório de Downloads não foi encontrado.');
    }

    // Gerar o nome do arquivo PDF
    $nomeArquivo = 'Requerimento_' . $requerimento['InputRequerimento'] . '.pdf';
    $caminhoArquivo = $diretorio . '/' . $nomeArquivo;

    // Gerando o conteúdo HTML para o PDF
    $html = '<html><head><title>Requerimento</title></head><body>';
    $html .= '<h1>Requerimento de ' . htmlspecialchars($requerimento['nome']) . '</h1>';
    $html .= '<table border="1" cellpadding="10" cellspacing="0">';
    $html .= '<tr><th>Nome</th><td>' . htmlspecialchars($requerimento['nome']) . '</td></tr>';
    $html .= '<tr><th>CPF</th><td>' . htmlspecialchars($requerimento['usr_cpf']) . '</td></tr>';
    $html .= '<tr><th>Contato</th><td>' . htmlspecialchars($requerimento['contato']) . '</td></tr>';
    $html .= '<tr><th>Email</th><td>' . htmlspecialchars($requerimento['email']) . '</td></tr>';
    $html .= '<tr><th>RG</th><td>' . htmlspecialchars($requerimento['usr_rg']) . '</td></tr>';
    $html .= '<tr><th>Orgão Expeditor</th><td>' . htmlspecialchars($requerimento['usr_org']) . '</td></tr>';
    $html .= '<tr><th>Campus</th><td>' . htmlspecialchars($requerimento['campus']) . '</td></tr>';
    $html .= '<tr><th>Matrícula</th><td>' . htmlspecialchars($requerimento['num_matricula']) . '</td></tr>';
    $html .= '<tr><th>Curso</th><td>' . htmlspecialchars($requerimento['curso']) . '</td></tr>';
    $html .= '<tr><th>Período</th><td>' . htmlspecialchars($requerimento['periodo']) . '</td></tr>';
    $html .= '<tr><th>Turno</th><td>' . htmlspecialchars($requerimento['turno']) . '</td></tr>';
    $html .= '<tr><th>Tipo de Vínculo</th><td>' . htmlspecialchars($requerimento['tipo_vinculo']) . '</td></tr>';
    $html .= '<tr><th>Observações</th><td>' . htmlspecialchars($requerimento['obs'] ?? 'Nenhuma observação') . '</td></tr>';
    $html .= '</table>';
    $html .= '<h3>Conteúdo do Requerimento:</h3>';
    $html .= '<p>' . nl2br(htmlspecialchars($requerimento['InputRequerimento'])) . '</p>';
    $html .= '</body></html>';

    // Instância do Dompdf
    $dompdf = new Dompdf($options);

    // Converter o HTML para PDF
    $dompdf->loadHtml($html);

    // Definir o tamanho do papel
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar o PDF
    $dompdf->render();

    // Salvar o arquivo PDF na pasta Downloads
    file_put_contents($caminhoArquivo, $dompdf->output());

    // Exibe uma mensagem informando o sucesso
    echo 'PDF salvo com sucesso em: ' . $caminhoArquivo;
} else {
    echo 'Nenhum requerimento encontrado.';
}

?>
