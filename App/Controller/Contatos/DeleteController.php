<?php

namespace App\Controller\Contatos;

use App\Models\Contato;
use Core\Validacao;

class DeleteController
{
    public function __invoke()
    {

        $validacao = Validacao::validar([
            'id' => ['required']
        ], request()->all());

        if ($validacao->naoPassou()) {
            // se deu errado
            return redirect('/contatos?id=' . request()->post('id'));
        }
        Contato::delete(request()->post('id'));

        flash()->push('mensagem', "Registro deletado com sucesso!!");
        return redirect('/contatos');
    }
}
