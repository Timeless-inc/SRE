<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function notFound()
    {
        return view('404');
    }

    public function generatePdf()
    {
        $data = [  // Aqui você pode adicionar os dados que deseja incluir no PDF
            'titulo' => 'Exemplo de Relatório PDF',
            'conteudo' => 'Aqui está o conteúdo do seu PDF gerado com sucesso!',
        ];

        // Carrega a view Blade para o PDF (exemplo: 'pdf_template')
        $pdf = PDF::loadView('pdf_template', $data);

        // Retorna o PDF para download
        return $pdf->download('documento.pdf');
    }
}
