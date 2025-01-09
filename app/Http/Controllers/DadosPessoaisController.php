<?php

namespace App\Http\Controllers;

use App\Models\Requerimento;
use Illuminate\Http\Request;

class DadosPessoaisController extends Controller
{
    public function index()
    {
        return view('dadospessoais.index');
    }

    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'nome' => 'required|string',
            'usr_cpf' => 'required|string',
            'contato' => 'required|string',
            'email' => 'required|email',
            'usr_rg' => 'required|string',
            'usr_org' => 'required|string',
            'campus' => 'required|string',
            'num_matricula' => 'required|string',
            'curso' => 'required|string',
            'periodo' => 'required|string',
            'turno' => 'required|string',
            'tipo_vinculo' => 'required|string',
            'InputRequerimento' => 'required|string',
            'obs' => 'nullable|string',
        ]);

        // Salvar os dados no banco
        Requerimento::create($request->all());

        // Redirecionar para a página de sucesso
        return redirect('/sucesso');
    }
}
