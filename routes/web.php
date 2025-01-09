<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DadosPessoaisController;


Route::get('/', [PageController::class, 'home']);
Route::fallback([PageController::class, 'notFound']);

Route::get('/gerar', function () {
    $pdf = PDF::loadView('pdf');  // 'pdf_view' é o nome da view que você criará para o conteúdo do PDF
    return $pdf->download('exemplo.pdf');  // O arquivo será baixado com o nome 'exemplo.pdf'
});


Route::get('/informativa', function () {
return view('informativa'); });

Route::get('/dadospessoais', [DadosPessoaisController::class, 'index']); 
Route::post('/dadospessoais', [DadosPessoaisController::class, 'store']); 

Route::get('/sucesso', function() {
    return view('informativa');  // Certifique-se de que a view 'sucesso.blade.php' existe
});
