<?php

namespace App\Controller\Contatos;

use App\Models\Contato;
use Core\Validacao;

class CriarController
{
    public function index()
    {
        return view('contatos/criar');
    }
    public function store()
    {
        $validacao = Validacao::validar([
            'nome' => ['required'],
            'observacao' => ['required'],
            'telefone' => ['required'],
            'email' => ['required', 'email', 'confirmed', 'unique:usuarios'],
            'avatar' => ['required'],
        ], request()->all());

        if ($validacao->naoPassou()) {
            // se deu errado
            return  view('contatos/criar');
        }

        Contato::create(auth()->id, request()->post('nome'), request()->post('observacao'), request()->post('telefone'), request()->post('email'), request()->post('avatar'));

        flash()->push('mensagem', 'Contato criado com sucesso!');
        return redirect('/contatos');
    }
}
