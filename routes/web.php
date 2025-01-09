<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DadosPessoaisController;


Route::get('/', [PageController::class, 'home']);
Route::fallback([PageController::class, 'notFound']);

Route::get('/gerar', function () {
    $pdf = PDF::loadView('pdf.index');
    //return $pdf->download('exemplo.pdf');
});


Route::get('/informativa', function () {
return view('informativa.index'); });

Route::get('/dadospessoais', [DadosPessoaisController::class, 'index']); 
Route::post('/dadospessoais', [DadosPessoaisController::class, 'store']); 

Route::get('/sucesso', function() {
    return view('informativa.index');
});
