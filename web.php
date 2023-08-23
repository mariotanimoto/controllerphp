<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});


Route::get('/aluno/{total}', function ($total) {
    $dados = array(
        "Carlos Eduardo",
        "Maria Cláudia",
        "João Pedro"
    );
    $alunos = "<ul>";
    if ($total <= count($dados)) {
        $cont = 0;
        foreach ($dados as $nome) {
            $alunos .= "<li>$nome</li>";
            $cont++;
            if ($cont >= $total)
                break;
        }
    } else {
        $alunos = $alunos . "<li>Tamanho Máximo = " . count($dados) . "</li>";
    }
    $alunos .= "</ul>";
    return $alunos;
});

Route::get('/racas/{total}/{raca?}/', function ($total, $raca = null) {
    $dados = array(
        "Bulldog Inglês",
        "Labrador",
        "Pastor Alemão",
        "Akita"
    );
    $pets = "<ul>";
    if ($raca == null) {
        if ($total <= count($dados)) {
            $cont = 0;
            foreach ($dados as $item) {
                $pets .= "<li>$item</li>";
                $cont++;
                if ($cont >= $total)
                    break;
            }
        } else {
            $pets .= "<li>Tamanho Máximo = " . count($dados) . "</li>";
        }
    } else {
        for ($cont = 0; $cont < $total; $cont++) {
            $pets .= "<li>$raca</li>";
        }
    }
    $pets .= "</ul>";
    return $pets;
});