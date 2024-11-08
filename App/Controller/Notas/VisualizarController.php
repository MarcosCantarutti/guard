<?php

namespace App\Controller\Contatos;

use Core\Validacao;

class VisualizarController
{

    public function confirmar()
    {
        return view('contatos/confirmar');
    }
    public function mostrar()
    {

        $validacao = Validacao::validar([
            'password' => ['required']
        ], request()->all());


        if ($validacao->naoPassou()) {
            return view('contatos/confirmar');
        }

        if (!password_verify(request()->post('password'), auth()->password)) {
            flash()->push('validacoes', ['password' => ['senha está incorreta!']]);
            return view('contatos/confirmar');
        }


        session()->set('mostrar', true);
        return redirect('/contatos');
    }

    public function esconder()
    {
        session()->forget('mostrar');
        return redirect('/contatos');
    }
}
