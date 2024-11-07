<?php

namespace App\Controller\Notas;

use App\Models\Nota;
use Core\Validacao;

class AtualizarController
{
    public function __invoke()
    {

        // dd(request()->all());
        $possoAtualizarANota = session()->get('mostrar');


        $validacao = Validacao::validar(
            array_merge([
                'titulo' => ['required', 'min:3', 'max:255'],
                'id' => ['required']
            ], $possoAtualizarANota ? ['nota' => ['required']] : []),
            request()->all()
        );

        if ($validacao->naoPassou()) {
            // se deu errado
            return redirect('/notas?id=' . request()->post('id'));
        }

        Nota::update(request()->post('titulo'), request()->post('nota'), request()->post('id'));

        flash()->push('mensagem', "Registro atualizado com sucesso!!");
        return redirect('/notas?id=' . request()->post('id'));
    }
}
