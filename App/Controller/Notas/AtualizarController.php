<?php

namespace App\Controller\Contatos;

use App\Models\Contato;
use Core\Validacao;

class AtualizarController
{
    public function __invoke()
    {
        $possoAtualizarOContato = session()->get('mostrar');


        $validacao = Validacao::validar(
            array_merge([
                'nome' => ['required'],
                'observacao' => ['required'],
                'telefone' => ['required'],
                'email' => ['required', 'email', 'confirmed', 'unique:usuarios'],
                'avatar' => ['required'],
                'id' => ['required']
            ], $possoAtualizarOContato ? ['contato' => ['required']] : []),
            request()->all()
        );

        if ($validacao->naoPassou()) {
            // se deu errado
            return redirect('/contatos?id=' . request()->post('id'));
        }

        Contato::update(request()->post('id'), request()->post('nome'), request()->post('observacao'), request()->post('telefone'), request()->post('email'), request()->post('avatar'));

        flash()->push('mensagem', "Registro atualizado com sucesso!!");
        return redirect('/contatos?id=' . request()->post('id'));
    }
}
