<?php

namespace App\Controller\Notas;

use Core\Database;
use Core\Validacao;
use App\Models\Nota;

class CriarController
{
    public function index()
    {
        return view('notas/criar');
    }
    public function store()
    {
        $validacao = Validacao::validar([
            'titulo' => ['required', 'min:3', 'max:255'],
            'nota' => ['required']
        ], request()->all());

        if ($validacao->naoPassou()) {
            // se deu errado
            return  view('notas/criar');
        }

        Nota::create(auth()->id,  request()->post('titulo'),  request()->post('nota'));

        flash()->push('mensagem', 'Nota criada com sucesso!');
        return redirect('/notas');
    }
}
